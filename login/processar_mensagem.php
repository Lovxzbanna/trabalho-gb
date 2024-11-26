<?php
// Incluir a conexão com o banco de dados
include 'db/mensagem.php'; // Altere para o caminho correto da sua conexão com o banco

// Criar uma instância da classe de conexão
$database = new Database();
$db = $database->getConnection();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter dados do formulário
    $nome = isset($_POST['nome']) ? htmlspecialchars(trim($_POST['nome'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $mensagem = isset($_POST['mensagem']) ? htmlspecialchars(trim($_POST['mensagem'])) : '';

    // Validar se os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($email) || empty($mensagem)) {
        // Redireciona de volta com erro
        header("Location: fale_conosco.php?status=error");
        exit;
    }

    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Redireciona de volta com erro de email inválido
        header("Location: fale_conosco.php?status=invalid_email");
        exit;
    }

    // Inserir os dados no banco de dados
    $query = "INSERT INTO mensagens (nome, email, mensagem, data_envio) VALUES (:nome, :email, :mensagem, NOW())";
    $stmt = $db->prepare($query);
    
    // Bind dos parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mensagem', $mensagem);
    
    // Tentar inserir a mensagem no banco de dados
    if ($stmt->execute()) {
        // Redireciona para a página de confirmação de sucesso
        header("Location: fale_conosco.php?status=success");
    } else {
        // Redireciona de volta com erro
        header("Location: fale_conosco.php?status=error");
    }
}
?>
