<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Galeria extends CI_Controller {
        public function __construct(){
            parent::__construct();


            $this->load->model('galeria_model','modelgaleria');
            $this->load->model('uploadfotos_model','modelupload');
        }
        
        public function index($id, $slug=null){
            $dados['listagalerias'] = $this->modelgaleria->listar_galerias();
            $dados['listagaleria'] = $this->modelgaleria->listar_galeria($id); 
            $dados['listafotos'] = $this->modelupload->listar_fotos();
            
            $this->load->view('frontend/template/html-header', $dados);
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/galeria'); 
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>