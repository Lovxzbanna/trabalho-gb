<?php
require_once '../db/Database.php';
require_once '../models/Usuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuario($db);
$usuarios = $usuario->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Usuários</h1>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $user): ?>
                    <tr>
                        <td><?= $user['nome'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="editar_usuario.php?id=<?= $user['id'] ?>">Editar</a> | 
                            <a href="deletar_usuario.php?id=<?= $user['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>© 2024 Meu Site</p>
    </footer>
</body>
</html>
