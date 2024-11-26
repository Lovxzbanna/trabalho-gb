<?php
// Inclusão das classes
require_once '../db/DB.php';
require_once '../db/Usuario.php';

// Inicia a conexão com o banco
$database = new Database();
$pdo = $database->getConnection();

// Instância o objeto User com a conexão
$user = new User($pdo);

$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_digitada = trim($_POST['senha_atual']);
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmacao_senha'];

    // Define o ID do usuário (aqui, um valor fixo para teste)
    $usuario_id = 1;

    // Verifica a senha atual
    if ($user->checkPassword($usuario_id, $senha_digitada)) {
        // Verifica se as novas senhas coincidem
        if ($nova_senha === $confirmar_senha) {
            // Atualiza a senha
            if ($user->updatePassword($usuario_id, $nova_senha)) {
                $mensagem = "Senha alterada com sucesso!";
            } else {
                $mensagem = "Erro ao atualizar a senha. Tente novamente.";
            }
        } else {
            $mensagem = "A nova senha e a confirmação não coincidem. Tente novamente.";
        }
    } else {
        $mensagem = "A senha atual está incorreta. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8; /* Fundo suave */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
            color: #444;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="password"]:focus {
            border-color: #4CAF50;
            background-color: #ffffff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            padding: 10px;
            border-radius: 6px;
            background-color: #f1f1f1;
        }

        .success {
            color: #28a745;
            background-color: #d4edda;
        }

        .error {
            color: #dc3545;
            background-color: #f8d7da;
        }

        /* Responsividade */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Alterar Senha</h2>

    <?php if ($mensagem): ?>
        <div class="message <?php echo (strpos($mensagem, 'sucesso') !== false) ? 'success' : 'error'; ?>">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>

    <form action="alterar_senha.php" method="POST">
        <div class="form-group">
            <label for="senha_atual">Senha Atual</label>
            <input type="password" id="senha_atual" name="senha_atual" required>
        </div>

        <div class="form-group">
            <label for="nova_senha">Nova Senha</label>
            <input type="password" id="nova_senha" name="nova_senha" required>
        </div>

        <div class="form-group">
            <label for="confirmacao_senha">Confirmar Nova Senha</label>
            <input type="password" id="confirmacao_senha" name="confirmacao_senha" required>
        </div>

        <input type="submit" value="Alterar Senha">
    </form>
</div>

</body>
</html>
