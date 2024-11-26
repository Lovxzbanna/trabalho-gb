<?php 
session_start();

// Verifica se o cookie 'usuario_email' existe e, se existir, armazena na sessão
if (isset($_COOKIE['usuario_email'])) {
    $_SESSION['usuario_email'] = $_COOKIE['usuario_email'];
}
?>

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
            background: linear-gradient(135deg, #4A76A8, #6A4C9C, #D8A6D1); /* Gradiente azul, roxo e rosa */
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Estilo para o menu */
        .navbar {
            background-color: #6A4C9C; /* Cor do header ajustada para roxo */
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .navbar .logo {
            font-size: 24px;
            color: white;
            font-weight: bold;
        }

        /* Barra de Pesquisa */
        .search-bar {
            flex-grow: 1;
            max-width: 350px;
            display: flex;
            margin-left: 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 8px;
            border-radius: 20px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        .search-bar button {
            padding: 8px 12px;
            background-color: #D8A6D1;
            color: white;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #B983C1;
        }

        /* Menu de Navegação */
        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 8px 12px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: #0056b3;
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
            background-color: #6A4C9C;
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
                margin-top: 10px;
                width: 100%;
                margin-left: 0;
            }

            .nav-links a {
                font-size: 14px;
                padding: 12px 0;
                width: 100%;
                border-radius: 0;
            }
        }

        /* Estilo do conteúdo principal */
        .main-content {
            padding: 20px;
            flex: 1;
            background-color: #f4f7fb;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Estilo do painel */
        .welcome-section {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 40px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .profile-pic {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border: 4px solid #D8A6D1;
            object-fit: cover;
        }

        h2 {
            font-size: 26px;
            color: black;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        .extra-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            color: black;
        }

        .extra-container p {
            font-size: 16px;
            color: #555;
        }

        /* Cards explicativos */
        .how-it-work-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 50px;
        }

        .how-it-work-card {
            background-color: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 22%;
            padding: 20px;
            border-radius: 8px;
            transition: transform 0.3s ease;
            text-align: center;
            overflow: hidden;
        }

        .how-it-work-card:hover {
            transform: translateY(-10px);
        }

        .card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 20px;
            color: black;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 16px;
            color: #666;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <header class="navbar">
        <div class="logo">CemFreelas</div>

        <!-- Barra de Pesquisa -->
        <div class="search-bar">
            <input type="text" placeholder="Pesquisar...">
            <button>Pesquisar</button>
        </div>

        <!-- Menu de Navegação -->
        <div class="nav-links">
            <a href="../header/sobre.php">Sobre</a>
            <a href="../header/contato.php">Contato</a>
            <a href="../projeto/projetos.php">Projetos</a>

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

    <!-- Conteúdo da Página -->
    <main class="main-content">
        <div class="container">
            <!-- Seção de boas-vindas -->
            <section class="welcome-section">
                <div class="user-info">
                    <img src="../img/projetos/fotoperfil.png" alt="Foto de Perfil" class="profile-pic">
                    <div>
                        <h2>Seja bem-vindo, <?php echo $_SESSION['usuario_email']; ?>!</h2>
                        <p>Conte-nos sobre o seu projeto ou procure por freelancers incríveis.</p>
                    </div>
                </div>
            </section>

            <!-- Seção Extra -->
            <div class="extra-container">
                <p>Se você tiver alguma dúvida, consulte nossa seção de ajuda ou entre em contato conosco.</p>
            </div>
        </div>
             <!-- Como funciona - Cartões informativos -->
        <section class="how-it-work-cards">
            <div class="how-it-work-card">
                <img src="../img/projetos/publiquepj.jpg" alt="Login" class="card-image">
                <p class="card-description">Acesse sua conta ou cadastre-se para começar a explorar.</p>
            </div>
            <div class="how-it-work-card">
                <img src="../img/projetos/selecione.avif" alt="Freelancer" class="card-image">
                <p class="card-description">Encontre freelancers talentosos prontos para trabalhar no seu projeto.</p>
            </div>
            <div class="how-it-work-card">
                <img src="../img/projetos/obtenha.webp" alt="Contrate" class="card-image">
                <p class="card-description">Contrate o freelancer ideal e comece a trabalhar no seu projeto.</p>
            </div>
            <div class="how-it-work-card">
                <img src="../img/projetos/pagando.avif" alt="Pagamento" class="card-image">
                <p class="card-description">Nós garantimos que o pagamento seja seguro e que ambas as partes fiquem satisfeitas.</p>
            </div>
        </section>
    </div>

</main>

    <script>
        // Função para alternar o menu em dispositivos móveis
        function toggleMenu() {
            document.querySelector('.nav-links').classList.toggle('active');
        }
    </script>
    <?php include '../header/footer.php'?>
</body>
</html>
