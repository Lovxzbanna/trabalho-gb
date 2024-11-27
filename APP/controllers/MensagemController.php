<?php
require_once '../models/Mensagem.php';
require_once '../db/Database.php';

class MensagemController {
    private $db;
    private $mensagem;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->mensagem = new Mensagem($this->db);
    }

    // Função para criar mensagem
    public function criarMensagem($remetente_id, $destinatario_id, $conteudo) {
        $this->mensagem->remetente_id = $remetente_id;
        $this->mensagem->destinatario_id = $destinatario_id;
        $this->mensagem->conteudo = $conteudo;
        if ($this->mensagem->criarMensagem()) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar mensagem.";
        }
    }

    // Função para listar mensagens
    public function listarMensagens() {
        $mensagens = $this->mensagem->listarMensagens();
        return $mensagens;
    }
}
?>
