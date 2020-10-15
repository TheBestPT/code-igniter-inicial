<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {
    public function __construct(){
            parent::__construct();
            $this->load->helper('url');  
    }
    public function index(){
            //$this->load->helper('url'); apenas para esta funcao
            $data['title'] = "Servico";
            $data['description'] = "Description Servico";
            $this->load->view('servico', $data);
    }
}
?>