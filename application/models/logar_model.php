<?php

class Logar_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }


    function logar($usuario, $senha){
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario.usu_login', $usuario);
        $this->db->where('usuario.usu_senha', $senha);
        $resultado = $this->db->get()->result();
        if($resultado){
            $this->session->set_userdata('usu_id', $resultado[0]->usu_id);
            $this->session->set_userdata('usu_nome', $resultado[0]->usu_nome);
            $this->session->set_userdata('usu_login', $resultado[0]->usu_login);
            $this->session->set_userdata('logado', '1');
            redirect("painel");
        }else{
            $this->session->set_userdata('logado', '0');
            redirect("home/logar/incorreto");
        }
    }



    function protege(){
        if(isset($this->session->userdata['logado'])){
            if($this->session->userdata['logado'] == 1){
                //echo "ta";
            }else{
                redirect("home/logar/");
            }
        }else{
            redirect("home/logar/");
        }
    }



    function verifica_logado(){
        if(isset($this->session->userdata['logado'])){
            if($this->session->userdata['logado'] == 1){
                redirect("painel/");
            }
        }
    }



}
