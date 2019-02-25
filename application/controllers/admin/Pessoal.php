<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoal extends CI_Controller {

	public function __construct(){
        parent::__construct();
    }

    public function index(){
    	if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
        $this->load->library('table');
        $this->load->model('pessoal_model', 'modelpessoal');
        $dados['listapessoas'] = $this->modelpessoal->listar_pessoas();

		$dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Pessoal';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/pessoal');
		$this->load->view('backend/template/html-footer');
    }

    public function inserir(){
    	if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
        if($this->session->userdata('userlogado')->tipo == "administrador"){
            $this->load->model('pessoal_model', 'modelpessoal');
            $this->load->library('form_validation');
    		$this->form_validation->set_rules('txt-nome','Nome','required|min_length[3]');
    		$this->form_validation->set_rules('txt-cargo','Cargo','required|min_length[5]');
    		$this->form_validation->set_rules('txt-user','User','required|min_length[3]|is_unique[pessoal.user]');
            $this->form_validation->set_rules('txt-senha','Senha','required|min_length[3]');
            $this->form_validation->set_rules('txt-confir-senha','Confirmar Senha','required|matches[txt-senha]');
    		$this->form_validation->set_rules('txt-tipo','Funcao');

            if($this->form_validation->run() == FALSE){
                $this->index();
            }else{
                $nome = $this->input->post('txt-nome');
                $cargo = $this->input->post('txt-cargo');
                $lattes = $this->input->post('txt-lattes');
                $user = $this->input->post('txt-user');
                $senha = $this->input->post('txt-senha');
                $tipo = $this->input->post('txt-tipo');
       
                if($this->modelpessoal->adicionar($nome, $cargo, $lattes, $user, $senha, $tipo)){
                    redirect(base_url('admin/pessoal'));
                }
                else{
                    echo "Houve um erro no sistema!";
                    echo $this->upload->display_errors();
                }
            }
        }else{
            echo "Você não tem permissão para criar um novo usuário, entre em contato com o administrador do sistema!";
        }        
    }

    public function excluir($id){
    	if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
        if($this->session->userdata('userlogado')->tipo == "administrador"){
            $this->load->model('pessoal_model', 'modelpessoal');
            if($this->modelpessoal->excluir($id)){
                redirect(base_url('admin/pessoal'));
            }else{
                echo "Houve um erro no sistema!";
            }
        }else{
            echo "Você não tem permissão para excluir o usuário, entre em contato com o administrador do sistema!";
        }         
    }

    public function alterar($id){
    	if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
        if($this->session->userdata('userlogado')->tipo == "administrador"){
            $this->load->model('pessoal_model', 'modelpessoal');
            $dados['listapessoas'] = $this->modelpessoal->listar_pessoa($id);

		    $dados['titulo']= 'Painel Administrativo';
            $dados['subtitulo'] = 'Pessoal';

    		$this->load->view('backend/template/html-header', $dados);
    		$this->load->view('backend/template/template');
    		$this->load->view('backend/alterar-pessoal');
    		$this->load->view('backend/template/html-footer');
        }else{
            echo "Você não tem permissão para alterar os dados do usuário, entre em contato com o administrador do sistema!";
        }     
    }

    public function nova_foto(){
        if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
        $this->load->model('pessoal_model', 'modelpessoal');

        $id= $this->input->post('id');
        $config['upload_path']= './assets/frontend/img/pessoas';
        $config['allowed_types']= 'jpg|png';
        $config['file_name']= $id.".jpg";
        $config['overwrite']= TRUE;
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){
            echo $this->upload->display_errors();
        }
        else {
            $config2['source_image']= './assets/frontend/img/pessoas/'.$id.'.jpg';
            $config2['create_tumb']= FALSE;
            $config2['width']= 300;
            $config2['height']= 300;
            
            $this->load->library('image_lib', $config2);
            if($this->image_lib->resize()){
                if($this->modelpessoal->alterar_img($id)){
                    redirect(base_url('admin/pessoal/alterar/'.$id));
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
        if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
        if($this->session->userdata('userlogado')->tipo == "administrador"){
            $this->load->model('pessoal_model', 'modelpessoal');

            $this->load->library('form_validation');
    		$this->form_validation->set_rules('txt-nome','Nome','required|min_length[3]');
    		$this->form_validation->set_rules('txt-cargo','Cargo','required|min_length[5]');
    		$this->form_validation->set_rules('txt-user','User','required|min_length[3]');
            $this->form_validation->set_rules('txt-senha','Senha','required|min_length[3]');
            $this->form_validation->set_rules('txt-confir-senha','Confirmar Senha','required|matches[txt-senha]');
    		$this->form_validation->set_rules('txt-tipo','Funcao');

            if($this->form_validation->run() == FALSE){
                $this->index();
            }else{
                $id = $this->input->post('txt-id');
                $nome = $this->input->post('txt-nome');
                $cargo = $this->input->post('txt-cargo');
                $lattes = $this->input->post('txt-lattes');
                $user = $this->input->post('txt-user');
                $senha = $this->input->post('txt-senha');
                $tipo = $this->input->post('txt-tipo');
                if($this->modelpessoal->alterar($id, $nome, $cargo, $lattes, $user, $senha, $tipo)){
                    redirect(base_url('admin/pessoal'));
                }else{
                    echo "Houve um erro no sistema!";
                }
            }   
        }else{
            echo "Você não tem permissão para alterar os dados do usuário, entre em contato com o administrador do sistema!";
        }    
    }
    
    public function pag_login(){
        $dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Entrar no Sistema';

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/login');
		$this->load->view('backend/template/html-footer');
    }

    public function login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-user','User',
            'required|min_length[3]');
        $this->form_validation->set_rules('txt-senha','Senha',
            'required|min_length[3]');
        if($this->form_validation->run() == FALSE){
            $this->pag_login();
        }
        else{
            $usuario=$this->input->post('txt-user');
            $senha=$this->input->post('txt-senha');
            $this->db->where('user', $usuario);
            $this->db->where('senha', md5($senha));
            $userlogado = $this->db->get('pessoal')->result();
            if(count($userlogado)==1){
                $dadosSessao['userlogado'] = $userlogado[0]; 
                $dadosSessao['logado'] = TRUE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('admin'));
            }
            else{
                $dadosSessao['userlogado'] = NULL; 
                $dadosSessao['logado'] = FALSE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('admin/login'));
            }
        }
    }

	public function logout(){
        $dadosSessao['userlogado'] = NULL;
		$dadosSessao['logado'] = FALSE;
		$this->session->set_userdata($dadosSessao);
		redirect(base_url('admin/login'));
	}

}
?>