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
    <title>Painel do Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Painel do Cliente</h1>
    </header>

    <main>
        <h2>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
        <a href="meus_projetos.php">Meus Projetos</a>
        <a href="comprar_projeto.php">Comprar Projetos</a>
        <a href="alterar_senha.php">Alterar Senha</a>
        <a href="deletar_conta.php?id=<?php echo $_SESSION['usuario_id']; ?>">Excluir Conta</a>
    </main>

    <footer>
        <p>© 2024 Meu Site</p>
    </footer>
</body>
</html>
