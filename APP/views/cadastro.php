<?php 
// cadastro.php - Formulário de cadastro e processamento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../db/Database.php';  // Conexão com o banco de dados
    require_once '../../APP/controllers/UsuarioController.php';

    // Criação da instância da classe com o nome de variável mais intuitivo
    $usuarioController = new UsuarioController();

    // Processamento do cadastro (certifique-se de que o nome do método esteja correto)
    $usuario = $usuarioController->CadastrarUsuario($_POST['nome'], $_POST['email'], $_POST['nascimento'], $_POST['tipo_usuario'], $_POST['senha']);
    
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


<?php if (isset($erro)): ?>
    <p style="color: red;"><?php echo $erro; ?></p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - CemFreelas</title>
    <style>
        /* Resetando estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4A76A8, #D8A6D1); /* Gradiente roxo e rosa */
            color: #333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Container principal */
        .container {
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin: 50px 50px 50px 450px;  /* Ajuste do espaçamento */
            text-align: center;
            align-items: center;
            justify-content: center; /* Centraliza verticalmente */
        }

        h1 {
            font-size: 32px;
            color: #3b3f47;
            margin-bottom: 30px;
        }

        /* Estilos para o formulário */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="date"], select {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="date"]:focus, select:focus {
            border-color: #D8A6D1; /* Rosa claro */
            background-color: #ffffff;
        }

        button {
            padding: 12px 20px;
            background-color: #6A4C9C; /* Roxo */
            width: 50%;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4A76A8; /* Roxo mais claro */
        }

        /* Estilos para links */
        a {
            color: #D8A6D1; /* Rosa claro */
            text-decoration: none;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<!-- Conteúdo principal -->
<div class="container">
    <h1>Cadastro</h1>

    <form action="cadastro.php" method="POST">
        <label for="nome">Nome de Usuário:</label>
        <input type="text" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="nascimento">Data de Nascimento:</label>
        <input type="date" name="nascimento" required>

        <label for="tipo_usuario">Tipo de Conta:</label>
        <select name="tipo_usuario" required>
            <option value="freelancer">Freelancer</option>
            <option value="cliente">Cliente</option>
        </select>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <label for="confirmar_senha">Confirmar Senha:</label>
        <input type="password" name="confirmar_senha" required>

        <button type="submit">Registrar</button>
    </form>

    <form action="processar_cadastro.php" method="POST">
    <!-- Campos do formulário -->
</form>

    <a href="login.php">Já tem uma conta? Faça login</a>
</div>

</body>
</html>
