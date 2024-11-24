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
        /* Estilos semelhantes aos do painel de admin */
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

    <!-- Conteúdo -->
    <div class="content">
        <h1>Gerenciar Usuários</h1>
        <table border="1">
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
