<?php
class Produto {
    private $conn;
    private $table_name = "produtos";

    public $nome;
    public $descricao;
    public $preco;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar produto
    public function criarProduto() {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, preco) VALUES (:nome, :descricao, :preco)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":preco", $this->preco);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Listar produtos
    public function listarProdutos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
