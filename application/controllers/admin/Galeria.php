<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('galeria_model','modelgaleria');
		$this->load->model('uploadfotos_model','modelupload');
		//$this->load->model('producoes_model','modelproducoes');
	}

	public function index(){
		$this->load->library('table');
        $dados['listafotos'] = $this->modelupload->listar_fotos();
        $dados['listagalerias'] = $this->modelgaleria->listar_galerias();
        //$dados['listaproducoes'] = $this->modelgaleria->listar_producoes();

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Galeria';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/galeria');
		$this->load->view('backend/template/html-footer');
	}

	public function inserir(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome','Nome da Galeria','required|min_length[3]|is_unique[galeria.nome]');
		$this->form_validation->set_rules('txt-descricao','Descricao da Galeria');
		$this->form_validation->set_rules('txt-data','Data','required|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$nome = $this->input->post('txt-nome');
			$descricao = $this->input->post('txt-descricao');
			$data = $this->input->post('txt-data');
			if($this->modelgaleria->adicionar($nome, $descricao, $data)){
				redirect(base_url('admin/galeria'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function excluir($id){
		if($this->modelgaleria->excluir($id)){
				redirect(base_url('admin/galeria'));
			}else{
				echo "Houve um erro no sistema!";
			}
	}

	public function alterar($id){
		$this->load->library('table');
        $dados['listagalerias'] = $this->modelgaleria->listar_galeria($id);

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Galeria';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-galeria');
		$this->load->view('backend/template/html-footer');
	}

	public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome','Nome da Galeria','required|min_length[3]');
		$this->form_validation->set_rules('txt-descricao','Descricao da Galeria');
		$this->form_validation->set_rules('txt-data','Data','required|min_length[3]');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$id = $this->input->post('txt-id');
			$nome = $this->input->post('txt-nome');
			$descricao = $this->input->post('txt-descricao');
			$data = $this->input->post('txt-data');
			if($this->modelgaleria->alterar($id, $nome, $descricao, $data)){
				redirect(base_url('admin/galeria'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}	
	}

}
?>
