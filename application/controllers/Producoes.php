<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Producoes extends CI_Controller {
        public function __construct(){
            parent::__construct();
        }
        public function index()
        {
            $this->load->view('frontend/template/html-header');
            $this->load->view('frontend/template/header');
            $this->load-> view('frontend/producoes'); //carrega o arquivo eventos dentro da pasta view
            $this->load->view('frontend/template/footer');
            $this->load->view('frontend/template/html-footer');
        }
    }   
?>