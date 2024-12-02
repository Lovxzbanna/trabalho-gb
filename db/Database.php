<?php
class Database {
    private $host = "localhost"; // ou o host do seu banco
    private $db_name = "login";  // Nome do banco de dados
    private $username = "root"; // Seu usuário do banco de dados
    private $password = ""; // Sua senha do banco de dados
    public $conn;

    // Função para pegar a conexão
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Definindo o modo de erro
        } catch (PDOException $exception) {
            echo "Erro na conexão com o banco: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
