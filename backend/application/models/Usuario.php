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
		$query = $this->db->where("usuario", $usuario)->or_where("email", $usuario)->get('usuario');

		if($query) {
			return $query->result();
		} else {
			return null;
		}
	}

	public function checkLogin($usuario, $hash) {
		$where = "(usuario = '" . $usuario . "' OR email = '" . $usuario . "')" . " AND senha = '" . $hash . "'";
 		$resultados = $this->db->where($where)->count_all_results('usuario');
		
		return $resultados > 0;
	}

	public function insert($usuario, $senha, $salt, $id_roles, $email, $nome, $cpf, $telefone, $endereco) {
		$this->db->trans_start();

		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->salt = $salt;
		$this->id_roles = $id_roles;
		$this->email = $email;

		if($this->db->insert('usuario', $this)) {
			$id_usuario = 0;
	        foreach ($this->getByUser($usuario) as $row) {
	            $id_usuario = $row->id_usuario;
	        }

	        if($id_usuario == 0) {
	            $this->db->trans_rollback();
	            echo "id_usuario";
	            return false;
	        }

	        $this->load->model('pessoa');
	        if($this->pessoa->insert($nome, $cpf, $telefone, $endereco, $id_usuario)) {
	            $this->db->trans_complete();
	            return true;
	        } else {
	            $this->db->trans_rollback();
	            echo "insercao pessoa";
	            return false;    
	        }
		} else {
			$this->db->trans_rollback();
			echo "insercao usuario";
			return false;
		}

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