<?php
require_once '../models/Categoria.php';
require_once '../db/Database.php';

class CategoriaController {
    private $db;
    private $categoria;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->categoria = new Categoria($this->db);
    }

    // Função para criar categoria
    public function criarCategoria($nome) {
        $this->categoria->nome = $nome;
        if ($this->categoria->criarCategoria()) {
            echo "Categoria criada com sucesso!";
        } else {
            echo "Erro ao criar categoria.";
        }
    }

    // Função para listar categorias
    public function listarCategorias() {
        $categorias = $this->categoria->listarCategorias();
        return $categorias;
    }
}
?>
