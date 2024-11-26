<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
        <h1>Categorias</h1>
    </header>

    <main>
        <form action="../public/processar_create_categoria.php" method="POST">
            <label for="nome">Nome da Categoria:</label>
            <input type="text" id="nome" name="nome" required>

            <button type="submit">Criar Categoria</button>
        </form>

        <h2>Categorias Existentes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui você irá exibir as categorias -->
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= $categoria['id'] ?></td>
                        <td><?= $categoria['nome'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>© 2024 Meu Site</p>
    </footer>
</body>
</html>
