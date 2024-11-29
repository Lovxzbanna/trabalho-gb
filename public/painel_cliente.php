<?php include '../APP/views/header.php'?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - CemFreelas</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<main class="main-content">
    <div class="container">
        <!-- Seção de boas-vindas -->
        <section class="welcome-section">
            <div class="user-info">
                <img src="<?php echo $foto_perfil; ?>" alt="Foto de Perfil" class="profile-pic">
                <div>
                    <h2>Seja bem-vindo, <?php echo $nome_usuario; ?>!</h2>
                    <p>Estamos muito felizes em te ter por aqui. Vamos ajudar você a encontrar as melhores oportunidades ou freelancers para o seu projeto.</p>
                </div>
            </div>
        </section>

        <!-- Container de boas-vindas adicional -->
        <div class="extra-container">
            <p>Bem-vindo ao CemFreelas, a plataforma que conecta freelancers talentosos e clientes em busca de soluções criativas. Encontre o profissional ideal para seu projeto ou publique suas oportunidades para conquistar novos desafios. Cadastre-se agora e comece a explorar as melhores opções para seu trabalho ou projeto!</p>
        </div>

        <!-- Links do Painel do Cliente -->
        <section class="client-panel">
            <h2>Painel do Cliente</h2>
            <div class="client-links">

                <a href="alterar_senha.php">Alterar Senha</a>
                <a href="deletar_conta.php?id=<?php echo $_SESSION['usuario_id']; ?>">Excluir Conta</a>
            </div>
        </section>

        <!-- Como funciona - Cartões informativos -->
        <section class="how-it-work-cards">
            <div class="how-it-work-card">
                <img src="../../img/projetos/publiquepj.jpg" alt="Login" class="card-image">
                <p class="card-description">Acesse sua conta ou cadastre-se para começar a explorar.</p>
            </div>
            <div class="how-it-work-card">
                <img src="../../img/projetos/selecione.avif" alt="Freelancer" class="card-image">
                <p class="card-description">Encontre freelancers talentosos prontos para trabalhar no seu projeto.</p>
            </div>
            <div class="how-it-work-card">
                <img src="../../img/projetos/obtenha.webp " alt="Contrate" class="card-image">
                <p class="card-description">Contrate o freelancer ideal e comece a trabalhar no seu projeto.</p>
            </div>
            <div class="how-it-work-card">
                <img src="../../img/projetos/pagando.avif" alt="Pagamento" class="card-image">
                <p class="card-description">Nós garantimos que o pagamento seja seguro e que ambas as partes fiquem satisfeitas.</p>
            </div>
        </section>
    </div>
          <!-- Banner de Política de Cookies -->
          <div id="cookie-banner" class="cookie-banner">
    <p>Este site utiliza cookies para melhorar a sua experiência. Ao continuar a navegar, você concorda com a nossa 
        <a href="politica-de-cookies.php">Política de Cookies</a>.</p>
    <button id="accept-cookies">Aceitar</button>
</div>
    <!-- Rodapé -->
    <?php include 'footer.php'; ?>
</main>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }
</script>
<script>
    // Verifica se o usuário já aceitou os cookies
    if (!localStorage.getItem('cookiesAccepted')) {
        document.getElementById('cookie-banner').style.display = 'block'; // Mostra o banner
    }

    // Aceitar cookies
    document.getElementById('accept-cookies').addEventListener('click', function() {
        localStorage.setItem('cookiesAccepted', 'true'); // Armazena a aceitação
        document.getElementById('cookie-banner').style.display = 'none'; // Esconde o banner
    });
</script>


</body>
</html>
<?php include '../APP/views/footer.php'?>
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
        line-height: 1.5;
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
        color: black;
    }

    p {
        font-size: 18px;
        color: black;
    }

    /* Links do Painel do Cliente */
    .client-panel {
        margin-top: 40px;
    }

    .client-links a {
        display: block;
        margin: 10px 0;
        font-size: 18px;
        color: #4A76A8;
        text-decoration: none;
    }

    .client-links a:hover {
        text-decoration: underline;
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
        color: black;
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
        color: black;
    }

    .extra-container p {
        font-size: 16px;
        color: #555;
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
           /* Estilos para o banner de cookies */
.cookie-banner {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #D8A6D1; /* Cor de fundo */
    color: white;
    padding: 15px;
    text-align: center;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
    display: none; /* Inicialmente escondido */
}

.cookie-banner p {
    margin: 0;
    display: inline;
}

.cookie-banner a {
    color: white;
    text-decoration: underline;
}

.cookie-banner button {
    background-color: #6A4C9C; /* Cor do botão */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    margin-left: 10px;
}

.cookie-banner button:hover {
    background-color: #4A76A8; /* Cor do botão ao passar o mouse */
}/* Estilos para o banner de cookies */
.cookie-banner {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #D8A6D1; /* Cor de fundo */
    color: white;
    padding: 15px;
    text-align: center;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
    display: none; /* Inicialmente escondido */
}

.cookie-banner p {
    margin: 0;
    display: inline;
}

.cookie-banner a {
    color: white;
    text-decoration: underline;
}

.cookie-banner button {
    background-color: #6A4C9C; /* Cor do botão */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    cursor: pointer;
    margin-left: 10px;
}

.cookie-banner button:hover {
    background-color: #4A76A8; /* Cor do botão ao passar o mouse */
}