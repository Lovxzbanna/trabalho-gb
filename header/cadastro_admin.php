<?php
session_start();

// Conectar ao banco de dados
include '../db/DB.php';
$db = new DB();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar dados do formulário
    $nome = filter_var(trim($_POST['nome']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = trim($_POST['senha']);
    $senha_confirm = trim($_POST['senha_confirm']);

    // Validação
    if (empty($nome) || empty($email) || empty($senha) || empty($senha_confirm)) {
        $erro = "Por favor, preencha todos os campos.";
    } elseif ($senha !== $senha_confirm) {
        $erro = "As senhas não coincidem.";
    } else {
        // Verificar se o email já está cadastrado
        $query = "SELECT email FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $erro = "Email já cadastrado.";
        } else {
            // Inserir o novo administrador no banco de dados (sem hash na senha)
            $query = "INSERT INTO usuarios (nome, email, senha, role) VALUES (:nome, :email, :senha, :role)";
            $stmt = $conn->prepare($query);
            $role = 'admin'; // O papel será "admin" para este cadastro
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha); // Senha em texto simples
            $stmt->bindParam(':role', $role);

            if ($stmt->execute()) {
                // Armazenar informações de sessão
                $_SESSION['role'] = 'admin';
                $_SESSION['usuario_id'] = $conn->lastInsertId(); // Pega o ID do último inserido
                $_SESSION['usuario_email'] = $email;

                // Redireciona para o painel do administrador
                header("Location: painel_admin.php");
                exit;
            } else {
                $erro = "Erro ao cadastrar administrador. Tente novamente.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Administrador</title>
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
    <h2>Cadastrar Administrador</h2>

    <!-- Exibe a mensagem de erro, se houver -->
    <?php if (isset($erro)): ?>
        <p class="error"><?php echo $erro; ?></p>
    <?php endif; ?>

    <!-- Formulário de cadastro -->
    <form method="POST" action="cadastro_admin.php">
        <input type="text" name="nome" class="input-field" placeholder="Nome completo" required>
        <input type="email" name="email" class="input-field" placeholder="Email" required>
        <input type="password" name="senha" class="input-field" placeholder="Senha" required>
        <input type="password" name="senha_confirm" class="input-field" placeholder="Confirmar senha" required>
        <button type="submit" class="submit-btn">Cadastrar</button>
    </form>
</div>

</body>
</html>
