<!-- listar_usuarios.php -->
<?php
include 'db/Database.php';  // Inclui a conexão com o banco de dados

// Criar uma instância da classe de conexão
$database = new Database();
$db = $database->getConnection();

// Consultar os usuários
$query = "SELECT * FROM usuarios";
$stmt = $db->prepare($query);
$stmt->execute();

// Exibir a lista de usuários
echo "<h2 class='title is-2'>Lista de Usuários</h2>";
echo "<table class='table is-striped'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>" . htmlspecialchars($row['nome']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>
                <a href='editar_usuario.php?id=" . $row['id'] . "' class='button is-small is-info'>Editar</a>
                <a href='deletar_usuario.php?id=" . $row['id'] . "' class='button is-small is-danger'>Deletar</a>
            </td>
          </tr>";
}

echo "</tbody></table>";
?>
