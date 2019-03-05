<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postagens extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('categorias_model', 'modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index($id, $slug=null)
	{
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$dados['postagemAside'] = $this->modelpublicacoes->destaques_home();
		$this->load->model('usuarios_model', 'modelusuarios');
		$dados['autoresAside'] = $this->modelusuarios->autores_home();
		$dados['comentarios'] = $this->modelpublicacoes->listar_comentarios();

		$this->load->helper('funcoes');
		$dados['categorias'] = $this->categorias;
		$this->load->model('publicacoes_model', 'modelpublicacoes');
		$dados['postagem'] = $this->modelpublicacoes->publicacao($id);

		// Dados a serem enviados ao cabecalho
		$dados['titulo'] = 'Publicação';
		$dados['subtitulo'] = '';
		$dados['subtitulodb'] = $this->modelpublicacoes->listar_titulo($id);

		$this->load->view('frontend/template/html-header', $dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/publicacao');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}

	public function comentario() 
	{
		$this->load->model('publicacoes_model', 'modelpublicacoes');

		$this->load->helper('funcoes');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('txt-nome', 'Nome', 'required|min_length[5]');
		$this->form_validation->set_rules('txt-email', 'Email', 'required');
		$this->form_validation->set_rules('txt-comentario', 'Comentário', 'required|min_length[20]');

		if($this->form_validation->run() == false) {
			$this->index();
		} else {
			$nome = $this->input->post('txt-nome');
			$email = $this->input->post('txt-email');
			$comentario = $this->input->post('txt-comentario');
			$id_postagem = $this->input->post('id_postagem');
			$status = $this->input->post('status');
			$titulo = $this->input->post('titulo_postagem');
			if($this->modelpublicacoes->comentarios($nome, $email, $comentario, $id_postagem, $status)) {
				redirect('postagem/'.$id_postagem.'/'.limpar($titulo));
			} else {
				echo 'Houve um erro no sistema!';
			}
		}
	}
}
