<?php session_start(); ?> <!-- Inicia a sessão PHP -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nós - CemFreelas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Reset de estilos padrões */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da Página */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #4A76A8, #6A4C9C, #D8A6D1); /* Gradiente azul, roxo e rosa */
            color: #333;
            padding: 0;
            min-height: 100vh;
            margin-top: 0px; /* Espaço para o navbar fixo */
        }

        /* Estilos de Navegação */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #6A4C9C;
            padding: 20px;
            color: white;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .search-bar input {
            padding: 8px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            width: 200px;
        }

        .search-bar button {
            padding: 8px 16px;
            background-color: #D8A6D1;
            border: none;
            border-radius: 5px;
            color: white;
        }

        .nav-links a {
            margin: 0 10px;
            text-decoration: none;
            color: white;
            font-size: 18px;
        }

        .nav-links a:hover {
            color: #D8A6D1;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                width: 100%;
                background-color: #D8A6D1;
                padding: 10px 0;
                position: absolute;
                top: 60px;
                left: 0;
            }

            .nav-links.active {
                display: block;
            }

            .hamburger-menu {
                cursor: pointer;
                display: block;
            }

            .hamburger-menu div {
                width: 30px;
                height: 4px;
                background-color: white;
                margin: 5px 0;
            }

            .nav-links {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        }

        /* Container principal */
        .container {
            width: 100%;
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Títulos */
        h2, h3, h4 {
            color: #FF5D8F; /* Cor de destaque rosa para títulos */
            margin-bottom: 20px;
            font-weight: bold;
        }

        h2 {
            font-size: 32px;
        }

        h3 {
            font-size: 28px;
        }

        h4 {
            font-size: 22px;
        }

        /* Parágrafos */
        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        /* Listas */
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        ul li {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        /* Estilo para links */
        a {
            color: #FF5D8F; /* Cor rosa para links */
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Informações de Contato e Redes Sociais */
        .contact-info, .social-links {
            font-size: 18px;
            margin-top: 30px;
        }

        .contact-info p, .social-links p {
            margin: 10px 0;
        }

        .social-links ul {
            list-style: none;
            padding: 0;
        }

        .social-links ul li {
            margin: 5px 0;
        }

        .social-links ul li a {
            color: #FF5D8F;
            text-decoration: none;
            font-weight: 500;
        }

        .social-links ul li a:hover {
            text-decoration: underline;
        }

        /* Estilo do Footer */
        footer {
            background-color: transparent; /* Cor de fundo azul do painel */
            color: white;
            padding: 25px;
            text-align: center;
            margin-top: 50px;
            border-radius: 0 0 15px 15px;
        }
    </style>
</head>
<body>
  <!-- Navbar -->
  <header class="navbar">
        <div class="logo">CemFreelas</div>

        <!-- Barra de Pesquisa -->
        <form action="../login/pesquisar.php" method="GET" class="search-bar">
            <input type="text" name="query" placeholder="Pesquisar...">
            <button type="submit">Pesquisar</button>
        </form>

        <!-- Menu de Navegação -->
        <div class="nav-links">
            <a href="../header/sobre.php">Sobre</a>
            <a href="../header/contato.php">Contato</a>
            <a href="projetos.php">Projetos</a>

            <!-- Exibe Login ou perfil dependendo do estado de login -->
            <?php if (isset($_SESSION['usuario_email'])) { ?>
                <a href="../perfil/perfil.php">Perfil</a>
                <a href="../header/logout.php">Logout</a>
            <?php } else { ?>
                <a href="../login/login.php">Login</a>
            <?php } ?>
        </div>

        <!-- Hamburger Menu -->
        <div class="hamburger-menu" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <div class="container">
        <h2>Bem-vindo ao CemFreelas: A Plataforma Perfeita para Freelancers e Clientes!</h2>
        <p>O <strong>CemFreelas</strong> é um site inovador que conecta freelancers e clientes, proporcionando um ambiente dinâmico onde projetos podem ser propostos, contratados e avaliados de forma simples e segura. Se você é freelancer e busca novos desafios, ou se você é cliente em busca de profissionais para realizar seus projetos, o CemFreelas é o lugar certo para você!</p>

        <p>Nosso sistema é estruturado para atender a diferentes tipos de usuários, com funcionalidades voltadas para facilitar a criação de projetos, comunicação entre as partes e uma avaliação transparente das experiências. Abaixo, explicamos como o site funciona para cada tipo de usuário.</p>

        <h3>Para o Usuário:</h3>
        <p>Se você está visitando o CemFreelas pela primeira vez, seja como freelancer ou cliente, veja o que oferecemos:</p>
        <ul>
            <li><strong>Criação de Projetos:</strong> Crie um projeto detalhado, defina as suas expectativas e aguarde as propostas dos freelancers.</li>
            <li><strong>Busca por Freelancers:</strong> Navegue por perfis de freelancers com base nas suas habilidades, experiências e avaliações.</li>
            <li><strong>Transações Seguras:</strong> Acesse uma plataforma de pagamento segura, garantindo que todos os processos sejam transparentes.</li>
        </ul>

        <h4>Redes Sociais e Contato:</h4>
        <div class="social-links">
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">LinkedIn</a></li>
            </ul>
        </div>

        <div class="contact-info">
            <p>Email: contato@cemfreelas.com.br</p>
            <p>Telefone: (11) 99999-9999</p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 CemFreelas - Todos os direitos reservados.</p>
    </footer>

    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('show');
        }
    </script>
</body>
</html>
