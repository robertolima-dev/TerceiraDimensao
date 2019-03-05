<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato_model extends CI_Model {

	public $id;
	public $email;
	public $nome;
	public $mensagem;
	public $status;

	public function __construct() {
		parent::__construct();
	}

	public function adicionar($nome, $email, $mensagem, $status) {
		$dados['nome'] = $nome;
		$dados['email'] = $email;
		$dados['mensagem'] = $mensagem;
		$dados['status'] = $status;
		return $this->db->insert('tb_contato', $dados);
	}
}
