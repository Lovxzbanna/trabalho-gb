<?php
session_start();
include '../db/database.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Administração</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f5; /* Fundo suave e claro */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #2c3e50; /* Cor escura e elegante para o título */
            font-size: 32px;
            margin-bottom: 30px;
        }

        .menu {
            margin-top: 20px;
            display: flex;
            gap: 30px;
            justify-content: center;
            width: 100%;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50; /* Verde mais suave para os botões */
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .menu a:hover {
            background-color: #45a049; /* Verde mais escuro no hover */
            transform: scale(1.05); /* Efeito de zoom ao passar o mouse */
        }

        .menu a:active {
            background-color: #388e3c; /* Efeito ao clicar */
        }

        /* Ajustes para dispositivos menores */
        @media (max-width: 768px) {
            .menu {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <h1>Painel de Administração</h1>
    <div class="menu">
        <a href="listar_usuarios.php">Listar Usuários</a>
        <a href="criar_usuario.php">Cadastrar Usuário</a>
        <a href="editar_usuario.php?email=usuario@example.com">Editar Usuário</a>
    </div>
</body>
</html>
<?php
require_once __DIR__ . '/../../db/Database.php';  // Ajuste conforme sua estrutura de diretórios
require_once '../controllers/MensagemController.php';

$mensagemController = new MensagemController();

// Lógica de exclusão de mensagem
if (isset($_GET['excluir_id'])) {
    $mensagemController->excluirMensagem($_GET['excluir_id']);
}

// Listar todas as mensagens
$mensagens = $mensagemController->listarMensagens();
?>
<style>
    /* css/styles.css */

body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #4A76A8, #6A4C9C, #D8A6D1); /* Gradiente azul, roxo e rosa */
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #007BFF;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

.btn {
    display: inline-block;
    padding: 8px 12px;
    color: white;
    background-color: #dc3545; /* Cor de fundo para o botão de excluir */
    text-decoration: none;
    border-radius: 4px;
}

.btn:hover {
    background-color: #c82333; /* Cor de fundo ao passar o mouse */
}
</style>
<h2>Mensagens Recebidas</h2>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Conteúdo da Mensagem</th>
            <th>Data de Envio</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mensagens as $mensagem): ?>
            <tr>
                <td><?php echo $mensagem['id']; ?></td>
                <td><?php echo $mensagem['conteudo']; ?></td>
                <td><?php echo $mensagem['data_envio']; ?></td>
                <td>
                    <a href="admin_mensagens.php?excluir_id=<?php echo $mensagem['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
