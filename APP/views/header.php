<?php 
session_start();

// Verifica se o cookie 'usuario_email' existe e, se existir, armazena na sessão
if (isset($_COOKIE['usuario_email'])) {
    $_SESSION['usuario_email'] = $_COOKIE['usuario_email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><style>
    /* Resetando estilos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Corpo da Página */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

/* Barra de navegação */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #6A4C9C; /* Cor roxa */
    padding: 15px 30px;
    color: white;
}

.navbar .logo {
    font-size: 24px;
    font-weight: bold;
}

/* Barra de Pesquisa */
.search-bar {
    display: flex;
    align-items: center;
    background-color: white;
    border-radius: 20px;
    padding: 5px 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.search-bar input {
    border: none;
    outline: none;
    padding: 8px;
    width: 200px;
    border-radius: 15px;
    font-size: 16px;
}

.search-bar button {
    background-color: #D8A6D1;
    border: none;
    padding: 8px 15px;
    border-radius: 15px;
    cursor: pointer;
    font-size: 16px;
    margin-left: 10px;
}

.search-bar button:hover {
    background-color: #D27EB5;
}

/* Menu de Navegação */
.nav-links {
    display: flex;
    gap: 20px;
    list-style: none;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #D8A6D1;
}

/* Hamburger Menu */
.hamburger-menu {
    display: none;
    cursor: pointer;
    flex-direction: column;
    gap: 5px;
}

.hamburger-menu div {
    width: 30px;
    height: 4px;
    background-color: white;
    transition: transform 0.3s ease;
}

/* Responsividade */
@media (max-width: 768px) {
    .nav-links {
        display: none;
        flex-direction: column;
        align-items: center;
        background-color: #6A4C9C;
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        padding: 10px 0;
    }

    .nav-links.active {
        display: block;
    }

    .nav-links a {
        padding: 10px 20px;
        font-size: 18px;
        width: 100%;
        text-align: center;
        color: white;
        border-top: 1px solid #D8A6D1;
    }

    .hamburger-menu {
        display: flex;
    }
}

</style>

    <header class="navbar">
    <div class="logo">CemFreelas</div>

    <!-- Barra de Pesquisa -->
    <div class="search-bar">
        <input type="text" placeholder="Pesquisar...">
        <button>Pesquisar</button>
        <a href="../../login/pesquisar.php"></a>
    </div>

    <!-- Menu de Navegação -->
    <div class="nav-links">
        <a href="sobre.php">Sobre</a>
        <a href="contato.php">Contato</a>
        <a href="projetos.php">Projetos</a>

        <!-- Exibe Login ou perfil dependendo do estado de login -->
        <?php if (isset($_SESSION['usuario_email'])) { ?>
            <a href="perfil.php">Perfil</a>
            <a href="../public/logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
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
    // Função para alternar o menu em dispositivos móveis
    function toggleMenu() {
        document.querySelector('.nav-links').classList.toggle('active');
    }
</script>

</body></html>