<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('projetos_model','modelprojetos');
	}

	public function index(){
		$this->load->library('table');
        $dados['listaprojetos'] = $this->modelprojetos->listar_projetos();

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Projetos';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/projetos');
		$this->load->view('backend/template/html-footer');
	}

	public function inserir(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo','Titulo do Projeto','required|min_length[3]|is_unique[projeto.titulo]');
		$this->form_validation->set_rules('txt-descricao','Descricao do Projeto','required|min_length[10]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$titulo = $this->input->post('txt-titulo');
			$descricao = $this->input->post('txt-descricao');
			if($this->modelprojetos->adicionar($titulo, $descricao)){
				redirect(base_url('admin/projetos'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function excluir($id){
		if($this->modelprojetos->excluir($id)){
				redirect(base_url('admin/projetos'));
			}else{
				echo "Houve um erro no sistema!";
			}
	}

	public function alterar($id){
		$this->load->library('table');
        $dados['listaprojetos'] = $this->modelprojetos->listar_projeto($id);

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Projetos';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-projetos');
		$this->load->view('backend/template/html-footer');
	}

	public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo','Titulo do Projeto','required|min_length[3]');
		$this->form_validation->set_rules('txt-descricao','Descricao do Projeto','required|min_length[10]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$id = $this->input->post('txt-id');
			$titulo = $this->input->post('txt-titulo');
			$descricao = $this->input->post('txt-descricao');
			if($this->modelprojetos->alterar($id, $titulo, $descricao)){
				redirect(base_url('admin/projetos'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}	
	}

}
?>
