<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller {
        public function __construct(){
            parent::__construct();
        }
        public function index()
        {
            $this->load->view('frontend/template/html-header');
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/home'); //carrega o arquivo home dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>