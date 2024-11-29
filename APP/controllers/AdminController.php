<?php
session_start();

// Verifica se o usuário é admin
if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once '../../app/controllers/adm_controller.php';

$adminController = new AdminController();
$usuarios = $adminController->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
</head>
<body>
    <h1>Painel Administrativo</h1>

    <h2>Lista de Usuários</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo $usuario['tipo_usuario']; ?></td>
                    <td><?php echo $usuario['nascimento']; ?></td>
                    <td>
                        <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                        <a href="excluir_usuario.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
