<?php
// Incluir as classes necessárias
require_once '../../db/Database.php';
require_once '../controllers/ProjetoController.php';
require_once '../models/Usuario.php';

// Criar instância do controlador de projetos e conectar ao banco de dados
$database = new Database();
$conn = $database->getConnection();

// Verificar se o usuário está logado
$usuario_nome = 'Visitante';
if (isset($_SESSION['usuario_email'])) {
    $usuario_email = $_SESSION['usuario_email'];
    $usuario = new Usuario($conn);
    $usuario_nome = $usuario->obterNomePorEmail($usuario_email);  // Recupera o nome do usuário
}

// Criar instância do controlador de projetos
$projetoController = new ProjetoController();

// Obter a lista de todos os projetos
$projetos = $projetoController->listarProjetos();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Projetos - CemFreelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
        /* Estilos personalizados */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1e5f7; /* Cor de fundo suave em tom de roxo */
            padding-top: 0;
        }

        .container {
            padding: 20px;
        }

        .no-results {
            font-size: 1.2em;
            color: #6a4c9c; /* Roxo mais escuro */
            margin-top: 20px;
        }

        .box {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .box:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .box h3 {
            color: #6a4c9c; /* Roxo para os títulos */
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .box p {
            color: #6a4c9c; /* Roxo mais suave para o texto */
            font-size: 1em;
            margin-bottom: 15px;
        }

        .button.is-link {
            background-color: #6a4c9c; /* Roxo para o botão */
            color: #fff;
            font-size: 1em;
            padding: 10px 20px;
            text-transform: uppercase;
        }

        .button.is-link:hover {
            background-color: #542a76; /* Roxo escuro ao passar o mouse */
        }

        .title {
            color: #6a4c9c; /* Roxo para o título principal */
        }
    </style>
</head>

<body>

<!-- Inclusão do header -->
<?php require_once 'header.php'; ?>

<!-- Conteúdo Principal -->
<div class="container">
    <h2 class="title">Todos os Projetos</h2>

    <?php if (count($projetos) > 0): ?>
        <div class="columns is-multiline">
            <?php foreach ($projetos as $projeto): ?>
                <div class="column is-one-third">
                    <div class="box">
                        <h3><?php echo htmlspecialchars($projeto['titulo']); ?></h3>
                        <p><?php echo htmlspecialchars($projeto['descricao']); ?></p>
                        <?php if (isset($_SESSION['usuario_email'])): ?>
                            <a href="../login/detalhes.php?projeto_id=<?php echo $projeto['projeto_id']; ?>" class="button is-link">Ver detalhes</a>
                        <?php else: ?>
                            <p>Para ver mais detalhes, <a href="login.php" class="button is-link">faça login</a>.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="no-results">Nenhum projeto encontrado.</p>
    <?php endif; ?>
</div>

<!-- Inclusão do footer -->
<?php require_once 'footer.php'; ?>

</body>
</html>
