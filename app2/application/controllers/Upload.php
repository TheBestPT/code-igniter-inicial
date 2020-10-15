<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
        /*
        Formulario, em que nao sera utilizado HTML, mas sim os metodos do helper From. Ad tags HTMK relativas ao formulario, como form , input, textarea, e label, passarao a metodos do helper From.
        As tags <form> e </form> serao substituidas pelos metodos form_open_multipart() e form_close()
        Iremos fazer envio de arquivos e precisam que o entype do formulario seja multipart/form-data
        <input> por form_input(), etc....
        */
        public function __construct(){
                parent::__construct();
                $this->load->helper('url');  
        }
        public function index(){
                //$this->load->helper('url'); apenas para esta funcao
                $data['title'] = "Upload";
                $data['description'] = "Description Upload";
                $this->load->view('upload', $data);
        }

        public function Upload(){
                $data['title'] = "Upload";
                $data['description'] = "Description Upload";
                $this->load->view('upload', $data);   
        }
}