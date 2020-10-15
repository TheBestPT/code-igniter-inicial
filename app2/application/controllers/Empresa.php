<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->helper('url');  
        }
        public function index(){
                //$this->load->helper('url'); apenas para esta funcao
                $data['title'] = "Empresa";
                $data['description'] = "Description Empresa";
                $this->load->view('empresa', $data);
        }
}