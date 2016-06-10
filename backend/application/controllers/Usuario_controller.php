<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_controller extends MY_Controller {

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
        parent::needLogin();
    	$data['title'] = 'Login - Leonard Bank';
        $logindata['haserro'] = false;
        $logindata['erro'] = "";
        parent::redirecionar($data, $logindata, 'login');
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
            $data['title'] = 'Login - Leonard Bank';
            $logindata['haserro'] = true;
            $logindata['erro'] = "Usuário " . $usuario . " não encontrado!";
            parent::redirecionar($data, $logindata, 'login');
            return;
        } 

        $salt = utf8_decode($salt);
        $password = $senha . $salt;
        $hash = hash('sha256', $password);

        if($this->usuario->checkLogin($usuario, $hash)) {
            $this->session->set_userdata('login', $usuario);
            redirect('painel/artista_controller/', 'refresh');
        } else {
            $data['title'] = 'Login - Leonard Bank';
            $logindata['haserro'] = true;
            $logindata['erro'] = "Usuário " . $usuario . " não encontrado!";
            parent::redirecionar($data, $logindata, 'login');
            return;
        }
    }

    public function entrar_cadastro() {
        parent::needLogin();
        $data['title'] = 'Cadastro - Leonard Bank';
        $cadastrodata['haserro'] = false;
        $cadastrodata['erro'] = "";
        parent::redirecionar($data, $cadastrodata, 'cadastrar');
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
            print "<script type=\"text/javascript\">alert('Usuário cadastrado com sucesso!');</script>";
            redirect('usuario_controller', 'refresh');
        } else {
            $data['title'] = 'Cadastro - Leonard Bank';
            $cadastrodata['haserro'] = true;
            $cadastrodata['erro'] = "Ocorreu um erro ao cadastrar o usuário";
            parent::redirecionar($data, $cadastrodata, 'cadastrar');
            return;
        }
    }

}