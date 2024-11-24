<?php
include 'config/database.php';

// Conectar ao banco de dados
$database = new Database();
$db = $database->getConnection();

// Obter o ID da mensagem
$id = isset($_GET['id']) ? $_GET['id'] : die('Erro: ID não encontrado.');

$query = "SELECT * FROM mensagens WHERE id = :id LIMIT 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Verificar se a mensagem foi encontrada
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $nome = $row['nome'];
    $email = $row['email'];
    $mensagem = $row['mensagem'];
    $data_envio = $row['data_envio'];
} else {
    die('Mensagem não encontrada.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem - <?php echo htmlspecialchars($nome); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h2 class="title is-3">Mensagem de: <?php echo htmlspecialchars($nome); ?></h2>

        <div class="box">
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Mensagem:</strong></p>
            <p><?php echo nl2br(htmlspecialchars($mensagem)); ?></p>
            <p><em>Enviada em: <?php echo $data_envio; ?></em></p>
        </div>

        <a href="painel_mensagens.php" class="button is-link">Voltar para o Painel</a>
    </div>
</body>
</html>
