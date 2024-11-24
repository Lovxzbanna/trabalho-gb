<!-- editar_usuario.php -->
<?php
include 'db/Database.php';  // Inclui a conexão com o banco de dados

// Criar uma instância da classe de conexão
$database = new Database();
$db = $database->getConnection();

$id = isset($_GET['id']) ? $_GET['id'] : die('ID do usuário não fornecido.');

// Consultar o usuário pelo ID
$query = "SELECT * FROM usuarios WHERE id = :id LIMIT 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die('Usuário não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
    <div class="container">
        <h2 class="title is-2">Editar Usuário</h2>

        <!-- Formulário para editar usuário -->
        <form action="processar_editar_usuario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

            <div class="field">
                <label class="label" for="nome">Nome:</label>
                <div class="control">
                    <input class="input" type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($user['nome']); ?>" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="email">Email:</label>
                <div class="control">
                    <input class="input" type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Atualizar Usuário</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
