<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('contatos_model','modelcontatos');
	}

	public function index(){
		$this->load->library('table');
        $dados['listacontatos'] = $this->modelcontatos->listar_contatos();

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Contatos';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/contatos');
		$this->load->view('backend/template/html-footer');
	}

	public function inserir(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome','Nome','required|min_length[3]');
		$this->form_validation->set_rules('txt-email','Email','required|min_length[10]|is_unique[contato.email]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$nome = $this->input->post('txt-nome');
			$email = $this->input->post('txt-email');
			if($this->modelcontatos->adicionar($nome, $email)){
				redirect(base_url('admin/contatos'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}

	public function excluir($id){
		if($this->modelcontatos->excluir($id)){
				redirect(base_url('admin/contatos'));
			}else{
				echo "Houve um erro no sistema!";
			}
	}

	public function alterar($id){
		$this->load->library('table');
        $dados['listacontatos'] = $this->modelcontatos->listar_contato($id);

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Contatos';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-contatos');
		$this->load->view('backend/template/html-footer');
	}

	public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-nome','Nome','required|min_length[3]');
		$this->form_validation->set_rules('txt-email','Email','required|min_length[10]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$id = $this->input->post('txt-id');
			$nome = $this->input->post('txt-nome');
			$email = $this->input->post('txt-email');
			if($this->modelcontatos->alterar($id, $nome, $email)){
				redirect(base_url('admin/contatos'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}	
	}

}
?>
