<?php
class Pessoa extends CI_Model {
	
	public $nome;
	public $cpf;
	public $telefone;
	public $endereco_completo;
	public $id_usuario;

	public function __construct() {
		parent::__construct();
	}

	public function insert($nome, $cpf, $telefone, $endereco_completo, $id_usuario) {
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->telefone = $telefone;
		$this->id_usuario = $id_usuario;
		$this->endereco_completo = $endereco_completo;

		return $this->db->insert('pessoa', $this);
	}

	public function update($id_pessoa, $nome, $cpf, $telefone, $endereco_completo, $id_usuario) {
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->telefone = $telefone;
		$this->id_usuario = $id_usuario;
		$this->endereco_completo = $endereco_completo;

		$this->db->update('pessoa', $this, array('id_pessoa' => $id_pessoa));
	}

}