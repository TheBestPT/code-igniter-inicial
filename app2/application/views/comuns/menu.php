<ul class="nav menu-nav">
    <!--
        $this->router->fecth_class() : É responsável por verificar se a classe chamda é raiz.
        $this->router->fecth_method() : se existe o metodo na classe
        Sem configurar o base_url(), por padrao o seu valor e assumido como vazio, deste modo o carregamento em servidor pela ultima raiz conhecida [::1]

        de forma a padronizar devemos alterar em application/config/config.php
        $config['base_url'] = '';


        configurar a pagina inicial no carregamento.
        o arquivo aplication/config/route.php
        A rota padrao sera um arquivo de views
        padrao:
        $route['default_controller'] = 'welcome';
        $route['default_controller'] = 'Raiz';
    -->
    <li class="<?=($this->router->fetch_class() == 'Raiz' && $this->router->fetch_method() == 'index') ? 'active' : null; ?>"><a href="<?=base_url()?>">Home</a></li>
    <li class="<?=($this->router->fetch_class() == 'Raiz' && $this->router->fetch_method() == 'empresa') ? 'active' : null; ?>"><a href="<?=base_url('empresa')?>">Empresa</a></li>
    <li class="<?=($this->router->fetch_class() == 'Raiz' && $this->router->fetch_method() == 'servico') ? 'active' : null; ?>"><a href="<?=base_url('servico')?>">Servicos</a></li>
    <li class="<?=($this->router->fetch_class() == 'Raiz' && $this->router->fetch_method() == 'upload') ? 'active' : null; ?>"><a href="<?=base_url('upload')?>">Upload</a></li>
    <li class="<?=($this->router->fetch_class() == 'Raiz' && $this->router->fetch_method() == 'contato') ? 'active' : null; ?>"><a href="<?=base_url('contato')?>">Contato</a></li>
</ul>