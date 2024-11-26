<?php
// Iniciar a sessão
session_start();

// Incluir as classes
include_once '../db/DB.php';
include_once '../db/projeto.php';
include_once '../db/Usuario.php';

// Criar instância da classe de banco de dados e conectar
$db = new db();
$conn = $db->connect();

// Obter o termo de busca
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Verificar se o usuário está logado
$usuario_nome = 'Visitante';
if (isset($_SESSION['usuario_email'])) {
    $usuario_email = $_SESSION['usuario_email'];
    $usuario = new Usuario($conn);
    $usuario_nome = $usuario->obterNomePorEmail($usuario_email);  // Aqui não deverá mais dar erro
}

// Buscar os projetos
$projeto = new Projeto($conn);
$resultados = [];
if ($query) {
    $resultados = $projeto->buscarProjetos($query);
}



// Buscar os projetos
$projeto = new Projeto($conn);
$resultados = [];
if ($query) {
    $resultados = $projeto->buscarProjetos($query);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa - CemFreelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <style>
        /* Estilos personalizados */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            padding-top: 0;
        }

        .container {
            padding: 20px;
        }

        .no-results {
            font-size: 1.2em;
            color: #555;
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
            color: #4a76a8;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .box p {
            color: #666;
            font-size: 1em;
            margin-bottom: 15px;
        }

        .button.is-link {
            background-color: #4a76a8;
            color: #fff;
            font-size: 1em;
            padding: 10px 20px;
            text-transform: uppercase;
        }

        .button.is-link:hover {
            background-color: #3a5a7e;
        }

        .title {
            color: #4a76a8;
        }
    </style>
</head>

<body>

<!-- Inclusão do header -->
<?php include_once '../header/header.php'; ?>

<!-- Conteúdo Principal -->
<div class="container">
    <h2 class="title">Resultados para: "<?php echo htmlspecialchars($query); ?>"</h2>

    <?php if (count($resultados) > 0): ?>
        <div class="columns is-multiline">
            <?php foreach ($resultados as $projeto): ?>
                <div class="column is-one-third">
                    <div class="box">
                        <h3><?php echo htmlspecialchars($projeto['nome_produto']); ?></h3>
                        <p><?php echo htmlspecialchars($projeto['descricao']); ?></p>
                        <?php if (isset($_SESSION['usuario_email'])): ?>
                            <a href="../login/detalhes.php?projeto_id=<?php echo $projeto['projeto_id']; ?>" class="button is-link">Ver detalhes</a>
                        <?php else: ?>
                            <p>Para ver mais detalhes, <a href="../login/login.php" class="button is-link">faça login</a>.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="no-results">Nenhum resultado encontrado para "<?php echo htmlspecialchars($query); ?>"</p>
    <?php endif; ?>
    
</div>
</body>
</html>   
<!-- Inclusão do footer com caminho absoluto -->
<?php include_once '../header/footer.php'; ?>

  
