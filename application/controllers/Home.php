<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Home extends CI_Controller {
        public function index( )
        {
            $this->load->view('template/html-header');
            $this->load->view('template/header');
            $this->load-> view('Home'); //carrega o arquivo home dentro da pasta view
            $this->load->view('template/footer');
        }
    }   
?>