<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
/* Resetando estilos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Definindo o fundo com gradiente de azul, roxo e rosa */
body {
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #2196F3, #6a1b9a, #D81B60); /* Gradiente de azul, roxo e rosa */
    color: #333;
    line-height: 1.6;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Estilo do container principal */
.container {
    width: 50%;
    margin: 50px auto;
    padding: 40px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Título */
h2 {
    color: #6a1b9a; /* Roxo */
    margin-bottom: 20px;
    text-align: center;
}

/* Estilo do formulário */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Estilos para os campos do formulário */
label {
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}

/* Input text e email */
input[type="text"],
input[type="email"],
input[type="password"],
select {
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus {
    border-color: #2196F3; /* Azul claro */
    background-color: #ffffff;
}

/* Estilo do botão */
button {
    padding: 12px 20px;
    background-color: #D81B60; /* Rosa */
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #C2185B; /* Rosa escuro */
}

/* Estilos responsivos */
@media (max-width: 768px) {
    .container {
        width: 80%;
        padding: 20px;
    }

    h2 {
        font-size: 24px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        font-size: 14px;
        padding: 10px;
    }

    button {
        font-size: 14px;
        padding: 10px 18px;
    }
}

</style>
    <div class="container">
        <h2>Criar Usuário</h2>
        <form action="../login/criar_usuario.php" method="POST">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>

            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" required>
                <option value="cliente">Cliente</option>
                <option value="freelancer">Freelancer</option>
            </select>

            <button type="submit">Criar</button>
        </form>
    </div>
</body>
</html>
