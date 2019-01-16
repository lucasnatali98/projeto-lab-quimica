<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Projetos extends CI_Controller {
        public function __construct(){
            parent::__construct();

            $this->load->model('projetos_model','modelprojetos');
        }
        
        public function index(){
            $dados['listaprojetos'] = $this->modelprojetos->listar_projetos();
            
            $this->load->view('frontend/template/html-header', $dados);
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/projetos'); //carrega o arquivo projetos dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>