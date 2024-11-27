<?php
require_once '../db/Database.php';
require_once '../models/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();

    $usuario = new Usuario($db);
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    if ($usuario->criarUsuario()) {
        echo "Usuário criado com sucesso!";
        header("Location: login.php");
    } else {
        echo "Erro ao criar usuário!";
    }
}
?>
