<!-- processar_editar_usuario.php -->
<?php
include 'db/Database.php';  // Inclui a conexão com o banco de dados

// Criar uma instância da classe de conexão
$database = new Database();
$db = $database->getConnection();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Validar se os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($email)) {
        header("Location: editar_usuario.php?id={$id}&status=error");
        exit;
    }

    // Atualizar os dados no banco de dados
    $query = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
    $stmt = $db->prepare($query);
    
    // Bind dos parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Redireciona para a página de sucesso
        header("Location: listar_usuarios.php?status=success");
    } else {
        header("Location: editar_usuario.php?id={$id}&status=error");
    }
}
?>
