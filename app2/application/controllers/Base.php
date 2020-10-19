<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
    public function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('contatos_model');
    }
    public function index(){
            $data['title'] = "Base";
            $data['description'] = "Description Base";
            $this->load->view('home_editar', $data);
    }

    public function save(){

    }
}