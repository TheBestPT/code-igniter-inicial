<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raiz extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->helper('url');  
        }
        public function index(){
                //$this->load->helper('url'); apenas para esta funcao
                $data['title'] = "Raiz";
                $data['description'] = "Description Home Page";
                $this->load->view('home', $data);
        }
        public function empresa(){
                //$this->load->helper('url'); apenas para esta funcao
                $data['title'] = "Empresa";
                $data['description'] = "Description Empresa";
                $this->load->view('empresa', $data);
        }

        public function servico(){
                //$this->load->helper('url'); apenas para esta funcao
                $data['title'] = "Servico";
                $data['description'] = "Description Servico";
                $this->load->view('servico', $data);
        }
        public function upload(){
                //$this->load->helper('url'); apenas para esta funcao
                $data['title'] = "Upload";
                $data['description'] = "Description Upload";
                $this->load->view('upload', $data);
        }
        public function contato(){
                //$this->load->helper('url'); apenas para esta funcao
                $data['title'] = "Contato";
                $data['description'] = "Description Contato";
                $this->load->view('contato', $data);
        }
        /*
        Após criarmos o controller, devemos criar as rotas para que o acesso a pagina requirida será processado
        desta forma indicamos como sera a url de acessoa as paginas

        As rotas: sao caminhos referentes a paginas de uma app que piodem ser configurados para executar um determinado metodo de um controller especifico, onde p mp,e pode especificar, onde o nome pode diferir URL.
        No CI podemos aceder a uma acao do controller pela URI
        http://url/controllers/method/varaible
        o usar rotas a padronizacao para SEO e nativa, uma vez que, é curta, amigavel e indica o conteudo. Alterart rotas aplication/config/routes.php
        $route['empresa'] = "Raiz/Empresa";
        
        */
}
