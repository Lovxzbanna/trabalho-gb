<?php
include_once '../models/Usuario.php';
include_once '../../db/Database.php';

class UsuarioController {
    private $db;
    private $usuario;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    // Função para buscar usuário por email
    public function getUsuarioByEmail($email) {
        return $this->usuario->buscarUsuarioPorEmail($email);
    }

    // Função para editar usuário
    public function editarUsuario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Pegando os valores do formulário
            $this->usuario->nome = $_POST['nome'];
            $this->usuario->email = $_POST['email'];
            $this->usuario->telefone = $_POST['telefone'];
            $this->usuario->endereco = $_POST['endereco'];
            $this->usuario->data_nascimento = $_POST['data_nascimento'];

            // Editando o usuário
            if ($this->usuario->editarUsuario()) {
                echo "Usuário editado com sucesso!";
            } else {
                echo "Erro ao editar usuário.";    
            }
        }
    }

    // Função para excluir usuário
    public function excluirUsuario($email) {
        $this->usuario->email = $email;

        if ($this->usuario->excluirUsuario()) {
            echo "Usuário excluído com sucesso!";
        } else {
            echo "Erro ao excluir usuário.";
        }
    }

    // Função para listar usuários
    public function listarUsuarios() {
        return $this->usuario->listarUsuarios();
    }
}
?>
