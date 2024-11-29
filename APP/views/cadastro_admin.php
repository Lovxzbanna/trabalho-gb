<?php

// cadastro.php - Formulário de cadastro e processamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../db/Database.php';  // Conexão com o banco de dados
    require_once '../../APP/controllers/AminController.php';
    
    // Criação da instância da classe com o nome de variável mais intuitivo
    $AdminController = new AdminController();

    // Processamento do cadastro (certifique-se de que o nome do método esteja correto)
    $AdminController = $AdminController->CadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['senha']);
    
    if ($usuario) { 
        // Se o cadastro for bem-sucedido, redireciona para o login
        header('Location: login.php');
        exit();
    } else {
        // Se ocorrer algum erro no cadastro
        $erro = 'Erro ao cadastrar. Tente novamente.';
    }
    }

?>
    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Administrador</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #2F2F2F; /* Cinza escuro */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #F5F5F5; /* Fundo claro para o formulário */
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 30px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #FF7F50; /* Laranja vibrante */
            margin-bottom: 30px;
            font-weight: 600;
        }

        .input-field {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #BDC3C7; /* Cinza claro */
            font-size: 16px;
            color: #333;
            background-color: #FFF; /* Fundo branco para os campos */
            transition: border-color 0.3s ease;
        }

        .input-field:focus {
            border-color: #FF7F50; /* Laranja no foco */
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #FF7F50; /* Laranja vibrante */
            color: #FFF;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .submit-btn:hover {
            background-color: #E75A28; /* Laranja mais forte no hover */
            transform: scale(1.05);
        }

        .error {
            color: #E74C3C; /* Vermelho mais suave */
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Link para login */
        .login-link {
            font-size: 14px;
            margin-top: 20px;
            color: #BDC3C7; /* Cinza suave */
        }

        .login-link a {
            color: #FF7F50;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Cadastrar Administrador</h2>

        <!-- Exibe a mensagem de erro, se houver -->
        <?php if (isset($erro)): ?>
            <p class="error"><?php echo $erro; ?></p>
        <?php endif; ?>

        <!-- Formulário de cadastro -->
        <form method="POST" action="cadastro_admin.php">
            <input type="text" name="nome" class="input-field" placeholder="Nome completo" required>
            <input type="email" name="email" class="input-field" placeholder="Email" required>
            <input type="password" name="senha" class="input-field" placeholder="Senha" required>
            <input type="password" name="senha_confirm" class="input-field" placeholder="Confirmar senha" required>
            <button type="submit" class="submit-btn">Cadastrar</button>
        </form>

        <!-- Link para login (caso necessário) -->
        <div class="login-link">
            Já tem uma conta? <a href="login.php">Faça login</a>
        </div>
    </div>

</body>
</html>
