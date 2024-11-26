<?php
require_once '..db/DB/.php'; // Aqui você inclui sua conexão com o banco
require_once '../db/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Instanciar o objeto de conexão
    $database = new Database();
    $db = $database->getConnection();

    // Criar um novo usuário
    $usuario = new Usuario($db);

    // Atribuir dados do formulário ao objeto
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha
    $usuario->tipo = $_POST['tipo'];

    // Criar o usuário no banco
    if ($usuario->create()) {
        echo "Usuário criado com sucesso!";
    } else {
        echo "Erro ao criar usuário.";
    }
}
?>
