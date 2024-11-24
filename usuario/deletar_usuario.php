<!-- deletar_usuario.php -->
<?php
include 'db/Database.php';  // Inclui a conexão com o banco de dados

// Criar uma instância da classe de conexão
$database = new Database();
$db = $database->getConnection();

$id = isset($_GET['id']) ? $_GET['id'] : die('ID do usuário não fornecido.');

// Deletar o usuário
$query = "DELETE FROM usuarios WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    // Redireciona para a lista de usuários
    header("Location: listar_usuarios.php?status=success");
} else {
    // Redireciona de volta com erro
    header("Location: listar_usuarios.php?status=error");
}
?>
