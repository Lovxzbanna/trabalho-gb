    <?php
    // mensagens.php - Exibição e gestão de mensagens
    require_once __DIR__ . '/../../db/Database.php';  // Ajuste conforme sua estrutura de diretórios

    require_once '../controllers/MensagemController.php';

    $mensagemController = new MensagemController();

    // Lógica de envio de mensagem
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mensagem'])) {
        $mensagemController->enviarMensagem($_POST['mensagem']);
    }

    // Lógica de exclusão de mensagem
    if (isset($_GET['excluir_id'])) {
        $mensagemController->excluirMensagem($_GET['excluir_id']);
    }

    $mensagens = $mensagemController->listarMensagens();
    ?>
    <h2>Mensagens</h2>
    <form action="mensagens.php" method="POST">
        <textarea name="mensagem" required></textarea>
        <button type="submit">Enviar Mensagem</button>
    </form>

    <h3>Mensagens Recebidas:</h3>
    <?php foreach ($mensagens as $mensagem): ?>
        <div>
            <p><?php echo $mensagem['conteudo']; ?></p>
            <a href="mensagens.php?excluir_id=<?php echo $mensagem['id']; ?>">Excluir</a>
        </div>
    <?php endforeach; ?>
