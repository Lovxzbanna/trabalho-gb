<?php
// projeto.php - Detalhes de um projeto e compra
include_once '../../db/Database.php';
include_once 'controllers/ProjetoController.php';

$projetoController = new ProjetoController();
$projeto = $projetoController->obterProjeto($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projetoController->comprarProjeto($_SESSION['user_id'], $projeto['id']);
}
?>

<h2><?php echo $projeto['nome']; ?></h2>
<p><?php echo $projeto['descricao']; ?></p>
<form action="projeto.php?id=<?php echo $projeto['id']; ?>" method="POST">
    <button type="submit">Comprar Projeto</button>
</form>
