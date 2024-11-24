<?php
class Projeto {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para buscar projetos com base em um termo
    public function buscarProjetos($query) {
        // SQL para buscar projetos pelo nome ou descrição
        $sql = "SELECT * FROM projetos WHERE nome_produto LIKE :query OR descricao LIKE :query";
        $stmt = $this->conn->prepare($sql);

        // Definir o parâmetro para a busca, utilizando % para buscar em qualquer parte do nome/descrição
        $searchQuery = "%".$query."%";
        $stmt->bindParam(':query', $searchQuery);
        $stmt->execute();

        // Retornar os resultados encontrados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
