<?php
// db/Projeto.php

class Projeto {
    private $conn;
    private $table = 'projetos';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function buscarProjetos($search = '') {
        $query = "SELECT * FROM " . $this->table;
        if ($search) {
            $query .= " WHERE nome_produto LIKE ?";
        }

        $stmt = $this->conn->prepare($query);
        if ($search) {
            $searchTerm = '%' . $search . '%';
            $stmt->execute([$searchTerm]);
        } else {
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
