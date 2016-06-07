<?php
class Usuario extends CI_Model {
	
	public $usuario;
	public $senha;
	public $salt;
	public $id_roles;
	public $email;

	public function __construct() {
		parent::__construct();
	}

	public function getAll() {
		$query = $this->db->query("SELECT * FROM usuario;");
		if($query) {
			return $query->result();
		} else {
			return null;
		}
	}

	public function getByUser($usuario) {
		$query = $this->db->where("usuario", $usuario)->get('usuario');

		if($query) {
			return $query->result();
		} else {
			return null;
		}
	}

	public function checkLogin($usuario, $hash) {
		$resultados = $this->db->where("usuario", $usuario)->where("senha", $hash)->count_all_results('usuario');
		
		return $resultados > 0;
	}

	public function insert($usuario, $senha, $salt, $id_roles, $email) {
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->salt = $salt;
		$this->id_roles = $id_roles;
		$this->email = $email;

		return $this->db->insert('usuario', $this);
	}

	public function update($id_usuario, $usuario, $senha, $salt, $id_roles, $email) {
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->salt = $salt;
		$this->id_roles = $id_roles;
		$this->email = $email;

		$this->db->update('usuario', $this, array('id_usuario' => $id_usuario));
	}

}