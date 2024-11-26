<?php
class Avaliacao {
    private $conn;
    private $table_name = "avaliacoes";

    public $usuario_id;
    public $produto_id;
    public $nota;
    public $comentario;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar avaliação
    public function criarAvaliacao() {
        $query = "INSERT INTO " . $this->table_name . " (usuario_id, produto_id, nota, comentario) VALUES (:usuario_id, :produto_id, :nota, :comentario)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":usuario_id", $this->usuario_id);
        $stmt->bindParam(":produto_id", $this->produto_id);
        $stmt->bindParam(":nota", $this->nota);
        $stmt->bindParam(":comentario", $this->comentario);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Listar avaliações
    public function listarAvaliacoes() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
