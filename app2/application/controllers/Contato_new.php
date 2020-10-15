<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato_new extends CI_Controller {
    /*
    Apóes a submissao de um formulario as mensagens geradas são apenas temporaririas.
    Para tornar qualquer informação permamente devemos usar a library Session, nativa do CI.
    De forma a que não seja necessaro invocar o carregamento de bib. varias vezes é possivel passar um array onde indicamos as bib. a serem carregados.
    $this->load->library('form_validation', 'session');
    Sessions do tipo flashdata-> representam carregamento por impuslso, isto e, ao mudar de pagina ou recarregando a pagina automaticamente sao excluidas de memoria
    */



    public function __construct(){
            parent::__construct();
            //$this->load->helper('url');  
            $this->load->helper(array('form', 'url'));  
            $this->load->library(array('form_validation', 'session'));
    }
    public function Contatos(){
            //$this->load->helper('url'); apenas para esta funcao
            $data['title'] = "Contatos";
            $data['description'] = "Description Contato";
            $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]');
            $this->form_validation->set_rules('telefone', 'Telefone', 'required|numeric');
            if($this->form_validation->run() == FALSE){
                /*
                validation_error() - metodo responsavel por recuperar as mensagens geradas pelas regras de validação que foram processados com a instrucao $this->form_validation->run()
                */
                $data['formErrors'] = validation_errors();//ou chamar diretamente na vista passando um tag como parametro <?=validation_errors('<div class="alert">','</div>);
            }else{
                /* Desta forma em caso de sucesso seera criada uma seession pelo metodo set_flashdata idenetificar de session, valor da session
                Na view onde ira ser carrefgada a session (application/views/contato_new.php) deeveerá ser capturado este eestado.
                Fazendo uso do metodo flashdata()->recupera o valor da session identifica no parametro*/
                //echo $this->session->flashdata('sucess_msg');
                $data['formErrors'] = null;
                $this->session->set_flashdata('sucess_msg', 'Contato processado com sucesso');
                //retina de add registo na db ou envio de email
            }

            $this->load->view('contato_new', $data);//alterar rotas $route['contato] = "Contato_new/Contatos"

            /*
            Preenchimento dos campos ciom os dados passados pelo user.
            O metodo set_value()->recupera os dados envidados pelo form, utilizado na view.
            O metodo set_value() tem um parametro que é o nome do campo, o mesmo usado no atributo name do input.
            application/views/contato_new.php 
            Exemplo para o nome:
            <input id="nome" name="nome" placeholder="Nome" required="required" type="text" value="<?=set_value('nome')?>">
            
            */
    }
}