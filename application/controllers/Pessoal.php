<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Pessoal extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('pessoal_model','modelpessoal');
        }
        
        public function index()
        {
            $dados['listapessoal'] = $this->modelpessoal->listar_pessoas();
            
            $this->load->view('frontend/template/html-header');
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/pessoal'); //carrega o arquivo projetos dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>