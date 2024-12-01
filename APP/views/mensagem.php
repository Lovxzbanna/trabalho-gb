<?php
require_once __DIR__ . '/../../db/Database.php';  // Ajuste conforme sua estrutura de diretórios
require_once '../controllers/MensagemController.php';

$mensagemController = new MensagemController();

// Mensagem de sucesso
$mensagemDeSucesso = "";

// Lógica de envio de mensagem
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mensagem'])) {
    try {
        // Enviar a mensagem
        $mensagemController->enviarMensagem($_POST['mensagem']);
        // Exibir mensagem de sucesso
        $mensagemDeSucesso = "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        // Exibir erro em caso de falha
        $mensagemDeSucesso = "Erro ao enviar a mensagem: " . $e->getMessage();
    }
}

?>


<?php if ($mensagemDeSucesso): ?>
    <p><?php echo $mensagemDeSucesso; ?></p>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Enviar Mensagem</title>
</head>
<body>
   <style>
    /* css/styles.css */

body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

.mensagem {
    padding: 10px;
    border-radius: 5px;
    margin-top: 10px;
    font-weight: bold;
}

.mensagem-sucesso {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.mensagem-erro {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
   </style> 
</body>
</html>