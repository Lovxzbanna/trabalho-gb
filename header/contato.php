<?php include '../header/header.php'; // Incluindo o cabeçalho do site ?>

<?php
// Processar o formulário quando for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $mensagem = new Mensagem($db);
    $mensagem->nome = htmlspecialchars($_POST['nome']); // Proteção contra injeção de HTML
    $mensagem->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Sanitização do e-mail
    $mensagem->mensagem = htmlspecialchars($_POST['mensagem']); // Proteção contra injeção de HTML

    if ($mensagem->salvarMensagem()) {
        echo "<p>Mensagem enviada com sucesso! Obrigado por entrar em contato.</p>";
    } else {
        echo "<p>Houve um erro ao enviar sua mensagem. Por favor, tente novamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco - CemFreelas</title>
    <style>
        /* Resetando estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fb; /* Cor de fundo clara */
            color: #333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centraliza a página */
            min-height: 100vh;
        }

        /* Container principal */
        .container {
            width: 100%;
            max-width: 900px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 30px;
        }

        h1 {
            font-size: 30px;
            color: #3b3f47;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Formulário de contato */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], textarea {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, textarea:focus {
            border-color: #FF7F50; /* Laranja */
            background-color: #ffffff;
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            padding: 12px 20px;
            background-color: #FF7F50; /* Laranja */
            width: 50%;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #E75A28; /* Laranja escuro */
        }

        /* Estilos para os links */
        a {
            color: #FF7F50; /* Laranja */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Informações de contato */
        .contact-info, .social-links {
            margin-top: 40px;
        }

        .contact-info p, .social-links p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .social-links ul {
            list-style-type: none;
            padding: 0;
        }

        .social-links li {
            margin-bottom: 8px;
        }

        .social-links a {
            font-size: 16px;
            color: #3b3f47; /* Cor escura para links */
            text-decoration: none;
        }

        .social-links a:hover {
            text-decoration: underline;
        }

        /* Estilos responsivos */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>


    <div class="container">
        <!-- Título -->
        <h1>Fale Conosco</h1>

        <!-- Formulário de Contato -->
        <form method="POST" action="fale_conosco.php">
            <label for="nome">Seu Nome</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo">

            <label for="email">Seu E-mail</label>
            <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">

            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" required placeholder="Escreva sua mensagem aqui..."></textarea>

            <button type="submit">Enviar Mensagem</button>
        </form>

        <!-- Informações de Contato -->
        <div class="contact-info">
            <h2>Informações de Contato</h2>
            <p><strong>Telefone:</strong> (11) 1234-5678</p>
            <p><strong>E-mail:</strong> <a href="mailto:contato@cemfreelas.com.br">contato@cemfreelas.com.br</a></p>
        </div>

        <!-- Redes Sociais -->
        <div class="social-links">
            <h2>Siga-nos nas Redes Sociais</h2>
            <ul>
                <li><a href="https://facebook.com/cemfreelas" target="_blank">Facebook: facebook.com/cemfreelas</a></li>
                <li><a href="https://instagram.com/cemfreelas" target="_blank">Instagram: @cemfreelas</a></li>
                <li><a href="https://twitter.com/cemfreelas" target="_blank">Twitter: @cemfreelas</a></li>
                <li><a href="https://linkedin.com/company/cemfreelas" target="_blank">LinkedIn: linkedin.com/company/cemfreelas</a></li>
            </ul>
        </div>
    </div>

    <!-- Rodapé -->
    <?php include '../header/footer.php'; ?>

</body>
</html>
