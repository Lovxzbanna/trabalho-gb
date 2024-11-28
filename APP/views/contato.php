<?php include 'header.php' ?>
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
            background: linear-gradient(135deg, #4A76A8, #D8A6D1); /* Gradiente rosa e roxo */
            color: #333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centraliza a página */
            min-height: 100vh;
        }

        /* Header */
        header.navbar {
            width: 100%; /* Ocupa toda a largura da tela */
            background-color: #6A4C9C; /* Cor roxa */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px 20px; /* Adiciona espaçamento nas laterais */
            position: fixed; /* Fixa o cabeçalho no topo */
            top: 0; /* Fixa no topo */
            left: 0; /* Fixa na borda esquerda */
            z-index: 1000; /* Garante que o cabeçalho fique acima de outros elementos */
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        header.navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #fff; /* Cor branca para o logo */
            text-decoration: none;
        }

        header.navbar .nav-links {
            display: flex;
            gap: 20px;
        }

        header.navbar .nav-links a {
            color: #fff; /* Cor branca para os links */
            text-decoration: none;
            font-size: 16px;
        }

        header.navbar .nav-links a:hover {
            color: #D8A6D1; /* Cor laranja ao passar o mouse */
        }

        /* Barra de pesquisa */
        header .search-bar {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-bar input {
            padding: 8px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            width: 200px;
        }


        header .search-bar input[type="text"]:focus {
            border-color: #FF7F50; /* Laranja */
        }

        .search-bar button {
            padding: 8px 16px;
            background-color: #D8A6D1;
            border: none;
            border-radius: 5px;
            color: white;
        }

        header .search-bar button:hover {
            background-color: #FF7F50; /* Laranja */
        }

        /* Menu hamburguer (responsivo) */
        .hamburger-menu {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .hamburger-menu div {
            width: 25px;
            height: 3px;
            background-color: #fff; /* Cor branca para as linhas do hamburguer */
        }

        /* Responsividade: exibe o menu hamburguer em telas menores */
        @media (max-width: 768px) {
            header.navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            header.navbar .nav-links {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                width: 100%;
            }

            .hamburger-menu {
                display: flex;
            }

            /* Exibe o menu de navegação em telas menores quando a classe 'active' for adicionada */
            .nav-links.active {
                display: block;
            }

            .nav-links {
                display: none; /* Esconde o menu inicialmente */
                width: 100%;
                padding-left: 20px;
            }
        }

        /* Resetando estilos para o corpo da página */
        body {
            padding-top: 90px; /* Espaço para o cabeçalho fixo */
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
            background-color: pink ; /* Laranja */
            width: 50%;
            color: black;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: purple ; /* Laranja escuro */
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

<!-- Conteúdo principal -->
<div class="container">
    <h1>Entre em contato conosco</h1>

    <form action="mensagem.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" required></textarea>

        <button type="submit">Enviar Mensagem</button>
    </form>

    <div class="contact-info">
        <p>Você também pode nos encontrar em:</p>
        <p>Email: contato@cemfreelas.com</p>
        <p>Telefone: (11) 99999-9999</p>
    </div>

    <div class="social-links">
        <p>Redes sociais:</p>
        <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>
</div>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }
</script>

</body>
<?php include 'footer.php'?>
</html>
