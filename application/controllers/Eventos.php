<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Eventos extends CI_Controller {
        public function __construct(){
            parent::__construct();

            $this->load->model('eventos_model','modeleventos');
        }
        
        public function index($id, $slug=null){
            $dados['listaeventos'] = $this->modeleventos->listar_eventos();
            $dados['listaDeAnos'] = $this->modeleventos->listar_anos();
            
            
            $this->load->view('frontend/template/html-header', $dados);
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/eventos'); //carrega o arquivo eventos dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>