<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function index()
	{
		//echo "Ola index de Blog";
		//$data = array('title' => "Blog", 'heading' => "heading blog");
		$data['title'] = "Blog";
		//$this->load->view('comuns/header', $data);
		$this->load->view('blogview', $data);
		//$this->load->view('comuns/footer');

	}

	public function dizOla(){
		echo "Controler Blog -> metodo dizOla()";
	}

	public function addUser($id, $nome){
		echo "User ".$id." Nome ".$nome;
	}

	public function addUserSeg(){
		$g = $this->uri->segment(0);
		$controller = $this->uri->segment(1);
		$acao = $this->uri->segment(2);
		$id = $this->uri->segment(3);
		$nome = $this->uri->segment(4);
		echo $g.' '.$controller.' '.$acao.' '.$id.' '.$nome;
		$this->load->view('blogview');
	}
}
