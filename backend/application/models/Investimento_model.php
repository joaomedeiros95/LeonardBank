class Investimento_model extends CI_Model {
	
	public $id_investimento;
	public $id_investidor;
	public $id_investido_em;
	public $valor;
	public $criado_em;

	public function __construct() {
		parent::__construct();
	}

	public function insert($id_investidor, $id_investido_em, $valor) {
		$this->id_investidor = $id_investidor;
		$this->id_investido_em = $id_investido_em;
		$this->valor = $valor;

		$this->db->insert('roles', $this);
	}

	public function update($id_investimento, $id_investidor, $id_investido_em, $valor) {
		$this->id_investidor = $id_investidor;
		$this->id_investido_em = $id_investido_em;
		$this->valor = $valor;

		$this->db->update('investimento', $this, array('id_investimento' => $id_investimento));
	}

}