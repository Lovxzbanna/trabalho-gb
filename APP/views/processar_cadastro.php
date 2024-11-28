<?php 
// processar_cadastro.php - Processamento do cadastro

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../db/Database.php';  // Conexão com o banco de dados
    require_once '../../APP/controllers/UsuarioController.php';

    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        $erro = 'As senhas não coincidem!';
    } else {
        // Instancia o controlador de usuário
        $usuarioController = new UsuarioController();
        
        // Tenta cadastrar o usuário
        $usuario = $usuarioController->cadastrarUsuario($nome, $email, $nascimento, $tipo_usuario, $senha);

        if ($usuario) {
            // Se o cadastro for bem-sucedido, redireciona para a página de login
            header('Location: login.php');
            exit();
        } else {
            // Se o cadastro falhar
            $erro = 'Erro ao cadastrar. Tente novamente.';
        }
    }
}
?>

<?php if (isset($erro)): ?>
    <p style="color: red;"><?php echo $erro; ?></p>
<?php endif; ?>
