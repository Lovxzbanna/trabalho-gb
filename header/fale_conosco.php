<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco - CemFreelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> <!-- Link do Bulma -->
    <style>
        /* Estilos customizados */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc; /* Cor de fundo mais clara */
            color: #333; /* Texto escuro */
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .form-container {
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #3b3f47; /* Cor escura para o título */
        }
        .button.is-primary {
            width: 100%;
            background-color: #FF7F50; /* Cor laranja */
            color: white;
            border-radius: 8px; /* Bordas arredondadas */
            transition: background-color 0.3s ease;
        }
        .button.is-primary:hover {
            background-color: #E75A28; /* Tom de laranja mais escuro no hover */
        }
        .notification.is-success {
            background-color: #E7F7E2;
            color: #28A745; /* Cor verde para sucesso */
            border-left: 5px solid #28A745;
        }
        .notification.is-danger {
            background-color: #F8D7DA;
            color: #DC3545; /* Cor vermelha para erro */
            border-left: 5px solid #DC3545;
        }
        .notification {
            margin-top: 20px;
            border-radius: 6px;
        }
        .field label {
            font-weight: bold;
            color: #333;
        }
        .input, .textarea {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 16px;
            width: 100%;
            background-color: #F9F9F9; /* Fundo claro nos campos */
            transition: border 0.3s ease;
        }
        .input:focus, .textarea:focus {
            border-color: #FF7F50; /* Laranja nos campos focados */
            outline: none;
        }
    </style>
</head>
<body>

<!-- Container do formulário -->
<div class="container">
    <div class="form-container">
        <h2 class="title is-3">Entre em Contato</h2>
        
        <!-- Verificar o status da mensagem -->
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'success'): ?>
                <div class="notification is-success">
                    <strong>Mensagem enviada com sucesso!</strong> 
                    Agradecemos pelo seu contato. Responderemos em breve.
                </div>
            <?php elseif ($_GET['status'] === 'error'): ?>
                <div class="notification is-danger">
                    <strong>Ocorreu um erro!</strong> 
                    Não conseguimos enviar sua mensagem. Por favor, tente novamente.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Formulário de Contato -->
        <form action="processar_mensagem.php" method="POST">
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
                <label class="label" for="mensagem">Mensagem:</label>
                <div class="control">
                    <textarea class="textarea" name="mensagem" id="mensagem" rows="5" required></textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Enviar Mensagem</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
