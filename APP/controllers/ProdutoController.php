<?php
include_once '../models/Produto.php';
include_once '../db/Database.php';

class ProdutoController {
    private $db;
    private $produto;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->produto = new Produto($this->db);
    }

    // Função para criar produto
    public function criarProduto($nome, $descricao, $preco) {
        $this->produto->nome = $nome;
        $this->produto->descricao = $descricao;
        $this->produto->preco = $preco;
        if ($this->produto->criarProduto()) {
            echo "Produto criado com sucesso!";
        } else {
            echo "Erro ao criar produto.";
        }
    }

    // Função para listar produtos
    public function listarProdutos() {
        $produtos = $this->produto->listarProdutos();
        return $produtos;
    }
}
?>
