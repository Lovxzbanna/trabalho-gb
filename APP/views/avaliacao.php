<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
        <h1>Avaliações</h1>
    </header>

    <main>
        <form action="../public/processar_create_avaliacao.php" method="POST">
            <label for="usuario_id">ID do Usuário:</label>
            <input type="number" id="usuario_id" name="usuario_id" required>

            <label for="produto_id">ID do Produto:</label>
            <input type="number" id="produto_id" name="produto_id" required>

            <label for="nota">Nota:</label>
            <input type="number" id="nota" name="nota" required min="1" max="5">

            <label for="comentario">Comentário:</label>
            <textarea id="comentario" name="comentario" required></textarea>

            <button type="submit">Enviar Avaliação</button>
        </form>

        <h2>Avaliações Recebidas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Usuário</th>
                    <th>ID Produto</th>
                    <th>Nota</th>
                    <th>Comentário</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui você irá exibir as avaliações -->
                <?php foreach ($avaliacoes as $avaliacao): ?>
                    <tr>
                        <td><?= $avaliacao['usuario_id'] ?></td>
                        <td><?= $avaliacao['produto_id'] ?></td>
                        <td><?= $avaliacao['nota'] ?></td>
                        <td><?= $avaliacao['comentario'] ?></td>
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
