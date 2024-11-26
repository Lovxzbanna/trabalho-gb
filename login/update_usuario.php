<?php
include '../db/Database.php'; // Incluir a classe Database
include '../db/Usuario.php'; // Incluir a classe Usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $usuario = new Usuario($db);

    $usuario->id = $_POST['id'];
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = $_POST['senha'];
    $usuario->tipo = $_POST['tipo'];

    if ($usuario->update()) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar usuário.";
    }
}
?>
