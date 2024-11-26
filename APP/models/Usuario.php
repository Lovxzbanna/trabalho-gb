<?php
class Usuario {
    private $conn;
    private $table_name = "usuarios"; // Nome da tabela no banco de dados

    public $email;
    public $nome;
    public $foto_perfil;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para buscar dados do usuário pelo e-mail
    public function getUsuarioByEmail($email) {
        $query = "SELECT nome, foto_perfil FROM " . $this->table_name . " WHERE email = :email LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se o usuário for encontrado, retorna os dados
        if ($user_data) {
            return $user_data;
        }

        return null;  // Caso não encontre, retorna null
    }
}
?>
