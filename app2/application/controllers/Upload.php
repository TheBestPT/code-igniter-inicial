<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
        /*
        Formulario, em que nao sera utilizado HTML, mas sim os metodos do helper From. Ad tags HTMK relativas ao formulario, como form , input, textarea, e label, passarao a metodos do helper From.
        As tags <form> e </form> serao substituidas pelos metodos form_open_multipart() e form_close()
        Iremos fazer envio de arquivos e precisam que o entype do formulario seja multipart/form-data
        <input> por form_input(), etc....
        */
        public function __construct(){
                parent::__construct();
                $this->load->helper(array('form', 'url'));  
                $this->load->library(array('form_validation', 'session'));  
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
                $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]');
                $this->form_validation->set_rules('telefone', 'Telefone', 'required|numeric');
                if($this->form_validation->run() == FALSE){
                        /*
                        validation_error() - metodo responsavel por recuperar as mensagens geradas pelas regras de validação que foram processados com a instrucao $this->form_validation->run()
                        */
                        $data['formErrors'] = validation_errors();//ou chamar diretamente na vista passando um tag como parametro <?=validation_errors('<div class="alert">','</div>);
                }else{
                        $uploadFile = $this->UploadFile('ficheiro');
                        if($uploadFile['error']){
                                $data['formErrors'] = $uploadFile['message'];
                        }else{
                                $this->session->set_falshdata('sucess_msg', 'Upload recebido com sucesso');
                                $data['dadosArquivo'] = $uploadFile;
                                $data['formErros'] = null;
                        }
                        $data['formErrors'] = null;
                        //retina de add registo na db ou envio de email
                }
                $this->load->view('upload', $data);
        }

        private function UploadFile($inputFileName){
                /*
                O CodeIgniter possui uma biblioteca nativa para trabalhar com upload de arquivos, chamada File Uploading.
                carregamos a libary aqui porque so vamos usa la aqui
                */
                $this->load->library('upload');
                //definimos um caminho para upload, neste caso sera na raiz /app2
                $path = '../ficheiros';
                //definimos as configs para o upload
                //determinamos o path para gravar o arquivo
                $config['upload_path'] = $path;
                //definimos - atraves da extensao, os tipos de arquivos suportados
                $config['allowed_types'] = 'jpg|png|gif|pdf|zip|rar|doc|xls';
                //definimos o maximo permitido
                //php.ini definimos os tamanhos permitidos
                //post_max_sixe=15M -> pelo post
                //upload_max_filessize=15M //por upload
                $config['max_size'] = 51120;//em KB
                //definimos que o nome do arquivo sera criptografado
                $config['encrypt_name'] = TRUE;
                //verificamos se o diretorio existe se nao existe criamos com permissao de leitura e escrita
                if(!is_dir($path))
                        mkdir($path, 0777, $recursive = true);
                //setamos(passamos) as configs para a library upload
                $this->upload->initialize($config);
                if(!$this->upload->do_upload($inputFileName)){
                        //em caso de erro retornamos os mesmos para um variavel
                        //enviamos para a view
                        $data['error'] = true;
                        $data['message'] = $this->upload->display_errors();
                        echo "ola";
                }else{
                        $data[error] = false;
                        //recuperamos is dadis di arquivo e enviamos para o array view
                        $data['fileData'] = $this->upload->data();
                        $arquivoPath = $path.'/'.$data['fileData']['file_name'];
                        //passando para o array data
                        $data['urlArquivo'] = base_url($arquivoPath);
                        //definimos a url para download
                        $downloadPath = '../ficheiros/'.$data['filleData']['file_name'];
                        //passando para o array data
                        $data['urlDownload'] = base_url($downloadPath);
                        //carregamos a view as informacoes e link para download
                        $this->load->view('download', $data);
                }
                return $data; 
                /*
                alterar rotas 
                application/config/routes.php
                $route['upload] = 'Upload/Upload'*/       
        }
}