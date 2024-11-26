<?php
// Incluir o arquivo de conexão com o banco de dados (se necessário)
require_once '../db/Usuario.php';

// Iniciar a sessão
session_start();

// Conectar ao banco de dados com PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

// Criar o objeto Usuario (caso necessário)
$usuario = new Usuario($pdo);

// Verificar se o usuário está logado
if (isset($_SESSION['usuario_email'])) {
    // Destruir as variáveis de sessão e a sessão em si
    session_unset();  // Limpa todas as variáveis de sessão
    session_destroy();  // Destroi a sessão

    // Definir uma mensagem de sucesso (opcional, você pode personalizar isso)
    $_SESSION['logout_message'] = "Você foi desconectado com sucesso.";
} else {
    // Caso o usuário não esteja logado, redireciona diretamente (ou exibe uma mensagem de erro)
    $_SESSION['logout_message'] = "Você não está logado.";
}

// Redirecionar para a página de login ou painel
header("Location: ../login/login.php");  // Alterar para a página de login
exit();
?>
