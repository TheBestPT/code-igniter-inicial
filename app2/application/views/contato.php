<? $this->load->view('comuns/header'); ?>
<body>
	<div id="container">
		<div class="inner">
			<h1 class="menu">Menu Contato</h1>
			<nav>
				<? $this->load->view('comuns/menu'); ?>
			</nav>
		</div>
	</div>
	<? //print_r($formErros);?>
	<?=validation_errors('<div class="alert>', '</div>');?>
	<div class="container">
		<div class="page-header">
			<h1>Formulário de Contato</h1>
		</div>
		<form class="" method="POST" action="">
			<label for="nome">Nome</label>
			<input id="nome" name="nome" placeholder="Nome" required="required" type="text">
			<label for="email">Email</label>
			<input id="email" name="email" placeholder="Email" type="text">
			<span>Ex.: email@example.com</span>
			<label for="telefone">Telefone</label>
			<input id="telefone" name="telefone" placeholder="Telefone" required="required" type="text">
			<label for="assunto">Assunto</label>
			<input id="assunto" name="assunto" placeholder="Assunto" type="text">
			<label for="mensagem">Mensagem</label>
			<textarea id="mensagem" name="mensagem" row="10">mensagem</textarea>
			<input type="submit" value="Enviar"/>
			
		</form>
	</div>
<? $this->load->view('comuns/footer'); ?>