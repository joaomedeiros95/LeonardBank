<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function checkLogin()
	{
		if($this->session->userdata('login') == NULL) {
			print "<script type=\"text/javascript\">alert('Usuário não autorizado a acessar o painel de controle!');</script>";
			redirect('/', 'refresh');
		}
	}

	public function needLogin() {
		if($this->session->userdata('login') != NULL) {
			redirect('/painel/artista_controller/', 'refresh');
		}	
	}

	public function redirecionar($dataHeader, $dataPagina, $pagina) {
        $this->load->view('includes/header', $dataHeader);
        $this->load->view($pagina, $dataPagina);
        $this->load->view('includes/footer');
    }
}
