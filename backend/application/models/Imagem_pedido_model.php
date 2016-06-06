class Imagem_pedido_model extends CI_Model {
	
	public $id_imagem;
	public $id_pedido;

	public function __construct() {
		parent::__construct();
	}

	public function insert($id_imagem, $id_pedido) {
		$this->id_imagem = $id_imagem;
		$this->id_pedido = $id_pedido;

		$this->db->insert('imagem_pedido', $this);
	}

}