<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('pessoal_model','modelpessoal');
	}

	public function index(){
		$this->load->library('table');
        $dados['listapessoal'] = $this->modelpessoal->listar_pessoas();

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Pessoal';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/pessoal');
		$this->load->view('backend/template/html-footer');
	}

	public function inserir(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome','Nome','required|min_length[3]');
		$this->form_validation->set_rules('txt-cargo','Cargo atual','required|min_length[5]');
		//$this->form_validation->set_rules('txt-lattes', 'link para o lattes','required|min_length[10]');

		//$this->form_validation->set_rules('txt-foto', 'Foto');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$nome = $this->input->post('txt-nome');
			$cargo = $this->input->post('txt-cargo');
			$lattes = $this->input->post('txt-lattes');
			

		
			if($this->modelpessoal->adicionar($nome, $cargo, $lattes, $foto)){
					redirect(base_url('admin/pessoal'));
			
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function excluir($id){
		if($this->modelpessoal->excluir($id)){
				redirect(base_url('admin/pessoal'));
			}else{
				echo "Houve um erro no sistema!";
			}
	}

	public function alterar($id){
		$this->load->library('table');
        $dados['listapessoa'] = $this->modelpessoal->listar_pessoa($id);

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Pessoal';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-pessoal');
		$this->load->view('backend/template/html-footer');
	}

	
	

	public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome','Nome','required|min_length[3]');
		$this->form_validation->set_rules('txt-cargo','Cargo atual','required|min_length[10]');
		
		$this->form_validation->set_rules('txt-foto', 'Foto');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$id = $this->input->post('txt-id');
			$nome = $this->input->post('txt-nome');
			$cargo = $this->input->post('txt-cargo');
			$lattes = $this->input->post('txt-lattes');
			//$foto = $this->input->post('txt-foto');
			
		

			if($this->modelpessoal->alterar($id, $nome, $cargo, $lattes, $foto)){
				redirect(base_url('admin/pessoal'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}	
	}


		
	

}
?>