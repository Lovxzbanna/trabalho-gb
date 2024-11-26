<?php
session_start();
include '../db/db.php';
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
