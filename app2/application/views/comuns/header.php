<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="desciption" content="Site da epcc">
	<meta name="author" content="Francisco Fernandes">
	<!-- Para usar o base_url devemos carregar o URL Helper.
	Em aplication/config/autoload.php $autoload['helper'] = array('url'); desta forma sera carregado automaticamente sempre que a aplicacao for iniciada
	ou manualmente $this->load->helper('url'); -> desta forma sera carregado apenas quando controller for inciado.
	Exemplo:
	function __construct(){
		devem incluir o construtor pai
		parant::__construct();
		$this->load->helper('url');
	}

	METODO DA BASE_URL()	
	É um dos metodos do helper url do CodeIgnator. Retorna o caminho passado como parametro concatenado com a url base da alicacao
	-->
	<link href="<?=base_url('resources/css/home.css');?>" rel="stylesheet">
	<title><?echo $title;?></title>
</head>