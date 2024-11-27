<?php
require_once '../db/Database.php';
require_once '../models/Projeto.php';

$database = new Database();
$db = $database->getConnection();

$projeto = new Projeto($db);
$projetos = $projeto->listarProjetosByUsuario($_SESSION['usuario_id']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Projetos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Meus Projetos</h1>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projetos as $projeto): ?>
                    <tr>
                        <td><?php echo $projeto['titulo']; ?></td>
                        <td><?php echo $projeto['descricao']; ?></td>
                        <td>
                            <a href="detalhes_projeto.php?id=<?php echo $projeto['id']; ?>">Detalhes</a> | 
                            <a href="excluir_projeto.php?id=<?php echo $projeto['id']; ?>">Excluir</a>
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
 