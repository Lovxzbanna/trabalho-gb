<?php
include_once '../models/Projeto.php';
include_once '../db/Database.php';

class ProjetoController {
    private $db;
    private $projeto;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->projeto = new Projeto($this->db);
    }

    // Função para criar projeto
    public function criarProjeto($titulo, $descricao, $preco) {
        $this->projeto->titulo = $titulo;
        $this->projeto->descricao = $descricao;
        $this->projeto->preco = $preco;
        if ($this->projeto->criarProjeto()) {
            echo "Projeto criado com sucesso!";
        } else {
            echo "Erro ao criar projeto.";
        }
    }

    // Função para listar projetos
    public function listarProjetos() {
        $projetos = $this->projeto->listarProjetos();
        return $projetos;
    }
}
?>
