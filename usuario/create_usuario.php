<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h2 class="title is-2">Criar Usuário</h2>

        <!-- Formulário para criar usuário -->
        <form action="processar_create_usuario.php" method="POST">
            <div class="field">
                <label class="label" for="nome">Nome:</label>
                <div class="control">
                    <input class="input" type="text" name="nome" id="nome" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="email">Email:</label>
                <div class="control">
                    <input class="input" type="email" name="email" id="email" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="senha">Senha:</label>
                <div class="control">
                    <input class="input" type="password" name="senha" id="senha" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Criar Usuário</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
