class Imagem_model extends CI_Model {
	
	public $id_imagem;
	public $conteudo;
	public $descricao;

	public function __construct() {
		parent::__construct();
	}

	public function insert($conteudo, $descricao) {
		$this->conteudo = $conteudo;
		$this->descricao = $descricao;

		$this->db->insert('imagem', $this);
	}

	public function update($id_imagem, $conteudo, $descricao) {
		$this->conteudo = $conteudo;
		$this->descricao = $descricao;

		$this->db->update('imagem', $this, array('id_imagem' => $id_imagem));
	}

}