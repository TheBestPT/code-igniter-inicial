<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {
    /*
    Para validar um formulario sera usada a libery From_Validation, nativa do CI.
    O helper From, vai permitir montar os formularios usadndo metodos nativos do CI.
    Uma vez que apenas o controlador de Contato vai fazer uso da libary e do helper, vamos criar um método __constuct na classe fazendo com que sejam carregados para todos os metodos
    Se for apenas necessario num determinado metodo basta add no proprio metodo
    */
    public function __construct(){
            parent::__construct();
            //$this->load->helper('url');  
            $this->load->helper(array('form', 'url'));  
            $this->load->library('form_validation');
    }
    public function Contatos(){
            //$this->load->helper('url'); apenas para esta funcao
            $data['title'] = "Contatos";
            $data['description'] = "Description Contato";
            /*
            CodeIgnater identifica se o formulario foi ou nao submetido.
            Só após o utilizador submeter pelo POST o formulario e que eo CI executara o processo de validacao.
            Em qualquer formulario devemos indicar regras de validacao para os campos de controlo.
            Devemos configurar as regras dee validacao, no CI sao conhecidas por set_rules
            Sintaxe:
            $this->form_validation->set_rules(nome, descricao, reegras);
            1 - nome: é o nome especificado no atributo name do input;
            2 - descricao: é o nome do campo que sera eexibido na mensagem de erro.
            3- regras: sao as regras que devem ser aplicadas em cada campo. Podemos aplicar varias regras a um determinado campo.
            Exemplo de regras:
            -required-> retorna falso quando o elemento foi devolvido vazio.
            -min_length->Retorna falso se o elemento devolvido nao tem no minimo x carateres.
            exemplo de min: min_length[3]
            trim: remove espacos em branco antes e depois do valor do campo
            exemplo:(caso queiras usar mais de uma)
            min_length[3]|trim
            //https://codeigniter.com/userguide3/libraries/form_validation.html
            */
            $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]');
            $this->form_validation->set_rules('telfone', 'Telefone', 'required|numeric');
            if($this->form_validation->run() == FALSE){
                /*
                validation_error() - metodo responsavel por recuperar as mensagens geradas pelas regras de validação que foram processados com a instrucao $this->form_validation->run()
                */
                $data['formErrors'] = validation_errors();//ou chamar diretamente na vista passando um tag como parametro <?=validation_errors('<div class="alert">','</div>);
            }else{
                $data['formErrors'] = null;
                //retina de add registo na db ou envio de email
            }

            $this->load->view('contato', $data);//alterar rotas $route['contato] = "Contato/Contatos"
    }
}