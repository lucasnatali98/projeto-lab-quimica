<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producoes extends CI_controller{

    public function __contruct()
    {
        parent::__contruct();
        if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('Producoes_model','modelproducoes');
    }

    public function index()
    {
        $this->load->library('table');
        $dados['listaproducoes'] = $this->modelproducoes->listar_producoes();

        $dados['titulo']  ='Painel Administrativo';
        $dados['subtitulo'] = 'Producoes';

        $this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/producoes');
		$this->load->view('backend/template/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-titulo','Titulo da Producao','required|min_length[3]|is_unique[producao.nome]');
		$this->form_validation->set_rules('txt-descricao','Descricao da Producao');
		$this->form_validation->set_rules('txt-data','Data','required|min_length[3]');
		$this->form_validation->set_rules('txt-ano','Ano do Evento','required');
        //arquivo
        if($this->form_validation->run()==FALSE)
        {
            $this->index();
        }else{
			$titulo = $this->input->post('txt-titulo');
			$descricao = $this->input->post('txt-descricao');
			$data = $this->input->post('txt-data');
			$ano = $this->input->post('txt-ano');
			if($this->modelproducao->adicionar($titulo, $descricao, $data)){
				redirect(base_url('admin/producoes'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
    }

    public function excluir($id){
		if($this->modelproducoes->excluir($id)){
				redirect(base_url('admin/producoes'));
			}else{
				echo "Houve um erro no sistema!";
			}
    }
    
    public function alterar($id){
		$this->load->library('table');
        $dados['listaproducoes'] = $this->modelproducoes->listar_producoes($id);

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Produções';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-producoes');
		$this->load->view('backend/template/html-footer');
    }
    
    public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo','Titulo da Producao','required|min_length[3]');
        $this->form_validation->set_rules('txt-descricao','Descricao da Producao');
		$this->form_validation->set_rules('txt-data','Data','required|min_length[3]');
        //arquivo
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$id = $this->input->post('txt-id');
			$titulo = $this->input->post('txt-titulo');
            $descricao = $this->input->post('txt-descricao');
			$data = $this->input->post('txt-data');
			$ano = $this->input->post('txt-ano');
			//arquivo
			if($this->modelproducoes->alterar($id, $titulo, $descricao,$data,$ano)){ //arquivo
				redirect(base_url('admin/producoes'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}	
	}
}
?>