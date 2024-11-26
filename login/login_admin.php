<?php
session_start();

// Verifica se o usuário já está logado e redireciona para o painel caso positivo
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    header("Location: painel_admin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar ao banco de dados
    include '../db/DB.php';
    $db = new DB();
    $conn = $db->connect();

    // Coletar dados do formulário
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = trim($_POST['senha']);

    // Validação
    if (empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        // Consultar o banco de dados para verificar as credenciais
        $query = "SELECT * FROM usuarios WHERE email = :email AND role = 'admin'";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Usuário encontrado, verificar senha
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Comparar a senha sem hash
            if ($usuario['senha'] === $senha) {
                // Armazenar informações de sessão
                $_SESSION['role'] = 'admin';
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_email'] = $usuario['email'];

                // Redireciona para o painel do administrador
                header("Location: painel_admin.php");
                exit;
            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Administrador não encontrado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <style>
        /* Adicione estilos conforme necessário */
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login Administrador</h2>

    <!-- Exibe a mensagem de erro, se houver -->
    <?php if (isset($erro)): ?>
        <p class="error"><?php echo $erro; ?></p>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form method="POST" action="login_admin.php">
        <input type="email" name="email" class="input-field" placeholder="Email" required>
        <input type="password" name="senha" class="input-field" placeholder="Senha" required>
        <button type="submit" class="submit-btn">Entrar</button>
    </form>
</div>

</body>
</html>
<?php
session_start();

// Verifica se o usuário está logado e se tem o papel de admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Conectar ao banco de dados e buscar os usuários
include '../db/DB.php';
$db = new DB();
$conn = $db->connect();
$query = "SELECT usuario_id, nome, email, role FROM usuarios";
$stmt = $conn->prepare($query);
$stmt->execute();

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f0f0f0;
        }

        /* Estilo para o cabeçalho */
        header {
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        header .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .nav a {
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            font-size: 16px;
        }

        header .nav a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        /* Estilo da sidebar */
        .sidebar {
            width: 250px;
            background-color: #333;
            padding-top: 20px;
            position: fixed;
            top: 50px;
            left: 0;
            height: 100%;
            color: white;
            padding-left: 10px;
        }

        .sidebar h2 {
            color: #fff;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: white;
            padding: 8px;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        /* Estilo do conteúdo */
        .content {
            margin-left: 270px;
            padding: 20px;
            margin-top: 60px; /* Para ajustar a altura do header fixo */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        table th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Cabeçalho com aba Login -->
    <header>
        <div class="nav">
            <div>
                <a href="painel_admin.php">Painel Admin</a>
                <a href="gerenciar_usuarios.php">Gerenciar Usuários</a>
                <a href="relatorios.php">Relatórios</a>
                <a href="configuracoes.php">Configurações</a>
            </div>
            <div>
                <a href="logout.php">Sair</a>
                <a href="login.php">Login</a> <!-- Aba de login -->
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Painel Admin</h2>
        <a href="painel_admin.php">Dashboard</a>
        <a href="gerenciar_usuarios.php">Gerenciar Usuários</a>
        <a href="relatorios.php">Relatórios</a>
        <a href="configuracoes.php">Configurações</a>
        <a href="logout.php">Sair</a>
    </div>

    <!-- Conteúdo -->
    <div class="content">
        <h1>Gerenciar Usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['usuario_id']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['role']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
