<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_controller extends CI_Controller {

    public function getAll()
    {
    	$this->load->model('usuario');
    	foreach($this->usuario->getAll() as $row) {
    		echo $row->id_usuario;
    		echo $row->usuario;
    		echo $row->criado_em;
    		echo $row->id_roles;
    		echo $row->email;
    	}
    }

    public function index() {
    	$data['title'] = 'Login - Leonard Bank';
        $this->load->view('includes/header', $data);
        $this->load->view('login');
        $this->load->view('includes/footer');
    }

    public function login() {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $salt = "";

        $this->load->model('usuario');
        foreach ($this->usuario->getByUser($usuario) as $row) {
            $salt = $row->salt;
        }

        if($salt == "") {
            echo "Usuário " . $usuario . " não encontrado!";
            return;
        } 

        $salt = utf8_decode($salt);
        $password = $senha . $salt;
        $hash = hash('sha256', $password);

        if($this->usuario->checkLogin($usuario, $hash)) {
            echo "Usuário logado com sucesso.";
        } else {
            echo "Login/Senha errados.";
        }
    }

    public function entrar_cadastro() {
        $data['title'] = 'Cadastro - Leonard Bank';
        $this->load->view('includes/header', $data);
        $this->load->view('cadastrar');
        $this->load->view('includes/footer');
    }

    public function cadastrar() {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];

        $endereco = "";
        if( isset($_POST['endereco']) ) {        
            $endereco = $_POST['endereco'];
        }
        
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];

        if( isset($_POST['artista']) ) {
            $id_roles = 2;
        } else {
            $id_roles = 3;
        }

		$salt = openssl_random_pseudo_bytes(64);
        $password = $senha . $salt;
        $hash = hash('sha256', $password);
        $salt = utf8_encode($salt);

        $this->load->model('usuario');
        if($this->usuario->insert($usuario, $hash, $salt, $id_roles, $email, $nome, $cpf, $telefone, $endereco)) {
            echo "Usuário cadastrado com sucesso";
            return;
        } else {
            echo "Ocorreu um erro ao cadastrar o usuário";
            return;
        }
    }

}