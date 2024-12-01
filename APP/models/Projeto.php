<?php
class Projeto {
    private $conn;
    private $table = 'projetos'; // Nome da tabela no banco de dados

    // Propriedades da tabela
    public $projeto_id;
    public $nome_produto;
    public $descricao;

    // Construtor da classe
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para buscar os projetos
    public function buscarProjetos($query) {
        // Criando o comando SQL de pesquisa
        $sql = "SELECT * FROM " . $this->table . " WHERE nome_produto LIKE :query OR descricao LIKE :query";

        // Preparando a consulta
        $stmt = $this->conn->prepare($sql);

        // Bind do parâmetro
        $query = "%{$query}%"; // Para fazer a pesquisa com LIKE
        $stmt->bindParam(':query', $query);

        // Executando a consulta
        $stmt->execute();

        // Retorna os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
