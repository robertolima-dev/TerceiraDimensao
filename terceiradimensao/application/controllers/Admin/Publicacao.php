<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// PROTECAO DE SESSAO
		if(!$this->session->userdata('logado')) {
			redirect(base_url('Admin/login'));
		}

		$this->load->model('categorias_model', 'modelcategorias');
		$this->load->model('publicacoes_model', 'modelpublicacao');
		$this->categorias = $this->modelcategorias->listar_categorias();

	}

	public function index($pular=null, $post_por_pagina=null)
	{
		$this->load->helper('funcoes');
		$this->load->library('table');
		$this->load->library('pagination');

		$config['base_url'] = base_url('Admin/publicacao');
		$config['total_rows'] = $this->modelpublicacao->contar();
		$post_por_pagina = 10;
		$config['per_page'] = $post_por_pagina;

		$this->pagination->initialize($config);

		$dados['links_paginacao'] = $this->pagination->create_links();

		$dados['categorias'] = $this->categorias;
		$dados['publicacoes'] = $this->modelpublicacao->listar_publicacao($pular, $post_por_pagina);

		$dados['titulo'] = 'Painel de Controle';
		$dados['subtitulo'] = 'Publicação';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/publicacao');
		$this->load->view('backend/template/html-footer');
	}

	public function inserir() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo', 'Título', 'required|min_length[3]');
		$this->form_validation->set_rules('txt-subtitulo', 'Subtítulo', 'required|min_length[3]');
		$this->form_validation->set_rules('txt-conteudo', 'Conteúdo', 'required|min_length[20]');
		if($this->form_validation->run() == false) {
			$this->index();
		} else {
			$titulo = $this->input->post('txt-titulo');
			$subtitulo = $this->input->post('txt-subtitulo');
			$conteudo = $this->input->post('txt-conteudo');
			$dataPub = $this->input->post('txt-data');
			$categoria = $this->input->post('select-categoria');
			$userPub = $this->input->post('txt-usuario');
			if($this->modelpublicacao->adicionar($titulo, $subtitulo, $conteudo, $dataPub, $categoria, $userPub)) {
				redirect(base_url('Admin/publicacao'));
			} else {
				echo 'Houve um erro no sistema!';
			}
		}
	}

	public function excluir($id) {
		if($this->modelpublicacao->excluir($id)) {
				redirect(base_url('Admin/publicacao'));
			} else {
				echo 'Houve um erro no sistema!';
			}
	}

	public function alterar($id) {
		$this->load->library('table');
		$dados['categorias'] = $this->modelcategorias->listar_categorias();
		$dados['publicacoes'] = $this->modelpublicacao->listar_publicacoes($id);

		$dados['titulo'] = 'Painel de Controle';
		$dados['subtitulo'] = 'Publicação';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-publicacao');
		$this->load->view('backend/template/html-footer');
	}

	public function salvar_alteracoes($idCrip) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo', 'Título', 'required|min_length[3]');
		$this->form_validation->set_rules('txt-subtitulo', 'Subtítulo', 'required|min_length[3]');
		$this->form_validation->set_rules('txt-conteudo', 'Conteúdo', 'required|min_length[20]');
		if($this->form_validation->run() == false) {
			$this->alterar($idCrip);
		} else {
			$titulo = $this->input->post('txt-titulo');
			$subtitulo = $this->input->post('txt-subtitulo');
			$conteudo = $this->input->post('txt-conteudo');
			$dataPub = $this->input->post('txt-data');
			$categoria = $this->input->post('select-categoria');
			$id = $this->input->post('txt-id');
			if($this->modelpublicacao->alterar($titulo, $subtitulo, $conteudo, $dataPub, $categoria, $id)) {
				redirect(base_url('Admin/publicacao'));
			} else {
				echo 'Houve um erro no sistema!';
			}
		}
	}

	public function nova_foto() 
	{

		// PROTECAO DE SESSAO
		if(!$this->session->userdata('logado')) {
			redirect(base_url('Admin/login'));
		}

		$id = $this->input->post('id');
		// criar pasta para receber o upload
		$config['upload_path'] = './assets/frontend/img/publicacao';
		$config['allowed_types'] = 'jpg';
		$config['file_name'] = $id.'.jpg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload()) {
			echo $this->upload->display_errors();
		} else {
			$config2['source_image'] = './assets/frontend/img/publicacao/'.$id.'.jpg';
			$config2['create_thumb'] = FALSE;
			$config2['width'] = 900;
			$config2['height'] = 300;
			$this->load->library('image_lib', $config2);
			if($this->image_lib->resize()) {
				if($this->modelpublicacao->alterar_img($id)) {
					redirect(base_url('Admin/publicacao/alterar/'.$id));
				} else {
					echo 'Houve um erro no sistema!';
				}
			} else {
				echo $this->image_lib->display_errors();
			}
		}
	}
}
