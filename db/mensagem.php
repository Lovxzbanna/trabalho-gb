
<?php
class Mensagem {
    
    private $conn;
    private $table_name = "mensagens";

    public $nome;
    public $email;
    public $mensagem;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function salvarMensagem() {
        // Criação da query SQL
        $query = "INSERT INTO " . $this->table_name . " (nome, email, mensagem) VALUES (:nome, :email, :mensagem)";

        // Preparando a query
        $stmt = $this->conn->prepare($query);

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':mensagem', $this->mensagem);

        // Executando a query e verificando se a inserção foi bem-sucedida
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>