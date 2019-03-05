<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('categorias_model', 'modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index()
	{
		$this->load->helper('funcoes');
		$dados['categorias'] = $this->categorias;
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$dados['postagemAside'] = $this->modelpublicacoes->destaques_home();
		$this->load->model('usuarios_model', 'modelusuarios');
		$dados['autoresAside'] = $this->modelusuarios->autores_home();

		// Dados a serem enviados ao cabecalho
		$dados['titulo'] = 'Página Inicial';
		$dados['subtitulo'] = 'Artigos Recentes';
		
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/home');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}

	public function inserir() {
		$this->load->model('home_model', 'modelhome');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome', 'Nome inscrito', 'required');
		$this->form_validation->set_rules('txt-email', 'Email', 'required');

		if($this->form_validation->run() == false) {
			$this->index();
		} else {
			$nome = $this->input->post('txt-nome');
			$email = $this->input->post('txt-email');
			$status = $this->input->post('status');
			if($this->modelhome->adicionar($nome, $email, $status)) {
				redirect(base_url('?inscricao=sucesso'));
			} else {
				echo 'Houve um erro no sistema!';
			}
		}
	}
}
