<?php
class UsuarioController {
    private $conn;

    // Construtor para inicializar a conexão com o banco de dados
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Função para validar o login do usuário
    public function validarLogin($email, $senha) {
        // Consulta para buscar o usuário pelo email
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Verifica se o usuário existe
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha informada corresponde à senha armazenada
            if (trim($usuario['senha']) == trim($senha)) {
                return $usuario; // Retorna os dados do usuário
            } else {
                // Se a senha estiver incorreta
                return false;
            }
        }

        return false; // Se o usuário não existir
    }
}
?>
