<?php
class MensagemController {
    private $db;

    public function __construct() {
        // Aqui você deve instanciar a conexão com o banco de dados.
        $this->db = new Database();
    }

    // Método para enviar uma mensagem
    public function enviarMensagem($conteudo) {
        if (empty($conteudo)) {
            // Verifique se o conteúdo da mensagem está vazio
            throw new Exception("O conteúdo da mensagem não pode ser vazio.");
        }

        // Código para salvar a mensagem no banco de dados
        $query = "INSERT INTO mensagens (conteudo) VALUES (:conteudo)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->execute();
    }

    // Método para excluir uma mensagem
    public function excluirMensagem($id) {
        // Validação para garantir que o ID seja numérico
        if (!is_numeric($id)) {
            throw new Exception("ID inválido.");
        }

        // Código para excluir a mensagem
        $query = "DELETE FROM mensagens WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método para listar as mensagens
    public function listarMensagens() {
        $query = "SELECT * FROM mensagens ORDER BY data_envio DESC"; // Supondo que haja um campo 'data_envio' na tabela
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
