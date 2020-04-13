<?php

class Locacoes_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function locacoes(){
        $this->db->select('*');
        $this->db->from('locacao');
        $this->db->join('cliente', 'cli_id = loc_cliente', 'inner');
        $this->db->where('loc_status !=', 2);
        $this->db->group_by('cli_id');
        $this->db->order_by('loc_id', 'asc');
        return $this->db->get()->result();
    }

    function ver_cliente($id){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->join('cidade', 'cid_id = cli_cidade', 'inner');
        $this->db->where('cli_id', $id);
        return $this->db->get()->result()[0];
    }

    function ver_locacoes($id){
        $this->db->select('*');
        $this->db->from('locacao');
        $this->db->join('cliente', 'cli_id = loc_cliente', 'inner');
        $this->db->join('ferramenta', 'fer_id = loc_ferramenta', 'inner');
        $this->db->join('tipo_ferramenta', 'tip_id = fer_tipo', 'inner');
        $this->db->where('cli_id', $id);
        $this->db->where('loc_status', 0);
        $this->db->order_by('loc_id', 'asc');
        return $this->db->get()->result();
    }
    function ver_locacoes_a_pagar($id){
        $this->db->select('*');
        $this->db->from('locacao');
        $this->db->join('cliente', 'cli_id = loc_cliente', 'inner');
        $this->db->join('ferramenta', 'fer_id = loc_ferramenta', 'inner');
        $this->db->join('tipo_ferramenta', 'tip_id = fer_tipo', 'inner');
        $this->db->where('cli_id', $id);
        $this->db->where('loc_status', 1);
        $this->db->order_by('loc_id', 'asc');
        return $this->db->get()->result();
    }
    function ver_locacoes_historico($id){
        $this->db->select('*');
        $this->db->from('locacao');
        $this->db->join('cliente', 'cli_id = loc_cliente', 'inner');
        $this->db->join('ferramenta', 'fer_id = loc_ferramenta', 'inner');
        $this->db->join('tipo_ferramenta', 'tip_id = fer_tipo', 'inner');
        $this->db->where('cli_id', $id);
        $this->db->where('loc_status', 2);
        $this->db->order_by('loc_id', 'asc');
        return $this->db->get()->result();
    }
    function ver_loc($id){
        $this->db->select('*');
        $this->db->from('locacao');
        $this->db->join('cliente', 'cli_id = loc_cliente', 'inner');
        $this->db->join('ferramenta', 'fer_id = loc_ferramenta', 'inner');
        $this->db->join('tipo_ferramenta', 'tip_id = fer_tipo', 'inner');
        $this->db->where('loc_id', $id);
        return $this->db->get()->result()[0];
    }


    function entregar($loc_id){
        $loc = $this->ver_loc($loc_id);
        $data = array(
        'loc_status' => 1
        );

        $this->db->where('loc_id', $loc_id);
        $this->db->update('locacao', $data);

        $data = array(
        'fer_estado' => 4
        );

        $this->db->where('fer_id', $loc->loc_ferramenta);
        $this->db->update('ferramenta', $data);
        return $this->db->affected_rows();
    }
    function nao_entregue($loc_id){
        $data = array(
        'loc_status' => 0
        );

        $this->db->where('loc_id', $loc_id);
        $this->db->update('locacao', $data);
        return $this->db->affected_rows();
    }
    function pagar($loc_id){
        $data = array(
        'loc_status' => 2
        );

        $this->db->where('loc_id', $loc_id);
        $this->db->update('locacao', $data);
        return $this->db->affected_rows();
    }

    function inserir($par, $loc_ferramenta, $loc_data_locacao, $loc_data_devolucao, $loc_valor, $loc_acressimo, $loc_desconto){
        $data = array(
        'loc_cliente' => $par,
        'loc_ferramenta' => $loc_ferramenta,
        'loc_data_locacao' => $loc_data_locacao,
        'loc_data_devolucao' => $loc_data_devolucao,
        'loc_valor' => $loc_valor,
        'loc_acressimo' => $loc_acressimo,
        'loc_desconto' => $loc_desconto
        );
        $this->db->insert('locacao', $data);

        $data = array(
        'fer_estado' => 1
        );

        $this->db->where('fer_id', $loc_ferramenta);
        $this->db->update('ferramenta', $data);
        return $this->db->affected_rows();
    }

    function alterar_cliente($cli_id, $cli_nome, $cli_endereco, $cli_num, $cli_cidade, $cli_email, $cli_cel, $cli_tel, $cli_descricao, $cli_cpf, $cli_rg, $cli_cnpj, $cli_ie){
        $data = array(
        'cli_nome' => $cli_nome,
        'cli_endereco' => $cli_endereco,
        'cli_num' => $cli_num,
        'cli_cidade' => $cli_cidade,
        'cli_email' => $cli_email,
        'cli_cel' => $cli_cel,
        'cli_tel' => $cli_tel,
        'cli_descricao' => $cli_descricao,
        'cli_cpf' => $cli_cpf,
        'cli_rg' => $cli_rg,
        'cli_cnpj' => $cli_cnpj,
        'cli_ie' => $cli_ie
        );

        $this->db->where('cli_id', $cli_id);
        $this->db->update('cliente', $data);
        return $this->db->affected_rows();
    }

    function apagar($id){
        $this->db->where('loc_id', $id);
        $this->db->delete('locacao');
        return $this->db->affected_rows();
    }









}
