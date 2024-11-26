<?php
include 'header.php';
// Incluir o controlador
include_once '../controllers/UsuarioController.php';

// Verificar se o usuário está logado
$emailUsuario = isset($_SESSION['usuario_email']) ? $_SESSION['usuario_email'] : null;

if ($emailUsuario) {
    // Instancia o controller
    $usuarioController = new UsuarioController();
    // Busca o usuário pelo email
    $usuario = $usuarioController->getUsuarioByEmail($emailUsuario);

} else {
    echo "Nenhum usuário logado.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
/* Resetando algumas configurações padrão do navegador */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Definindo o layout básico */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    color: #495057;
    line-height: 1.6;
    padding: 0px;
}

/* Header */
header {
    background-color: #343a40;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

header nav ul {
    list-style: none;
    padding: 0;
}

header nav ul li {
    display: inline;
    margin: 0 15px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 16px;
}

header nav ul li a:hover {
    text-decoration: underline;
}

/* Estilizando o conteúdo principal */
.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
}

/* Card de perfil */
.perfil-card {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease-in-out;
}

.perfil-card:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

h1, h2 {
    color: #343a40;
    font-weight: 600;
}

.perfil-dados p {
    margin: 15px 0;
    font-size: 16px;
    line-height: 1.5;
}

.perfil-dados p strong {
    font-weight: 600;
}

/* Botões customizados */
button {
    background-color: #007bff;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
    transition: background-color 0.3s, box-shadow 0.3s, transform 0.3s;
    display: inline-block;
    margin: 10px;
}

button:hover {
    background-color: #0056b3;
    box-shadow: 0 6px 15px rgba(0, 123, 255, 0.3);
    transform: translateY(-2px);
}

button:active {
    transform: translateY(0);
}

/* Botão de exclusão (vermelho) */
button.delete {
    background-color: #dc3545;
}

button.delete:hover {
    background-color: #c82333;
}

button.delete:active {
    transform: translateY(0);
}

/* Responsividade */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .perfil-card {
        padding: 20px;
    }

    form {
        margin-top: 20px;
    }
}

/* Footer */
footer {
    background-color: #343a40;
    color: #fff;
    text-align: center;
    padding: 20px;
    position: relative;
    bottom: 0;
    width: 100%;
    font-size: 14px;
}

</style>

<?php if (isset($usuario)) : ?>
    <div class="container">
        <h1>Perfil de <?php echo htmlspecialchars($usuario['nome']); ?></h1>

        <!-- Exibe a foto de perfil -->
        <div class="perfil-card">
            <div class="perfil-dados">
                <?php if (!empty($usuario['foto_perfil'])): ?>
                    <img src="<?php echo htmlspecialchars($usuario['foto_perfil']); ?>" alt="Foto de Perfil" width="150" height="150" style="border-radius: 50%; margin-bottom: 20px;">
                <?php else: ?>
                    <p><strong>Foto de Perfil:</strong> Não informada</p>
                <?php endif; ?>

                <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
                <p><strong>Telefone:</strong> <?php echo htmlspecialchars($usuario['telefone']); ?></p>

                <!-- Verifica e exibe o endereço -->
                <p><strong>Endereço:</strong> 
                <?php 
                if (!empty($usuario['endereco'])) {
                    echo htmlspecialchars($usuario['endereco']);
                } else {
                    echo "Não informado";
                }
                ?>
                </p>

                <p><strong>Data de Nascimento:</strong> <?php echo date("d/m/Y", strtotime($usuario['data_nascimento'])); ?></p>
                
                <!-- Links sociais -->
                <p><strong>GitHub:</strong> 
                <?php if (!empty($usuario['github'])): ?>
                    <a href="<?php echo htmlspecialchars($usuario['github']); ?>" target="_blank"><?php echo htmlspecialchars($usuario['github']); ?></a>
                <?php else: ?>
                    Não informado
                <?php endif; ?>
                </p>
                
                <p><strong>Instagram:</strong> 
                <?php if (!empty($usuario['instagram'])): ?>
                    <a href="<?php echo htmlspecialchars($usuario['instagram']); ?>" target="_blank"><?php echo htmlspecialchars($usuario['instagram']); ?></a>
                <?php else: ?>
                    Não informado
                <?php endif; ?>
                </p>

                <p><strong>Facebook:</strong> 
                <?php if (!empty($usuario['facebook'])): ?>
                    <a href="<?php echo htmlspecialchars($usuario['facebook']); ?>" target="_blank"><?php echo htmlspecialchars($usuario['facebook']); ?></a>
                <?php else: ?>
                    Não informado
                <?php endif; ?>
                </p>

                <p><strong>Portfólio:</strong> 
                <?php if (!empty($usuario['portfolio'])): ?>
                    <a href="<?php echo htmlspecialchars($usuario['portfolio']); ?>" target="_blank"><?php echo htmlspecialchars($usuario['portfolio']); ?></a>
                <?php else: ?>
                    Não informado
                <?php endif; ?>
                </p>

                <p><strong>LinkedIn:</strong> 
                <?php if (!empty($usuario['linkedin'])): ?>
                    <a href="<?php echo htmlspecialchars($usuario['linkedin']); ?>" target="_blank"><?php echo htmlspecialchars($usuario['linkedin']); ?></a>
                <?php else: ?>
                    Não informado
                <?php endif; ?>
                </p>
            </div>
        </div>

        <!-- Botões de ação -->
        <?php if ($_SESSION['usuario_email'] == $usuario['email']) : ?>
            <a href="editar_perfil.php">
                <button type="button">Editar Perfil</button>
            </a>
            
            <!-- Botão de alterar senha -->
            <a href="alterar_senha.php">
                <button type="button">Alterar Senha</button>
            </a>
            
            <!-- Botão de deletar conta -->
            <form method="POST" action="deletar_conta.php" onsubmit="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.');">
                <button type="submit" name="deletar_conta" class="delete">Deletar Conta</button>
            </form>
        <?php endif; ?>

    </div>
<?php else : ?>
    <p>Não há dados do usuário para exibir.</p>
<?php endif; ?>
</body>
</html>
