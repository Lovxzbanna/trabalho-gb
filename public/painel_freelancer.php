<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Freelancer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Painel do Freelancer</h1>
    </header>

    <main>
    <h2>Bem-vindo, <?php echo htmlspecialchars($usuario_nome, ENT_QUOTES, 'UTF-8'); ?>!</h2>
        <a href="detalhes_projeto.php">Meus Projetos</a>
        <a href="editar_projeto.php">Editar Projeto</a>
        <a href="excluir_projeto.php">Excluir Projeto</a>
        <a href="alterar_senha.php">Alterar Senha</a>
    </main>

    <footer>
        <p>© 2024 Meu Site</p>
    </footer>
</body>
</html>
