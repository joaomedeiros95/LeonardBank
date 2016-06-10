<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artista_controller extends MY_Controller {

	public function index()
	{
		parent::checkLogin();
		$data['title'] = 'Painel de Controle - Leonard Bank';
		parent::redirecionar($data, NULL, 'painel/artista');
	}
}
