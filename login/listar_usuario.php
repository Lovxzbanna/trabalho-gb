<?php
session_start();
include '../db/Database.php'; // Incluir a classe Database
include '../db/Usuario.php'; // Incluir a classe Usuario
$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);
$stmt = $usuario->read();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>
<body>
    <h2>Usuários Registrados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['tipo']; ?></td>
            <td>
                <a href="edit_usuario.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="delete_usuario.php?id=<?php echo $row['id']; ?>">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
