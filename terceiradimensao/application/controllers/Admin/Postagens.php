<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postagens extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index()
	{
		$dados['titulo'] = 'Painel de Controle';
		$dados['subtitulo'] = 'Postagem';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/postagens');
		$this->load->view('backend/template/html-footer');
	}
}
