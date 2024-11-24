<?php
include 'config/database.php';

// Conectar ao banco de dados
$database = new Database();
$db = $database->getConnection();

// Obter o ID da mensagem
$id = isset($_GET['id']) ? $_GET['id'] : die('Erro: ID não encontrado.');

$query = "DELETE FROM mensagens WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    // Redirecionar para a página do painel após a exclusão
    header("Location: painel_mensagens.php?status=success");
} else {
    // Caso haja um erro
    header("Location: painel_mensagens.php?status=error");
}
?>

