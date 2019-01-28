<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('eventos_model','modeleventos');
	}

	public function index(){
		$this->load->library('table');
        $dados['listaeventos'] = $this->modeleventos->listar_eventos();

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Eventos';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/eventos');
		$this->load->view('backend/template/html-footer');
	}

	public function inserir(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo','Titulo do Evento','required|min_length[3]|is_unique[evento.titulo]');
		$this->form_validation->set_rules('txt-descricao','Descricao do Evento','required|min_length[10]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$titulo = $this->input->post('txt-titulo');
			$descricao = $this->input->post('txt-descricao');
			if($this->modeleventos->adicionar($titulo, $descricao)){
				redirect(base_url('admin/eventos'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function excluir($id){
		if($this->modeleventos->excluir($id)){
				redirect(base_url('admin/eventos'));
			}else{
				echo "Houve um erro no sistema!";
			}
	}

	public function alterar($id){
		$this->load->library('table');
        $dados['listaeventos'] = $this->modeleventos->listar_evento($id);

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'eventos';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-eventos');
		$this->load->view('backend/template/html-footer');
	}

	public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo','Titulo do evento','required|min_length[3]');
		$this->form_validation->set_rules('txt-descricao','Descricao do evento','required|min_length[10]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$id = $this->input->post('txt-id');
			$titulo = $this->input->post('txt-titulo');
			$descricao = $this->input->post('txt-descricao');
			if($this->modeleventos->alterar($id, $titulo, $descricao)){
				redirect(base_url('admin/eventos'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}	
	}

}
?>
