<?php
include_once '../db/Database.php';
include_once '../models/Projeto.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();

    $projeto = new Projeto($db);
    $projeto->id = $_GET['id'];

    if ($projeto->deletarProjeto()) {
        header("Location: meus_projetos.php");
    } else {
        echo "Erro ao excluir projeto!";
    }
}
?>
