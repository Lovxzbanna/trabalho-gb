<?php
// processar_cadastro.php

require_once '../../db/Database.php'; // Conexão com o banco
require_once '../../app/controllers/UsuarioController.php'; // Controlador de usuário

$database = new Database();
$conn = $database->getConnection();  // Obtém a conexão com o banco de dados

// Criar instância da classe UsuarioController
$usuarioController = new UsuarioController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega os dados do formulário de cadastro
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Chama o método para registrar o usuário
    $resultado = $usuarioController->registrarUsuario($nome, $email, $senha);

    // Verifica se o resultado é verdadeiro (sucesso) ou uma mensagem de erro
    if ($resultado === true) {
        echo "Cadastro realizado com sucesso!";
        // Redireciona para a página de login ou outra página
    } elseif ($resultado === "Email já está em uso!") {
        echo "Erro: O e-mail já está em uso. Tente outro.";
    } else {
        echo "Erro ao cadastrar o usuário. Tente novamente.";
    }
}
?>
