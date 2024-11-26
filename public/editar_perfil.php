<?php
// editar_perfil.php - Edição do perfil de usuário
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../db/Database.php';
    include_once '../app/controllers/UsuarioController.php';
    $usuarioController = new UsuarioController();
    $usuarioController->editarPerfil($_SESSION['user_id'], $_POST['nome'], $_POST['email'], $_POST['senha']);
}

include_once '../app/controllers/UsuarioController.php';
$usuarioController = new UsuarioController();
$usuario = $usuarioController->obterUsuario($_SESSION['user_id']);
?>

<form action="editar_perfil.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>

    <label for="senha">Nova Senha:</label>
    <input type="password" name="senha">

    <button type="submit">Salvar Alterações</button>
</form>
