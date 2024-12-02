<?php
require_once '../models/Projeto.php';
require_once '../../db/Database.php';
class ProjetoController {
    private $db;
    private $projeto;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->projeto = new Projeto($this->db);
    }

    // Função para listar todos os projetos
    public function listarProjetos() {
        return $this->projeto->listarProjetos();
    }

    // Função para buscar projetos pelo nome
    public function buscarProjetosPorNome($nome) {
        return $this->projeto->buscarProjetosPorNome($nome);
    }

    // Função para obter um projeto específico
    public function obterProjeto($projeto_id) {
        $this->projeto->projeto_id = $projeto_id;
        return $this->projeto->obterProjeto();
    }
}

?>
