<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public $id;
	public $email;
	public $nome;
	public $status;

	public function __construct() {
		parent::__construct();
	}

	public function adicionar($nome, $email, $status) {
		$dados['nome'] = $nome;
		$dados['email'] = $email;
		$dados['status'] = $status;
		return $this->db->insert('tb_inscricao', $dados);
	}
}
