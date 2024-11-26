<?php
session_start();
include '../db/Database.php';
include '../db/Usuario.php';

$database = new Database();
$conn = $database->getConnection();

$usuario = new Usuario($conn);

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->criar($nome, $email, $senha)) {
        $mensagem = "Usuário criado com sucesso!";
    } else {
        $mensagem = "Erro ao criar usuário! O email já pode estar em uso.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <style>
        /* Resetando margens e paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 6px;
        }

        .success {
            color: #28a745;
            background-color: #d4edda;
        }

        .error {
            color: #dc3545;
            background-color: #f8d7da;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #444;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #f9f9f9;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #4CAF50;
            background-color: #ffffff;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Responsividade */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cadastrar Usuário</h1>

    <!-- Exibe a mensagem de sucesso ou erro -->
    <?php if ($mensagem): ?>
        <div class="message <?php echo (strpos($mensagem, 'sucesso') !== false) ? 'success' : 'error'; ?>">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required placeholder="Digite seu email"><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required placeholder="Digite sua senha"><br>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
