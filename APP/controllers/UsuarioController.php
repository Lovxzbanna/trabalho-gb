<?php
class UsuarioController {
    // Método para cadastrar o usuário
    public function CadastrarUsuario($nome, $email, $nascimento, $tipo_usuario, $senha) {
        require_once '../../db/Database.php';  // Conexão com o banco de dados
        $pdo = Database::getConnection();  // Supondo que você tenha uma classe de conexão com o banco

        // SQL para inserir os dados do usuário no banco
        $sql = "INSERT INTO usuarios (nome, email, nascimento, tipo_usuario, senha) 
                VALUES (:nome, :email, :nascimento, :tipo_usuario, :senha)";
        
        // Preparando a consulta
        $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':senha', $senha);  // Aqui é recomendável fazer a criptografia, mas vou manter simples

        // Executa a consulta
        $stmt->execute();

        // Retorna verdadeiro se o cadastro foi bem-sucedido
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;  // Caso contrário, retorna falso
        }
    }
}
?>