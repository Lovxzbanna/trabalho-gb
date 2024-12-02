<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo_usuario'] !== 'freelancer') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Freelancer</title>
</head>
<body>
    <h1>Bem-vindo ao Painel do Freelancer</h1>
    <p>Esta é a área exclusiva para freelancers.</p>
    <a href="logout.php">Sair</a>
</body>
</html>