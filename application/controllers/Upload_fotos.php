<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Upload_fotos extends CI_Controller {
        public function __construct(){
            parent::__construct();

            $this->load->model('uploadfotos_model','modelupload');
        }
        
        public function index($id, $slug=null){
            $dados['listafotos'] = $this->modelupload->listar_fotos();
            $dados['listafoto'] = $this->modelupload->listar_foto($id);
            
            $this->load->view('frontend/template/html-header', $dados);
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/upload_fotos'); 
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>