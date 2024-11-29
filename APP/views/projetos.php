<?php
require_once '../../db/Database.php';
require_once '../controllers/ProjetoController.php';

$projetoController = new ProjetoController();


// Obtém os detalhes do projeto
try {
    $projeto = $projetoController->obterProjeto($_GET['id']);
} catch (Exception $e) {
    die('Erro: ' . $e->getMessage());
}

// Processa a compra do projeto
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $projetoController->comprarProjeto($_SESSION['user_id'], $projeto['id']);
        echo '<p>Compra realizada com sucesso!</p>';
    } catch (Exception $e) {
        echo '<p>Erro ao comprar o projeto: ' . $e->getMessage() . '</p>';
    }
}
?>

<h2><?php echo htmlspecialchars($projeto['nome']); ?></h2>
<p><?php echo htmlspecialchars($projeto['descricao']); ?></p>
<form action="projeto.php?id=<?php echo $projeto['id']; ?>" method="POST">
    <button type="submit">Comprar Projeto</button>
</form>
