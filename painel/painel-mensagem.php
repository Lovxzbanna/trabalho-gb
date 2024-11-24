<?php
// Conectar ao banco de dados
include 'config/database.php'; // Adapte para o local correto do seu arquivo de conexão

// Criar instância da conexão com o banco
$database = new Database();
$db = $database->getConnection();

// Consultar todas as mensagens
$query = "SELECT * FROM mensagens ORDER BY data_envio DESC";
$stmt = $db->prepare($query);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Mensagens</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> <!-- Bulma para o design -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
        }
        .container {
            max-width: 900px;
            margin-top: 30px;
        }
        .table-container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .button.is-danger {
            background-color: #ff3860;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title is-3">Mensagens Recebidas</h2>
        
        <!-- Tabela para exibir as mensagens -->
        <div class="table-container">
            <table class="table is-striped is-bordered is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['nome']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars(substr($row['mensagem'], 0, 50)) . '...'; ?></td>
                            <td><?php echo $row['data_envio']; ?></td>
                            <td>
                                <a href="ver_mensagem.php?id=<?php echo $row['id']; ?>" class="button is-primary is-small">Visualizar</a>
                                <a href="excluir_mensagem.php?id=<?php echo $row['id']; ?>" class="button is-danger is-small">Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
