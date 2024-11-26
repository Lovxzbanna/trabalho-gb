<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
        <h1>Editar Usuário</h1>
    </header>

    <main>
        <form action="../public/processar_editar_usuario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>

            <button type="submit">Salvar Alterações</button>
        </form>
    </main>

    <footer>
        <p>© 2024 Meu Site</p>
    </footer>
</body>
</html>
