<?php
include_once '../models/Usuario.php';
include_once '../db/Database.php';

class UsuarioController {
    private $db;
    private $usuario;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuario = new Usuario($this->db);
    }

    // Função para criar usuário
    public function criarUsuario($nome, $email, $senha) {
        $this->usuario->nome = $nome;
        $this->usuario->email = $email;
        $this->usuario->senha = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha

        if ($this->usuario->criarUsuario()) {
            echo "Usuário criado com sucesso!";
        } else {
            echo "Erro ao criar usuário.";
        }
    }

    // Função para editar usuário
    public function editarUsuario($id, $nome, $email) {
        $this->usuario->id = $id;
        $this->usuario->nome = $nome;
        $this->usuario->email = $email;

        if ($this->usuario->editarUsuario()) {
            echo "Usuário editado com sucesso!";
        } else {
            echo "Erro ao editar usuário.";
        }
    }

    // Função para excluir usuário
    public function excluirUsuario($id) {
        $this->usuario->id = $id;

        if ($this->usuario->excluirUsuario()) {
            echo "Usuário excluído com sucesso!";
        } else {
            echo "Erro ao excluir usuário.";
        }
    }

    // Função para listar usuários
    public function listarUsuarios() {
        $usuarios = $this->usuario->listarUsuarios();
        return $usuarios;
    }
}
?>
