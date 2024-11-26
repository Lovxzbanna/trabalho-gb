<?php 
// Inclusão dos arquivos de conexão e de usuário
require_once '../db/DB.php';
require_once '../db/Usuario.php';

// Conexão com o banco de dados
$database = new DB();
$conn = $database->connect();

// Variáveis padrão para usuário não logado
$nome_usuario = 'Visitante';
$foto_perfil = '../img/projetos/fotoperfil.png'; // Foto de perfil padrão

// Verifica se o usuário está logado
if (isset($_SESSION['usuario_email'])) {
    $email_usuario = $_SESSION['usuario_email'];
    $usuario = new Usuario($conn);
    $usuario_data = $usuario->getUsuarioByEmail($email_usuario);

    if ($usuario_data) {
        $nome_usuario = $usuario_data['nome'];
        // Verifica se o usuário tem foto de perfil, senão usa a foto padrão
        $foto_perfil = !empty($usuario_data['foto_perfil']) ? $usuario_data['foto_perfil'] : $foto_perfil;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - CemFreelas</title>
    <style>
        /* Seu código CSS aqui */
    </style>
</head>
<body>
    <style>
        /* Resetando estilos */
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
            line-height: 1.6;
        }

        /* Layout principal */
        .main-content {
            padding: 40px 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Seção de boas-vindas */
        .welcome-section {
            display: flex;
            justify-content: space-between;
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
            color: #6A4C9C;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        /* Cartões informativos */
        .how-it-work-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 40px;
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
            color: #6A4C9C;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 16px;
            color: #666;
        }

        /* Container adicional de boas-vindas */
        .extra-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            color: #6A4C9C;
        }

        .extra-container p {
            font-size: 16px;
            color: #555;
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
            .how-it-work-cards {
                flex-direction: column;
                align-items: center;
            }

            .how-it-work-card {
                width: 80%;
                margin: 10px 0;
            }

            .hamburger-menu {
                display: block;
            }

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

            .hamburger-menu div {
                width: 30px;
                height: 4px;
                background-color: white;
                margin: 5px 0;
            }

            .hamburger-menu {
                cursor: pointer;
                display: none;
            }
        }

        /* Rodapé */
        footer {
            background-color: #6A4C9C;
            padding: 20px;
            color: white;
            text-align: center;
        }

        footer a {
            color: #D8A6D1;
            text-decoration: none;
            margin: 0 10px;
        }

        footer a:hover {
            color: #fff;
        }
</style>
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

<main class="main-content">
    <div class="container">
        <!-- Seção de boas-vindas -->
        <section class="welcome-section">
            <div class="user-info">
                <img src="<?php echo htmlspecialchars($foto_perfil); ?>" alt="Foto de Perfil" class="profile-pic">
                <div>
                    <!-- Verifique se $nome_usuario não é null antes de usá-lo -->
                    <h2>Seja bem-vindo, <?php echo htmlspecialchars($nome_usuario ? $nome_usuario : 'Visitante'); ?>!</h2>
                    <p>Estamos muito felizes em te ter por aqui. Vamos ajudar você a encontrar as melhores oportunidades ou freelancers para o seu projeto.</p>
                </div>
            </div>
        </section>

        <!-- Container de boas-vindas adicional -->
        <div class="extra-container">
            <p>Bem-vindo ao CemFreelas, a plataforma que conecta freelancers talentosos e clientes em busca de soluções criativas. Encontre o profissional ideal para seu projeto ou publique suas oportunidades para conquistar novos desafios. Cadastre-se agora e comece a explorar as melhores opções para seu trabalho ou projeto!</p>
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

    <!-- Rodapé -->
    <?php include '../header/footer.php'; ?>
</main>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }
</script>

</body>
</html>
