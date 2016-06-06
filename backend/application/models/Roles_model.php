class Roles_model extends CI_Model {
	
	public $id_roles;
	public $descricao;

	public function __construct() {
		parent::__construct();
	}

	public function insert($descricao) {
		$this->descricao = $descricao;

		$this->db->insert('roles', $this);
	}

	public function update($id_roles, $descricao) {
		$this->descricao = $descricao;

		$this->db->update('roles', $this, array('id_roles' => $id_roles));
	}

}