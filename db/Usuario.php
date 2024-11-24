<?php
class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para obter o nome do usuário pelo e-mail
    public function obterNomePorEmail($email) {
        $query = "SELECT nome FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        // Verificar se o usuário foi encontrado e retornar o nome
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario['nome'];
        } else {
            return 'Usuário não encontrado';
        }
    }
}
?>
