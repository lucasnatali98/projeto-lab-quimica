<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Producoes extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('Producoes_model','modelproducoes');

        }
        public function index($id, $slug=null)
        {
            $dados['listaproducoes'] = $this->modelproducoes->listar_producoes();
            $dados['listaproducao'] = $this->modelproducoes->listar_producoes($id);
            $dados['listaDeAnos'] = $this->modelproducoes->listar_anos();

            $this->load->view('frontend/template/html-header',$dados);
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/producoes'); //carrega o arquivo producoes dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>