<?php
session_start();
include_once '../app/controllers/ProjetoController.php';
include_once '../app/models/Projeto.php';

$projetoController = new ProjetoController();
$usuarioId = $_SESSION['usuario_id'];  // ID do usuário logado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ações baseadas nos dados enviados via POST
    if (isset($_POST['editar_projeto'])) {
        $projetoController->editarProjeto($_POST['id'], $_POST['titulo'], $_POST['descricao'], $usuarioId);
        header("Location: gerenciar_projetos.php");  // Redireciona após editar
    } elseif (isset($_POST['excluir_projeto'])) {
        $projetoController->excluirProjeto($_POST['id']);
        header("Location: gerenciar_projetos.php");  // Redireciona após excluir
    }
}

$projetos = $projetoController->listarProjetos($usuarioId);  // Listar todos os projetos do usuário
?>

<!-- HTML para Gerenciar Projetos -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Projetos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Meus Projetos</h1>

    <!-- Exibe os projetos existentes -->
    <?php if (!empty($projetos)) : ?>
        <?php foreach ($projetos as $projeto) : ?>
            <div class="projeto">
                <h2><?php echo htmlspecialchars($projeto['titulo']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($projeto['descricao'])); ?></p>
                
                <!-- Opções de edição e exclusão -->
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $projeto['id']; ?>">
                    <button type="submit" name="editar_projeto">Editar</button>
                    <button type="submit" name="excluir_projeto" onclick="return confirm('Tem certeza que deseja excluir este projeto?');">Excluir</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Você ainda não tem projetos. <a href="criar_projeto.php">Crie um novo projeto.</a></p>
    <?php endif; ?>

    <h2>Criar Novo Projeto</h2>
    <form method="POST" action="criar_projeto.php">
        <label for="titulo">Título do Projeto:</label>
        <input type="text" name="titulo" required>

        <label for="descricao">Descrição do Projeto:</label>
        <textarea name="descricao" required></textarea>

        <button type="submit">Criar Projeto</button>
    </form>
</body>
</html>
