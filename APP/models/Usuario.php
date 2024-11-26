<?php
class Usuario {
    private $conn; // Conexão com o banco
    private $table = 'usuarios'; // Nome da tabela no banco

    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $endereco;
    public $data_nascimento;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para buscar um usuário pelo email
    public function buscarUsuarioPorEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para editar um usuário
    public function editarUsuario() {
        $query = "UPDATE " . $this->table . " 
                  SET nome = :nome, email = :email, telefone = :telefone, endereco = :endereco, data_nascimento = :data_nascimento 
                  WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":data_nascimento", $this->data_nascimento);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para excluir um usuário
    public function excluirUsuario() {
        $query = "DELETE FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":email", $this->email);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para listar todos os usuários
    public function listarUsuarios() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
