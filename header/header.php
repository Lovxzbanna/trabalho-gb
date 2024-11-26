

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - CemFreelas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Corpo da Página */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #A3D9F7, #4A76A8); /* Gradiente azul claro e escuro */
            color: #333;
            min-height: 100vh;
        }

        /* Estilo para o menu */
        .navbar {
            background: linear-gradient(135deg, #4A76A8, #A3C9FF); /* Gradiente azul */
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 28px;
            color: white;
            font-weight: bold;
        }

        /* Barra de Pesquisa */
        .search-bar {
            flex-grow: 1;
            max-width: 400px;
            display: flex;
            margin-left: 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border-radius: 25px;
            border: 2px solid #A3D9A5; /* Verde claro */
            outline: none;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        .search-bar button {
            padding: 10px 15px;
            background-color: #4C8C6B; /* Verde escuro */
            color: white;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #39765C; /* Verde ainda mais escuro */
        }

        /* Menu de Navegação */
        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #A3D9A5; /* Verde claro para hover */
        }

        .nav-links span {
            color: white;
            font-size: 18px;
        }

        .hamburger-menu {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .hamburger-menu div {
            width: 25px;
            height: 3px;
            background-color: white;
        }

        /* Estilo do menu quando estiver ativo (visível em dispositivos móveis) */
        .nav-links.active {
            display: block;
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            background-color: #4C8C6B; /* Verde escuro */
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                width: 100%;
            }

            .hamburger-menu {
                display: flex;
            }

            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-bar {
                margin-top: 15px;
                width: 100%;
                margin-left: 0;
            }

            .nav-links a {
                font-size: 16px;
            }
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

            <?php if (isset($_SESSION['usuario_email'])) { ?>
                <!-- Exibe as opções quando o usuário está logado -->
                <a href="../perfil/perfil.php">Perfil</a>
                <a href="../projeto/meus_projetos.php">Meus Projetos</a>
                <a href="../projeto/postar_projeto.php">Postar Projeto</a>
                <a href="../header/logout.php">Logout</a>
            <?php } else { ?>
                <!-- Exibe a opção de login quando o usuário não está logado -->
                <a href="../login/login.php">Login</a>
                <!-- Exibe "Bem-vindo, Visitante!" caso o usuário não esteja logado -->
                <span>Bem-vindo, Visitante!</span>
            <?php } ?>
        </div>

        <!-- Hamburger Menu -->
        <div class="hamburger-menu" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </header>

    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
        }
    </script>

</body>
</html>
