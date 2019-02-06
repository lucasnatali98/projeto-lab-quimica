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
		$this->form_validation->set_rules('txt-ano','Ano do Evento','required');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$titulo = $this->input->post('txt-titulo');
			$descricao = $this->input->post('txt-descricao');
			$ano = $this->input->post('txt-ano');

			if($this->modeleventos->adicionar($titulo, $descricao, $ano)){
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

	public function nova_foto(){

		$this->load->model('eventos_model', 'modeleventos');

		$id= $this->input->post('id');
		$config['upload_path']= './assets/frontend/img/eventos';
		$config['allowed_types']= 'jpg';
		$config['file_name']= $id.".jpg";
		$config['overwrite']= TRUE;
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload()){
			echo $this->upload->display_errors();
		}
		else {
			$config2['source_image']= './assets/frontend/img/eventos/'.$id.'.jpg';
			$config2['create_tumb']= FALSE;
			$this->load->library('image_lib', $config2);
			if($this->image_lib->resize()){
				if($this->modeleventos->alterar_img($id)){
	                redirect(base_url('admin/eventos/alterar/'.$id));
	            }
	            else {
	                echo "Houve um erro no sistema!";
	            }
			}
			else {
				echo $this->image_lib->display_errors();
			}
		}
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
			$ano = $this->input->post('txt-ano');

			if($this->modeleventos->alterar($id, $titulo, $descricao, $ano)){
				redirect(base_url('admin/eventos'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}	
	}

}
?>
