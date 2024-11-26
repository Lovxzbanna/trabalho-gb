<?php
// Incluindo as dependências
include_once '../db/DB.php'; // Incluindo a conexão com o banco
include_once '../db/Usuario.php'; // Incluindo a classe Usuario

// Conectando ao banco de dados
$db = new DB();
$conn = $db->connect(); // Estabelece a conexão com o banco

// Verificando se a conexão foi bem-sucedida
if ($conn === null) {
    die("Erro ao conectar ao banco de dados.");
}

// Iniciando a sessão se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificando se o usuário está logado
if (!isset($_SESSION['usuario_email'])) {
    header("Location: login.php"); // Redireciona para a página de login
    exit();
}

$email_usuario = $_SESSION['usuario_email'];

// Criando uma instância da classe Usuario
$user = new Usuario($conn);

// Recuperando os dados do usuário usando o método getUsuarioByEmail
$usuario = $user->obterNomePorEmail($email_usuario);

// Verificando se o usuário foi encontrado
if ($usuario === false) {
    die("Usuário não encontrado.");
}

// Definindo os dados do usuário
$nome_usuario = isset($usuario['nome']) ? htmlspecialchars($usuario['nome']) : 'Usuário Anônimo';
$email_usuario = isset($usuario['email']) ? htmlspecialchars($usuario['email']) : 'Não informado';
$foto_perfil = isset($usuario['foto_perfil']) && !empty($usuario['foto_perfil'])
    ? htmlspecialchars($usuario['foto_perfil'])
    : 'uploads/fotos_perfil/default-avatar.png'; // Foto de perfil ou padrão
$redes_sociais = isset($usuario['redes_sociais']) ? htmlspecialchars($usuario['redes_sociais']) : '';
$portfolio = isset($usuario['portfolio']) ? htmlspecialchars($usuario['portfolio']) : '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Perfil - CemFreelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> <!-- Link do Bulma -->
    <style>
        /* Estilos Gerais */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6f42c1, #ff80bf); /* Gradiente de roxo e rosa */
            color: #333333; /* Cor das letras ajustada para um tom escuro */
        }

        /* Cabeçalho */
        header {
            background-color: #8e44ad; /* Roxo suave */
            color: #ffffff; /* Cor das letras no cabeçalho alterada para branco */
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
        }

        .logo h1 {
            padding: 30px 10px 10px 0;
            font-size: 24px;
            margin: 0;
        }

        .logo a {
            text-decoration: none;
            color: #ffffff; /* Cor das letras no cabeçalho alterada para branco */
        }

        .logo a:hover {
            text-decoration: underline;
        }

        /* Barra de Pesquisa */
        .barra-pesquisa {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            padding: 10px;
            border-radius: 25px;
            margin-right: 20px;
            max-width: 300px;
            width: 100%;
        }

        .barra-pesquisa input {
            width: 100%;
            padding: 10px;
            border-radius: 25px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .barra-pesquisa button {
            background-color: #ff4d94;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }

        /* Menu de navegação */
        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ff4d94; /* Rosa mais suave */
        }

        .menu ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .menu ul li {
            padding: 0 15px;
        }

        .menu ul li a {
            text-decoration: none;
            color: #ffffff;
            font-size: 18px;
        }

        .menu ul li a:hover {
            text-decoration: underline;
        }

        .usuario-info {
            color: #ffffff;
            font-size: 18px;
            margin-left: 20px;
        }

        /* Estilo do conteúdo da página */
        .profile-container {
            margin-top: 30px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 800px;
            margin: 0 auto;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .profile-header .image {
            margin-right: 20px;
        }

        .profile-header .image img {
            border-radius: 50%;
            width: 128px;
            height: 128px;
            object-fit: cover;
            border: 2px solid #ff4d94;
        }

        .profile-header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }

        .profile-header p {
            font-size: 16px;
            color: #777777;
        }

        .profile-section {
            margin-top: 20px;
        }

        .profile-section h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333333;
        }

        .profile-section p {
            font-size: 16px;
            color: #555555;
        }

        .buttons a {
            margin-top: 20px;
        }

        .buttons .button {
            width: 100%;
            margin-bottom: 10px;
        }

        /* Cores dos botões */
        .button.is-link {
            background-color: #8e44ad; /* Roxo suave */
            color: white;
        }

        .button.is-info {
            background-color: #3498db; /* Azul */
            color: white;
        }

        .button.is-danger {
            background-color: #e74c3c; /* Vermelho */
            color: white;
        }

        /* Responsividade */
        @media screen and (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .profile-container {
                margin-top: 20px;
                padding: 20px;
            }

            .profile-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .buttons .button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Header adicionado aqui -->
<header>
    <!-- Logo e nome do site -->
    <div class="logo">
        <a href="../painel/painel.php">
            <h1>CemFreelas</h1>
        </a>
    </div>

    <!-- Barra de Pesquisa -->
    <div class="barra-pesquisa">
        <input type="text" placeholder="Pesquise por freelancer ou projeto..." />
        <button>Pesquisar</button>
    </div>

    <!-- Menu de Navegação -->
    <nav class="menu">
        <ul>
            <li><a href="projetos.php">Projetos</a></li>
            <li><a href="perfil.php">Meu Perfil</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </nav>

    <!-- Informações do Usuário -->
    <div class="usuario-info">
        <span>Bem-vindo, <?php echo $nome_usuario; ?>!</span>
    </div>
</header>

<!-- Conteúdo principal da página de perfil -->
<main>
    <section class="section">
        <div class="container">
            <div class="profile-container">
                <div class="profile-header">
                    <div class="image">
                        <img src="<?php echo $foto_perfil; ?>" alt="Foto de Perfil" class="is-rounded">
                    </div>
                    <div>
                        <h2><?php echo $nome_usuario; ?></h2>
                        <p><strong>E-mail:</strong> <?php echo $email_usuario; ?></p>
                    </div>
                </div>

                <div class="profile-section">
                    <h3>Redes Sociais</h3>
                    <?php if (!empty($redes_sociais)): ?>
                        <p><a href="<?php echo $redes_sociais; ?>" target="_blank">Visitar perfil</a></p>
                    <?php else: ?>
                        <p>Não informado</p>
                    <?php endif; ?>
                </div>

                <div class="profile-section">
                    <h3>Portfólio</h3>
                    <?php if (!empty($portfolio)): ?>
                        <p><a href="<?php echo $portfolio; ?>" target="_blank">Ver portfólio</a></p>
                    <?php else: ?>
                        <p>Não informado</p>
                    <?php endif; ?>
                </div>

                <div class="buttons">
                    <a href="editar_perfil.php" class="button is-link">Editar Perfil</a>
                    <a href="alterar_senha.php" class="button is-info">Alterar Senha</a>
                    <a href="deletar_conta.php" class="button is-danger" onclick="return confirm('Tem certeza de que deseja deletar sua conta? Esta ação não pode ser desfeita.');">Deletar Conta</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../header/footer.php'; ?>

</body>
</html>
