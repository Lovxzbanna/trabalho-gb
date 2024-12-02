<?php
class Projeto {
    private $conn;
    private $table_name = "projetos";

    public $projeto_id;
    public $titulo;
    public $descricao;
    public $preco;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Função para buscar projetos pelo nome
    public function buscarProjetosPorNome($nome) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE titulo LIKE :titulo";
        $stmt = $this->conn->prepare($query);

        // Adiciona o '%' antes e depois do nome para buscar qualquer projeto que contenha esse nome
        $nome = "%" . $nome . "%";
        $stmt->bindParam(":titulo", $nome);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os projetos encontrados
    }

    // Função para listar todos os projetos
    public function listarProjetos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os projetos
    }

    // Função para obter um projeto específico
    public function obterProjeto() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE projeto_id = :projeto_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":projeto_id", $this->projeto_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna um projeto específico
    }
}


?>
