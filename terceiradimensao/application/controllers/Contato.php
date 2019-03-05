<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('categorias_model', 'modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index($enviado=null)
	{
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$dados['postagemAside'] = $this->modelpublicacoes->destaques_home();
		$this->load->model('usuarios_model', 'modelusuarios');
		$dados['autoresAside'] = $this->modelusuarios->autores_home();
		$this->load->helper('funcoes');
		$dados['categorias'] = $this->categorias;
		//$this->load->model('contato_model', 'modelcontato');
		//$dados['contato'] = $this->modelpublicacoes->destaques_home();

		// Dados a serem enviados ao cabecalho
		$dados['titulo'] = 'Contato';
		$dados['subtitulo'] = 'Fale Conosco';
		$dados['enviado'] = $enviado;
		
		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/contato');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}

	public function inserir()
	{
		$this->load->library('form_validation'); 
		$this->load->model('contato_model', 'modelcontato');

		$this->form_validation->set_rules('txt-nome', 'Nome', 'required');
		$this->form_validation->set_rules('txt-email', 'Email', 'required');
		$this->form_validation->set_rules('txt-mensagem', 'Mensagem', 'required');

		if($this->form_validation->run()) {
			$nome = $this->input->post('txt-nome');
			$email = $this->input->post('txt-email');
			$mensagem = $this->input->post('txt-mensagem');
			$status = $this->input->post('txt-status');
			if($this->modelcontato->adicionar($nome, $email, $mensagem, $status)) {
				redirect('contato/?contato=sucesso');
			} else {
				echo 'Houve um erro no sistema';
			}

		}
	}
}