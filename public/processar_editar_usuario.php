<?php
require_once '../db/Database.php';
require_once '../models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();

    $usuario = new Usuario($db);
    $usuario->id = $_POST['id'];
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];

    if ($usuario->editarUsuario()) {
        echo "Usuário editado com sucesso!";
        header("Location: listar_usuarios.php");
    } else {
        echo "Erro ao editar usuário!";
    }
}
?>
