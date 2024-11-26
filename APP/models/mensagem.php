<?php
class Mensagem {
    private $conn;
    private $table_name = "mensagens";

    public $remetente_id;
    public $destinatario_id;
    public $conteudo;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar mensagem
    public function criarMensagem() {
        $query = "INSERT INTO " . $this->table_name . " (remetente_id, destinatario_id, conteudo) VALUES (:remetente_id, :destinatario_id, :conteudo)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":remetente_id", $this->remetente_id);
        $stmt->bindParam(":destinatario_id", $this->destinatario_id);
        $stmt->bindParam(":conteudo", $this->conteudo);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Listar mensagens
    public function listarMensagens() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
