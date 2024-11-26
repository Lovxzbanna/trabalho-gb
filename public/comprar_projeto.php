<?php
include_once '../db/Database.php';
include_once '../models/Projeto.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();

    $projeto = new Projeto($db);
    $projeto->id = $_GET['id'];
    $projetoData = $projeto->getProjetoById();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aqui você pode adicionar a lógica de pagamento ou o que for necessário
    echo "Projeto comprado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Projeto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Comprar Projeto</h1>
    </header>

    <main>
        <h2><?php echo $projetoData['titulo']; ?></h2>
        <p><?php echo $projetoData['descricao']; ?></p>
        <p>Preço: R$ <?php echo number_format($projetoData['preco'], 2, ',', '.'); ?></p>

        <form method="POST">
            <button type="submit">Comprar</button>
        </form>
    </main>

    <footer>
        <p>© 2024 Meu Site</p>
    </footer>
</body>
</html>
