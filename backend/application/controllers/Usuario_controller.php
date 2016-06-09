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

    public function cadastrar() {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $id_roles = $_POST['id_roles'];
        $email = $_POST['email'];

        if($id_roles == 1) {
            echo 'Não é permitido cadastro de administrador através da Web.';
            return;
        }

		$salt = openssl_random_pseudo_bytes(64);
        $password = $senha . $salt;
        $hash = hash('sha256', $password);
        $salt = utf8_encode($salt);

        $this->load->model('usuario');
        if($this->usuario->insert($usuario, $hash, $salt, $id_roles, $email)) {
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Ocorreu um erro ao cadastrar o usuário";
        }
    }

}