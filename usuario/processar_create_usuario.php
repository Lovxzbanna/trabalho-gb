<!-- processar_create_usuario.php -->
<?php
include 'db/Database.php';  // Inclui a conexão com o banco de dados

// Criar uma instância da classe de conexão
$database = new Database();
$db = $database->getConnection();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter dados do formulário
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $senha = password_hash(trim($_POST['senha']), PASSWORD_DEFAULT);  // Criptografando a senha

    // Validar se os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        // Redireciona de volta com erro
        header("Location: create_usuario.php?status=error");
        exit;
    }

    // Inserir os dados no banco de dados
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $db->prepare($query);
    
    // Bind dos parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);

    // Tentar inserir o usuário no banco de dados
    if ($stmt->execute()) {
        // Redireciona para a página de confirmação de sucesso
        header("Location: create_usuario.php?status=success");
    } else {
        // Redireciona de volta com erro
        header("Location: create_usuario.php?status=error");
    }
}
?>
