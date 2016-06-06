class Pedido_investimento_model extends CI_Model {
	
	public $id_pedido_investimento;
	public $prazo;
	public $objetivo;
	public $descricao;
	public $criado_em;
	public $nome;
	public $id_criador;

	public function __construct() {
		parent::__construct();
	}

	public function insert($prazo, $objetivo, $descricao, $nome, $id_criador) {
		$this->prazo = $prazo;
		$this->objetivo = $objetivo;
		$this->descricao = $descricao;
		$this->nome = $nome;
		$this->id_criador = $id_criador;

		$this->db->insert('pedido_investimento', $this);
	}

	public function update($id_pedido_investimento, $prazo, $objetivo, $descricao, $nome, $id_criador) {
		$this->prazo = $prazo;
		$this->objetivo = $objetivo;
		$this->descricao = $descricao;
		$this->nome = $nome;
		$this->id_criador = $id_criador;

		$this->db->update('pedido_investimento', $this, array('id_pedido_investimento' => $id_pedido_investimento));
	}

}