    <?php
    class Database {
        private $host = "localhost";   // Endereço do servidor
        private $db_name = "login"; // Nome do banco de dados
        private $username = "root";    // Usuário do banco
        private $password = "";        // Senha do banco
        private $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                echo "Erro na conexão com o banco: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }
    ?>
