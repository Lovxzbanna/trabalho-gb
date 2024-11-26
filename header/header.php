<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabeçalho</title>
</head>
<body>
<style>
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
</style>
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

</body>
</html>