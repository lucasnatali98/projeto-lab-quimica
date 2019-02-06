<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_fotos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
        $this->load->model('uploadfotos_model','modelupload');
        $this->load->model('galeria_model','modelgaleria');
        //$this->load->model('producoes_model','modelproducoes');
    }

    public function index(){
        $this->load->library('table');
        $dados['listafotos'] = $this->modelupload->listar_fotos();
        $dados['listagalerias'] = $this->modelgaleria->listar_galerias();
        //$dados['listaproducoes'] = $this->modelproducoes->listar_producoes();

        $dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Fotos';

        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/upload_fotos');
        $this->load->view('backend/template/html-footer');
    }

    public function inserir(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-nome','Nome da foto','required|min_length[3]');
        $this->form_validation->set_rules('txt-id_galeria','Id da Galeria');
        $this->form_validation->set_rules('txt-id_producao','Id da Producao');

        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $nome = $this->input->post('txt-nome');
            $id_galeria = $this->input->post('txt-id_galeria');
            $id_producao = $this->input->post('txt-id_producao');
   
            if($this->modelupload->adicionar($nome, $id_galeria, $id_producao)){
                redirect(base_url('admin/upload_fotos'));
            }
            else{
                echo "Houve um erro no sistema!";
                echo $this->upload->display_errors();
            }
        }    
    }

    public function excluir($id){
        if($this->modelupload->excluir($id)){
                redirect(base_url('admin/upload_fotos'));
            }else{
                echo "Houve um erro no sistema!";
            }
    }

    public function alterar($id){
        $this->load->library('table');
        $dados['listafotos'] = $this->modelupload->listar_foto($id);
        $dados['listagalerias'] = $this->modelgaleria->listar_galerias();
 

        $dados['titulo']= 'Painel Administrativo';
        $dados['subtitulo'] = 'Fotos';

        $this->load->view('backend/template/html-header', $dados);
        $this->load->view('backend/template/template');
        $this->load->view('backend/alterar-upload-fotos');
        $this->load->view('backend/template/html-footer');
    }

    public function nova_foto(){
        $this->load->model('uploadfotos_model', 'modelupload');

        $id= $this->input->post('id');
        $config['upload_path']= './assets/frontend/img/fotos';
        $config['allowed_types']= 'jpg|png';
        $config['file_name']= $id.".jpg";
        $config['overwrite']= TRUE;
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){
            echo $this->upload->display_errors();
        }
        else {
            $config2['source_image']= './assets/frontend/img/fotos/'.$id.'.jpg';
            $config2['create_tumb']= FALSE;
            $config2['width']= 300;
            $config2['height']= 300;
            
            $this->load->library('image_lib', $config2);
            if($this->image_lib->resize()){
                if($this->modelupload->alterar_img($id)){
                    redirect(base_url('admin/upload_fotos/alterar/'.$id));
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
        $this->form_validation->set_rules('txt-nome','Nome da Foto','required|min_length[3]');
        $this->form_validation->set_rules('txt-id_galeria','Id da Galeria');
        $this->form_validation->set_rules('txt-id_producao','Id da Producao');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $id = $this->input->post('txt-id');
            $nome = $this->input->post('txt-nome');
            $id_galeria = $this->input->post('txt-id_galeria');
            $id_producao = $this->input->post('txt-id_producao');
            if($this->modelupload->alterar($id, $nome, $id_galeria, $id_producao)){
                redirect(base_url('admin/upload_fotos'));
            }else{
                echo "Houve um erro no sistema!";
            }
        }   
    }

}
?>
