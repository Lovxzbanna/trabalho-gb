<?php
// configurar_conta.php - Alterar senha ou deletar conta
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../db/Database.php';
    include_once '../app/controllers/UsuarioController.php';
    $usuarioController = new UsuarioController();
    
    if (isset($_POST['alterar_senha'])) {
        $usuarioController->alterarSenha($_SESSION['user_id'], $_POST['nova_senha']);
    } elseif (isset($_POST['deletar_conta'])) {
        $usuarioController->deletarConta($_SESSION['user_id']);
        session_destroy();  // Destrói a sessão após deletar
        header("Location: login.php");  // Redireciona para login
    }
}
?>

<h2>Configurações da Conta</h2>

<form action="configurar_conta.php" method="POST">
    <label for="nova_senha">Nova Senha:</label>
    <input type="password" name="nova_senha">
    <button type="submit" name="alterar_senha">Alterar Senha</button>
</form>

<form action="configurar_conta.php" method="POST">
    <button type="submit" name="deletar_conta">Deletar Conta</button>
</form>
