<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Eventos extends CI_Controller {
        public function __construct(){
            parent::__construct();

            $this->load->model('eventos_model','modeleventos');
        }
        
        public function index($ano=2019, $slug=null){
            $dados['listaeventos'] = $this->modeleventos->listar_eventos();
            $dados['listaevento'] = $this->modeleventos->listar_evento($ano);
            $dados['listaDeAnos'] = $this->modeleventos->listar_anos();
            
            $this->load->view('frontend/template/html-header', $dados);
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/eventos'); //carrega o arquivo eventos dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>
