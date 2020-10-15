<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
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