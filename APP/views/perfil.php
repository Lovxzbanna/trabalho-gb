<?php
session_start();
include_once '../app/controllers/UsuarioController.php';
include_once '../app/models/Usuario.php';

$usuarioController = new UsuarioController();
$usuarioId = $_SESSION['usuario_id'];  // Supondo que você tem a ID do usuário logado na sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se a solicitação é para editar o perfil
    if (isset($_POST['editar_perfil'])) {
        $usuarioController->editarPerfil($usuarioId, $_POST['nome'], $_POST['email']);
        header("Location: perfil.php");  // Redireciona após a edição
    }
}

$usuario = $usuarioController->verPerfil($usuarioId);
?>

<!-- HTML para exibir o perfil -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Perfil de <?php echo htmlspecialchars($usuario['nome']); ?></h1>

    <!-- Exibe os dados do usuário -->
    <div>
        <p>Nome: <?php echo htmlspecialchars($usuario['nome']); ?></p>
        <p>Email: <?php echo htmlspecialchars($usuario['email']); ?></p>
        <p>Data de Cadastro: <?php echo date("d/m/Y", strtotime($usuario['data_cadastro'])); ?></p>
    </div>

    <!-- Formulário para editar o perfil -->
    <?php if ($_SESSION['usuario_id'] == $usuario['id']) : ?>
    <h2>Editar Perfil</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>

        <button type="submit" name="editar_perfil">Salvar Alterações</button>
    </form>
    <?php endif; ?>
</body>
</html>
