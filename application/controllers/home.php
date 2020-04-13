<?php
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('logar_model');
    }


    public function index() {
        $this->logar_model->verifica_logado();
        redirect("home/logar/");
    }


    public function logar($aviso = null){
        $this->logar_model->verifica_logado();
        
        ///verifica avisos
        $dados = null;
        if($aviso == "incorreto"){ $dados['aviso'] = "Dados Incorretos"; }
        if($aviso == "logout"){ $dados['aviso'] = "Logoff realizado com sucesso!"; }

        $this->load->view('header');
        $this->load->view('logar', $dados);
        $this->load->view('footer');

    }



    public function login() {
        //Recebe do formulário
        $user = $this->input->post('usuario');
        $pass = $this->input->post('senha');
        ///chama a funcao de logar
        $this->logar_model->logar($user, $pass);
    }





    public function logout() {
        $this->session->sess_destroy();
        redirect("home/logar/logout");
    }

}
