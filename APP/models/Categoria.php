<?php
class Categoria {
    private $conn;
    private $table_name = "categorias";

    public $nome;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar categoria
    public function criarCategoria() {
        $query = "INSERT INTO " . $this->table_name . " (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Listar categorias
    public function listarCategorias() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
