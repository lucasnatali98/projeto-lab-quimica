<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Galeria extends CI_Controller {
        public function __construct(){
            parent::__construct();

           
        }
        
        public function index(){
            
            
            $this->load->view('frontend/template/html-header');
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/galeria'); //carrega o arquivo galeria dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>