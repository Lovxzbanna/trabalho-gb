<?php
// Incluir os arquivos necessários
include '../db/DB.php';
include '../db/Usuario.php';

// Verificar se o usuário está logado
session_start();
if (!isset($_SESSION['usuario_email'])) {
    header('Location: ../login/login.php');
    exit();
}

// Conectar ao banco de dados
$database = new DB();
$conn = $database->connect();
$usuario = new Usuario($conn);

// Recuperar o e-mail do usuário logado
$email_usuario = $_SESSION['usuario_email'];

// Obter o nome do usuário (com base no método da classe)
$nome_usuario = $usuario->obterNomePorEmail($email_usuario);

// Caso o nome não seja encontrado
if ($nome_usuario == 'Usuário não encontrado') {
    echo "Usuário não encontrado!";
    exit();
}

// Recuperar os dados adicionais do banco para o formulário
$query = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email_usuario);
$stmt->execute();

// Obter os dados do usuário
$dados_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Preencher as variáveis com os dados do usuário
$foto_perfil = $dados_usuario['foto_perfil'] ?? 'uploads/fotos_perfil/default-avatar.png';
$telefone = $dados_usuario['telefone'] ?? '';
$data_nascimento = $dados_usuario['data_nascimento'] ?? '';
$instagram = $dados_usuario['instagram'] ?? '';
$linkedin = $dados_usuario['linkedin'] ?? '';
$facebook = $dados_usuario['facebook'] ?? '';
$github = $dados_usuario['github'] ?? '';
$portfolio = $dados_usuario['portfolio'] ?? '';

// Lógica para atualizar o perfil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $facebook = $_POST['facebook'];
    $github = $_POST['github'];
    $portfolio = $_POST['portfolio'];

    // Verificar se o diretório de uploads existe, se não, criar
    if (!file_exists('uploads/fotos_perfil/')) {
        mkdir('uploads/fotos_perfil/', 0777, true);
    }

    // Atualizar foto de perfil, se houver nova
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $foto_perfil = $_FILES['foto_perfil'];
        $foto_nome = $foto_perfil['name'];
        $foto_tmp = $foto_perfil['tmp_name'];
        $extensao = pathinfo($foto_nome, PATHINFO_EXTENSION);
        $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array(strtolower($extensao), $extensoes_permitidas)) {
            $foto_destino = 'uploads/fotos_perfil/' . uniqid() . '.' . $extensao;
            if (move_uploaded_file($foto_tmp, $foto_destino)) {
                $foto_perfil = $foto_destino;
            } else {
                echo "Erro ao mover o arquivo de foto.";
            }
        } else {
            echo "Extensão de arquivo não permitida.";
        }
    }

    // Atualizar dados no banco
    $query = "UPDATE usuarios SET nome = :nome, telefone = :telefone, data_nascimento = :data_nascimento, instagram = :instagram, linkedin = :linkedin, facebook = :facebook, github = :github, portfolio = :portfolio, foto_perfil = :foto_perfil WHERE email = :email";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':instagram', $instagram);
    $stmt->bindParam(':linkedin', $linkedin);
    $stmt->bindParam(':facebook', $facebook);
    $stmt->bindParam(':github', $github);
    $stmt->bindParam(':portfolio', $portfolio);
    $stmt->bindParam(':foto_perfil', $foto_perfil);
    $stmt->bindParam(':email', $email_usuario);

    try {
        if ($stmt->execute()) {
            header('Location: perfil.php');
            exit();
        } else {
            echo "Erro ao atualizar perfil.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<style>
/* Geral */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

/* Container principal */
.container {
    width: 100%;
    max-width: 900px;
    margin: 50px auto;
    background-color: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    background: linear-gradient(to right, #6a11cb, #2575fc);
    color: #fff;
}

/* Cabeçalho do formulário */
.perfil-form h1 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #fff;
    text-align: center;
}

/* Foto de perfil */
.foto-perfil {
    text-align: center;
    margin-bottom: 20px;
}

.foto-perfil img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #fff;
    margin-bottom: 15px;
}

.foto-perfil input[type="file"] {
    font-size: 14px;
    color: #fff;
    background-color: #007bff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.foto-perfil input[type="file"]:hover {
    background-color: #0056b3;
}

/* Estilo dos campos de input */
.input-group {
    margin-bottom: 25px;
    text-align: left;
}

.input-group label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
    color: #fff;
    display: block;
}

.input-group input {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border: 2px solid #fff;
    border-radius: 6px;
    margin-top: 5px;
    background-color: #fff;
    color: #333;
    box-sizing: border-box;
    transition: all 0.3s ease;
}

.input-group input:focus {
    border-color: #2575fc;
    outline: none;
    box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
}

/* Botões */
.btn-container {
    text-align: center;
}

button {
    padding: 15px 30px;
    background-color: #2575fc;
    color: #fff;
    font-size: 18px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    max-width: 300px;
}

button:hover {
    background-color: #6a11cb;
}

/* Estilo de links */
a {
    color: #fff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Responsividade */
@media (max-width: 768px) {
    .container {
        padding: 30px;
    }

    .foto-perfil img {
        width: 100px;
        height: 100px;
    }

    .input-group input {
        padding: 10px;
        font-size: 14px;
    }

    button {
        font-size: 16px;
        padding: 12px 20px;
    }
}
</style>
    <div class="container">
        <div class="perfil-form">
            <h1>Editar Perfil</h1>
            <form action="editar_perfil.php" method="POST" enctype="multipart/form-data">
                <div class="foto-perfil">
                    <img src="<?php echo $foto_perfil; ?>" alt="Foto de Perfil">
                    <input type="file" name="foto_perfil" id="foto_perfil">
                </div>

                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome_usuario; ?>" required>
                </div>

                <div class="input-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" value="<?php echo $telefone; ?>" required>
                </div>

                <div class="input-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento; ?>" required>
                </div>

                <div class="input-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" id="instagram" value="<?php echo $instagram; ?>">
                </div>

                <div class="input-group">
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" value="<?php echo $linkedin; ?>">
                </div>

                <div class="input-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" value="<?php echo $facebook; ?>">
                </div>

                <div class="input-group">
                    <label for="github">GitHub</label>
                    <input type="text" name="github" id="github" value="<?php echo $github; ?>">
                </div>

                <div class="input-group">
                    <label for="portfolio">Portfólio</label>
                    <input type="text" name="portfolio" id="portfolio" value="<?php echo $portfolio; ?>">
                </div>

                <div class="btn-container">
                    <button type="submit">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
