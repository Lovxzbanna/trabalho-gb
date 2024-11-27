<?php
require_once '../models/Avaliacao.php';
require_once '../db/Database.php';

class AvaliacaoController {
    private $db;
    private $avaliacao;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->avaliacao = new Avaliacao($this->db);
    }

    // Função para criar avaliação
    public function criarAvaliacao($usuario_id, $produto_id, $nota, $comentario) {
        $this->avaliacao->usuario_id = $usuario_id;
        $this->avaliacao->produto_id = $produto_id;
        $this->avaliacao->nota = $nota;
        $this->avaliacao->comentario = $comentario;
        if ($this->avaliacao->criarAvaliacao()) {
            echo "Avaliação criada com sucesso!";
        } else {
            echo "Erro ao criar avaliação.";
        }
    }

    // Função para listar avaliações
    public function listarAvaliacoes() {
        $avaliacoes = $this->avaliacao->listarAvaliacoes();
        return $avaliacoes;
    }
}
?>
