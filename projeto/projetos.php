        <?php
        // Iniciar a sessão e verificar o usuário
        session_start();
        if (!isset($_SESSION['usuario_email'])) {
            echo "
            <div class='alerta'>
                <i class='fas fa-exclamation-triangle'></i>
                <span>Você precisa estar logado para acessar esta página.</span>
            </div>
            ";
            exit;
        }

        // Incluir os arquivos de banco de dados e classes
        include '../db/db.php';
        include '../db/Projeto.php';
        include '../db/Favorito.php';

        $usuario_id = 1; // O ID do usuário deve ser dinâmico, você pode pegá-lo da sessão

        // Instanciar a classe Database e fazer a conexão
        $db = new DB();
        $conn = $db->connect(); // Usar o método connect para obter a conexão

        // Instanciar as classes usando a conexão correta
        $projetoObj = new Projeto($conn);
        $favoritoObj = new Favorito($conn);

        // Verificar se há um termo de pesquisa
        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

        // Recuperar os projetos com base no termo de pesquisa
        $projetos = $searchQuery ? $projetoObj->buscarProjetos($searchQuery) : $projetoObj->buscarProjetos(''); // Buscar todos os projetos se não houver busca

        // Verificar o tipo de usuário (cliente ou freelancer)
        $usuario_tipo = isset($_SESSION['usuario_tipo']) ? $_SESSION['usuario_tipo'] : 'cliente'; // Aqui assumimos que o tipo de usuário é armazenado na sessão
        ?>

        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Projetos Postados</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            
            <style>
                /* Estilos do CSS */
                body {
                    font-family: 'Roboto', sans-serif;
                    background: linear-gradient(135deg, #6A4C9C, #D8A6D1); /* Gradiente roxo e rosa */
                    margin: 0;
                    padding: 0;
                }

                .alerta {
                    display: flex;
                    align-items: center;
                    background-color: #f8d7da;
                    color: #721c24;
                    border: 1px solid #f5c6cb;
                    padding: 15px;
                    border-radius: 8px;
                    font-family: 'Roboto', sans-serif;
                    margin: 20px auto;
                    max-width: 00px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                .alerta i {
                    font-size: 24px;
                    margin-right: 10px;
                }

                .alerta span {
                    font-size: 16px;
                    font-weight: 500;
                }

                .caixa-projeto {
                    background-color: #fff;
                    padding: 10px;
                    margin: 10px 500px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                }

                .caixa-projeto h3 {
                    font-size: 24px;
                    color: #333;
                }

                .caixa-projeto p {
                    font-size: 16px;
                    color: #666;
                }

                .caixa-projeto img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 8px;
                    margin-top: 10px;
                }

                .caixa-projeto .btn-postar,
                .caixa-projeto .btn-detalhes,
                .caixa-projeto .btn-carrinho,
                .caixa-projeto .btn-mensagem {
                    display: inline-block;
                    padding: 10px 20px;
                    margin: 10px 5px;
                    background-color: #D8A6D1;
                    color: #fff;
                    border-radius: 5px;
                    text-decoration: none;
                    font-weight: 100;
                    transition: background-color 0.3s;
                }

                .caixa-projeto .btn-postar {
                    background-color: #D8A6D1;
                }

                .caixa-projeto .btn-detalhes:hover,
                .caixa-projeto .btn-carrinho:hover,
                .caixa-projeto .btn-mensagem:hover {
                    background-color: #6A4C9C;
                }

                .caixa-projeto .btn-postar:hover {
                    background-color: #6A4C9C;
                }

                h2 {
                    color: #fff;
                    font-size: 28px;
                    text-align: center;
                    margin-top: 30px;
                }

                .search-box {
                    text-align: center;
                    margin-top: 20px;
                }

                .search-box input[type="text"] {
                    padding: 10px;
                    width: 300px;
                    border-radius: 5px;
                    border: 1px solid #ccc;
                    margin-right: 10px;
                }

                .search-box button {
                    padding: 10px 20px;
                    background-color: #D8A6D1;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .search-box button:hover {
                    background-color: #6A4C9C;
                }

                /* Cabeçalho */
                .navbar {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    background: linear-gradient(135deg, #6A4C9C, #D8A6D1);
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
        </head>
        <body>

        <!-- Cabeçalho -->
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

                    <?php if ($usuario_tipo !== 'cliente') { // Exibe para freelancers -->
                        ?>
                        <a href="../projeto/meus_projetos.php">Meus Projetos</a>
                        <a href="../projeto/postar_projeto.php">Postar Projeto</a>
                    <?php } ?>
                    
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

        <!-- Caixa de busca de projetos -->
        <div class="search-box">
            <form action="projetos.php" method="get">
                <input type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Buscar projetos...">
                <button type="submit">Buscar</button>
            </form>
        </div>

        

        <h2>Projetos Postados</h2>

        <?php if (count($projetos) > 0): ?>
            <?php foreach ($projetos as $projeto): ?>
                <?php 
                    // Verificar se o projeto foi favoritado
                    $favoritado = $favoritoObj->isFavoritado($projeto['projeto_id'], $usuario_id);
                ?>
                <div class="caixa-projeto">
                    <h3><?php echo htmlspecialchars($projeto['nome_produto']); ?></h3>
                    <p><?php echo htmlspecialchars($projeto['descricao']); ?></p>
                    <img src="<?php echo htmlspecialchars($projeto['foto']); ?>" alt="Imagem do projeto">
                    <p>Valor: R$ <?php echo number_format($projeto['valor'], 2, ',', '.'); ?></p>
                    <a href="detalhes_projeto.php?projeto_id=<?php echo $projeto['projeto_id']; ?>" class="btn-detalhes">Ver Detalhes</a>
                    <a href="comprar_projeto.php?projeto_id=<?php echo $projeto['projeto_id']; ?>" class="btn-carrinho">
                        <i class="fas fa-shopping-cart"></i> 
                    </a>
                    <a href="enviar_mensagem.php?projeto_id=<?php echo $projeto['projeto_id']; ?>" class="btn-mensagem">
                        <i class="fas fa-comment-alt"></i> Enviar Mensagem
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum projeto encontrado.</p>
        <?php endif; ?>

        </body>
        </html>

        <?php
        // Fechar a conexão com o banco de dados
        $db = null;
        ?>
