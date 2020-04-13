<?php

class Painel_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }




    function retorna_dados_usuario($id){
        $this->db->select('usu_id, usu_nome, usu_login, usu_adm');
        $this->db->from('usuario');
        $this->db->where('usuario.usu_id', $id);
        return $this->db->get()->result()[0];
    }



    function retorna_todos_usuarios(){
        $this->db->select('*');
        $this->db->from('usuario');
        return $this->db->get()->result();
    }
    
    function retorna_todas_cidades(){
        $this->db->select('*');
        $this->db->from('cidade');
        return $this->db->get()->result();
    }

    function c_data($data){
        if($data != null){
            $data = explode("/", $data);
            return $data[2] . "-" . $data[1] . "-" . $data[0];
        }
    }

    function r_data($data){
        if($data != null){
            $data = explode("-", $data);
            return $data[2] . "/" . $data[1] . "/" . $data[0];
        }
    }





    


}
