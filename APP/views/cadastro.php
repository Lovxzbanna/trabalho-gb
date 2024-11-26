<?php
// cadastro.php - Formulário de cadastro e processamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lógica de cadastro de usuário
    include_once '../db/Database.php';
    include_once '../app/controllers/UsuarioController.php';
    $usuarioController = new UsuarioController();
    $usuarioController->registrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
}
?>

<form action="cadastro.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit">Cadastrar</button>
</form>
