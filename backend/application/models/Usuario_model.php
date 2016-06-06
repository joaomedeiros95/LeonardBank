class Usuario_model extends CI_Model {
	
	public $id_usuario;
	public $usuario;
	public $senha;
	public $salt;
	public $criado_em;
	public $id_roles;

	public function __construct() {
		parent::__construct();
	}

	public function insert($usuario, $senha, $salt, $id_roles) {
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->salt = $salt;
		$this->id_roles = $id_roles;

		$this->db->insert('usuario', $this);
	}

	public function update($id_usuario, $usuario, $senha, $salt, $id_roles) {
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->salt = $salt;
		$this->id_roles = $id_roles;

		$this->db->update('usuario', $this, array('id_usuario' => $id_usuario));
	}

}