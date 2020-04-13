<?php

class Tipos_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function tipos(){
        $this->db->select('*');
        $this->db->from('tipo_ferramenta');
        $this->db->order_by('tip_nome', 'asc');
        return $this->db->get()->result();
    }


    function ver_tipo($id){
        $this->db->select('*');
        $this->db->from('tipo_ferramenta');
        $this->db->where('tip_id', $id);
        return $this->db->get()->result()[0];
    }


    function inserir_tipo($tip_nome){
        $data = array(
        'tip_nome' => $tip_nome
        );
        $this->db->insert('tipo_ferramenta', $data);
        return $this->db->affected_rows();
    }


    function alterar_tipo($tip_id, $tip_nome){
        $data = array(
        'tip_nome' => $tip_nome
        );

        $this->db->where('tip_id', $tip_id);
        $this->db->update('tipo_ferramenta', $data);
        return $this->db->affected_rows();
    }

    function apagar_tipo($id){
        $this->db->where('tip_id', $id);
        $this->db->delete('tipo_ferramenta');
        return $this->db->affected_rows();
    }

}
