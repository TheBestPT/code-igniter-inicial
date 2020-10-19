<? $this->load->view('comuns/header'); ?>
<body>
	<div id="container">
		<div class="inner">
			<h1 class="menu">Menu Upload</h1>
			<nav>
				<? $this->load->view('comuns/menu'); ?>
			</nav>
		</div>
	</div>
	<? //print_r($formErros);?>
	<?if($formErrors){?>
		<div class="alert alert-danger"><?=$formErrors;?></div>
	<?}else{
		if($this->session->flashdata('sucess_msg')){?>
		<div class="alert alert-sucess"><?=$this->session->flashdata('sucess_msg');?></div>
		<?}
	}?>


	<?//=validation_errors('<div class="alert>', '</div>');?>
	<div class="container">
		<div class="page-header">
			<h1>Formulário de Contato</h1>
		</div>
		<?=form_open_multipart(base_url('upload'), array("class" => "form-horizontal", "method" => "PSOT"));
		?>
		<label for="nome">Nome</label>
		<?=form_input(array("name" => "nome", "id" => "nome"), set_value('nome'), array("class" => "form-control input-md", "required" =>"required", "type" => "text", "placeholder" => "Nome"));?>
		<label for="telefone">Telefone</label>
		<?=form_input(array("name" => "telefone", "id" => "telefone"), set_value('telefone'), array("class" => "form-control input-md", "required" =>"required", "type" => "text", "placeholder" => "Telefone"));
		?>
		<label for="ficheiro">Selecione um file (jpg|png|gif|pdf|zip|rar|doc|xls)</label>
		<?=form_upload(array("name" => "ficheiro", "id" => "ficheiro"), set_value('ficheiro'), array("class" => "input-file", "required" => ""));		
		?>
		<input type="submit" value="enviar"/>
		<?=form_close();?>
	</div>
<? $this->load->view('comuns/footer'); ?>