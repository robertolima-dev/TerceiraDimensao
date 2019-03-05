<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobrenos extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('categorias_model', 'modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
		$this->load->model('usuarios_model', 'modelusuarios');
	}

	public function index()
	{
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$dados['postagemAside'] = $this->modelpublicacoes->destaques_home();
		$this->load->helper('funcoes');
		$dados['categorias'] = $this->categorias;
		$dados['autores'] = $this->modelusuarios->listar_autores();
		$this->load->model('usuarios_model', 'modelusuarios');
		$dados['autoresAside'] = $this->modelusuarios->autores_home();

		// Dados a serem enviados ao cabecalho
		$dados['titulo'] = 'Sobre Nós';
		$dados['subtitulo'] = 'Conheça nossa Equipe';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/sobrenos');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}

	public function autores($id, $slug=null) 
	{
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$dados['postagemAside'] = $this->modelpublicacoes->destaques_home();
		$this->load->model('usuarios_model', 'modelusuarios');
		$dados['autoresAside'] = $this->modelusuarios->autores_home();

		$this->load->helper('funcoes');
		$dados['categorias'] = $this->categorias;
		$dados['autores'] = $this->modelusuarios->listar_autor($id);

		// Dados a serem enviados ao cabecalho
		$dados['titulo'] = 'Sobre Nós';
		$dados['subtitulo'] = 'Autor(a)';

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/autor');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
