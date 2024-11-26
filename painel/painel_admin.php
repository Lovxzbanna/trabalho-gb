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

// Função para traduzir os papéis para descrições legíveis
function getRoleDescription($role) {
    switch ($role) {
        case 'admin':
            return 'Administrador';
        case 'freelancer':
            return 'Freelancer';
        case 'client':
            return 'Cliente';
        case 'user':  // Adicionando o caso para "user" ser considerado "Admin"
            return 'Admin'; 
        default:
            return 'Desconhecido'; // Em caso de papel não reconhecido
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <style>
        /* Resetando margens e paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fb;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            padding-right: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            font-size: 24px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            color: #ecf0f1;
            font-size: 18px;
            margin: 5px 0;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        /* Conteúdo principal */
        .content {
            margin-left: 250px;
            padding: 40px 20px;
        }

        .content h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 16px;
        }

        table th {
            background-color: #2c3e50;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        table tr:hover {
            background-color: #bdc3c7;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }

            table th, table td {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 100%;
                position: relative;
            }

            .content {
                margin-left: 0;
            }

            table th, table td {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Painel Admin</h2>
        <a href="painel_admin.php">Dashboard</a>
        <a href="gerenciar_usuarios.php">Gerenciar Usuários</a>
        <a href="relatorios.php">Relatórios</a>
        <a href="configuracoes.php">Configurações</a>
        <a href="logout.php">Sair</a>
    </div>

    <!-- Conteúdo principal -->
    <div class="content">
        <h1>Gerenciar Usuários</h1>

        <!-- Tabela de usuários -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Papel</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['usuario_id']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo getRoleDescription($usuario['role']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
