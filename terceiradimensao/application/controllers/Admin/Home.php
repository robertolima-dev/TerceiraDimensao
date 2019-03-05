<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// PROTECAO DE SESSAO
		if(!$this->session->userdata('logado')) {
			redirect(base_url('Admin/login'));
		}

	}

	public function index()
	{
		$dados['titulo'] = 'Painel de Controle';
		$dados['subtitulo'] = 'Home';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/home');
		$this->load->view('backend/template/html-footer');
	}
}
