<?php
// login.php - Formulário de login e processamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lógica de validação de login aqui
    include_once '../db/Database.php';  // Conexão com o banco de dados
    include_once '../app/controllers/UsuarioController.php';
    $usuarioController = new UsuarioController();
    $usuarioController->validarLogin($_POST['email'], $_POST['senha']);
}
?>

<form action="login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit">Login</button>
</form>
