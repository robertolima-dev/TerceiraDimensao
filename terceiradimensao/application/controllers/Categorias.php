<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('categorias_model', 'modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index($id, $nome, $pular=null, $post_por_pagina=null)
	{
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$dados['postagemAside'] = $this->modelpublicacoes->destaques_home();
		$this->load->model('usuarios_model', 'modelusuarios');
		$dados['autoresAside'] = $this->modelusuarios->autores_home();

		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$this->load->library('pagination');

		$config['base_url'] = base_url('categoria/'.$id.'/'.$nome);
		$config['total_rows'] = $this->modelpublicacoes->contar1($id);
		$post_por_pagina = 10;
		$config['per_page'] = $post_por_pagina;

		$this->pagination->initialize($config);

		$dados['links_paginacao'] = $this->pagination->create_links();

		$this->load->helper('funcoes');
		$dados['categorias'] = $this->categorias;
		$dados['postagem'] = $this->modelpublicacoes->categoria_pub($id, $pular, $post_por_pagina);

		// Dados a serem enviados ao cabecalho
		$dados['titulo'] = 'Categorias';
		$dados['subtitulo'] = '';
		$dados['subtitulodb'] = $this->modelcategorias->listar_titulo($id);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/categoria');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
}
