<?php
require_once '../db/Database.php';
require_once '../models/Mensagem.php';

$database = new Database();
$db = $database->getConnection();

$mensagem = new Mensagem($db);
$mensagens = $mensagem->listarMensagens();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensagem->titulo = $_POST['titulo'];
    $mensagem->conteudo = $_POST['conteudo'];
    $mensagem->usuario_id = $_SESSION['usuario_id'];
    if ($mensagem->criarMensagem()) {
        echo "Postagem criada com sucesso!";
    } else {
        echo "Erro ao criar postagem!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagem</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Criar Postagem</h1>
    </header>

    <main>
        <form method="POST">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>

            <label for="conteudo">Conteúdo:</label>
            <textarea id="conteudo" name="conteudo" required></textarea>

            <button type="submit">Postar</button>
        </form>

        <h2>Postagens Recentes</h2>
        <?php foreach ($mensagens as $msg): ?>
            <div class="postagem">
                <h3><?php echo $msg['titulo']; ?></h3>
                <p><?php echo $msg['conteudo']; ?></p>
            </div>
        <?php endforeach; ?>
    </main>

    <footer>
        <p>© 2024 Meu Site</p>
    </footer>
</body>
</html>
