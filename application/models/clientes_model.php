<?php

class Clientes_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function clientes(){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->order_by('cli_nome', 'asc');
        return $this->db->get()->result();
    }

    function ver_cliente($id){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->join('cidade', 'cid_id = cli_cidade', 'inner');
        $this->db->where('cli_id', $id);
        return $this->db->get()->result()[0];
    }

    function inserir_cliente($cli_nome, $cli_endereco, $cli_num, $cli_cidade, $cli_email, $cli_cel, $cli_tel, $cli_descricao, $cli_cpf, $cli_rg, $cli_cnpj, $cli_ie){
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
        $this->db->insert('cliente', $data);
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

    function apagar_cliente($id){
        $this->db->where('cli_id', $id);
        $this->db->delete('cliente');
        return $this->db->affected_rows();
    }











































    function ver_noticia($id){
        $this->db->select('*');
        $this->db->from('cc_noticia');
        $this->db->where('not_id', $id);

        return $this->db->get()->result()[0];
    }
    function ver_autor_noticia($id){
        $this->db->select('*');
        $this->db->from('cc_autor_noticia');
        $this->db->join('cc_usuario', 'cc_usuario.usu_id = cc_autor_noticia.aut_usuario_id', 'inner');
        $this->db->where('aut_noticia_id', $id);
        return $this->db->get()->result();
    }

    function verifica_autor($noticia, $user){
        $this->db->select('*');
        $this->db->from('cc_autor_noticia');
        $this->db->where('aut_noticia_id', $noticia);
        $this->db->where('aut_usuario_id', $user);
        return (bool)($this->db->get()->result());
    }
    function descobrir_permissao($nucleo, $noticia, $user){
        if($this->verifica_autor($noticia, $user) == 1){
            $this->db->select('*');
            $this->db->from('cc_noticia_nucleo');
            $this->db->where('noo_noticia_id', $noticia);
            $this->db->where('noo_nucleo_id', $nucleo);
            $this->db->where('noo_aprovacao', 1);
            if((bool)($this->db->get()->result())){
                return "sua_na";
            }else{
                return "sua_a";
            }
        }else{
            $this->db->select('*');
            $this->db->from('cc_noticia_nucleo');
            $this->db->where('noo_noticia_id', $noticia);
            $this->db->where('noo_nucleo_id', $nucleo);
            $this->db->where('noo_aprovacao', 1);
            if((bool)($this->db->get()->result())){
                return "ger_na";
            }else{
                return "ger_a";
            }
        }
    }
    function inserir_noticia($id_usuario, $id_nucleo, $not_titulo, $not_subtitulo, $not_conteudo, $not_conteudo_sem_formatacao, $not_foto, $not_criado, $not_revisado, $not_slug, $not_palavra_chave){

        $noticia = array(
        'not_titulo' => $not_titulo,
        'not_subtitulo' => $not_subtitulo,
        'not_conteudo' => $not_conteudo,
        'not_conteudo_sem_formatacao' => $not_conteudo_sem_formatacao,
        'not_foto' => $not_foto,
        'not_criado' => $not_criado,
        'not_revisado' => $not_revisado,
        'not_slug' => $not_slug,
        'not_palavra_chave' => $not_palavra_chave
        );
        $this->db->insert('cc_noticia', $noticia);


        $this->db->select('*');
        $this->db->from('cc_noticia');
        $this->db->where($noticia);
        $id_noticia = $this->db->get()->result()[0]->not_id;



        $noticia_nucleo = array(
        'noo_noticia_id' => $id_noticia,
        'noo_nucleo_id' => $id_nucleo,
        'noo_destaque' => 0,
        'noo_visita' => 0,
        'noo_aprovacao' => 0,
        'noo_original' => 1
        );
        $this->db->insert('cc_noticia_nucleo', $noticia_nucleo);

        $autor_noticia = array(
        'aut_noticia_id' => $id_noticia,
        'aut_usuario_id' => $id_usuario,
        'aut_original' => 1
        );
        $this->db->insert('cc_autor_noticia', $autor_noticia);
        
        return $this->db->affected_rows();
    }


    function alterar_noticia($not_id, $not_titulo, $not_subtitulo, $not_conteudo, $not_conteudo_sem_formatacao, $not_foto, $not_criado, $not_revisado, $not_slug, $not_palavra_chave){

        $data = array(
        'not_titulo' => $not_titulo,
        'not_subtitulo' => $not_subtitulo,
        'not_conteudo' => $not_conteudo,
        'not_conteudo_sem_formatacao' => $not_conteudo_sem_formatacao,
        'not_foto' => $not_foto,
        'not_criado' => $not_criado,
        'not_revisado' => $not_revisado,
        'not_slug' => $not_slug,
        'not_palavra_chave' => $not_palavra_chave
        );

        $this->db->where('not_id', $not_id);
        $this->db->update('cc_noticia', $data);
        return $this->db->affected_rows();
    }

    function verifica_duplicacao($id_noticia, $id_nucleo){
        $this->db->select('*');
        $this->db->from('cc_noticia_nucleo');
        $this->db->where('noo_noticia_id', $id_noticia);
        $this->db->where('noo_nucleo_id', $id_nucleo);
        return (bool)($this->db->get()->result());
    }


    function duplicar_noticia($id_noticia, $id_nucleo){
        if(!$this->verifica_duplicacao($id_noticia, $id_nucleo)){
            $noticia_nucleo = array(
            'noo_noticia_id' => $id_noticia,
            'noo_nucleo_id' => $id_nucleo,
            'noo_destaque' => 0,
            'noo_visita' => 0,
            'noo_aprovacao' => 0,
            'noo_original' => 0
            );
            $this->db->insert('cc_noticia_nucleo', $noticia_nucleo);
            return $this->db->affected_rows();
        }else{
            return 2;
        }
    }


    function apagar_noticia($not_id){
        
        $this->apaga_foto_noticia($not_id);

        $this->db->where('aut_noticia_id', $not_id);
        $this->db->delete('cc_autor_noticia');

        $this->db->where('noo_noticia_id', $not_id);
        $this->db->delete('cc_noticia_nucleo');

        $this->db->where('not_id', $not_id);
        $this->db->delete('cc_noticia');
        return $this->db->affected_rows();
    }

    function retorna_todos_nucleos($id){
        $this->db->select('*');
        $this->db->from('cc_noticia_nucleo');
        $this->db->join('cc_nucleo', 'cc_noticia_nucleo.noo_nucleo_id = cc_nucleo.nuc_id', 'inner');
        $this->db->where('cc_noticia_nucleo.noo_noticia_id', $id);
        return $this->db->get()->result();
    }
    function verifica_nucleo_original($id_noticia, $id_nucleo){
        $this->db->select('*');
        $this->db->from('cc_noticia_nucleo');
        $this->db->where('cc_noticia_nucleo.noo_noticia_id', $id_noticia);
        $this->db->where('cc_noticia_nucleo.noo_nucleo_id', $id_nucleo);
        $this->db->where('cc_noticia_nucleo.noo_original', 1);
        return (bool)($this->db->get()->result());
    }

    function remover_duplicacao($id_noticia, $id_nucleo){
        //var_dump($this->verifica_nucleo_original($id_noticia, $id_nucleo));
        if(!$this->verifica_nucleo_original($id_noticia, $id_nucleo)){
            $this->db->where('noo_noticia_id', $id_noticia);
            $this->db->where('noo_nucleo_id', $id_nucleo);
            $this->db->delete('cc_noticia_nucleo');
            return $this->db->affected_rows();
        }else{
            return 2;
        }
    }


    function verifica_autor_original($id_noticia, $id_autor){
        $this->db->select('*');
        $this->db->from('cc_autor_noticia');
        $this->db->where('aut_noticia_id', $id_noticia);
        $this->db->where('aut_usuario_id', $id_autor);
        $this->db->where('aut_original', 1);
        return (bool)($this->db->get()->result());
    }

    function inserir_autor($id_noticia, $id_autor){
        if(!$this->verifica_autor($id_noticia, $id_autor)){
            $data = array(
            'aut_noticia_id' => $id_noticia,
            'aut_usuario_id' => $id_autor,
            'aut_original' => 0
            );
            $this->db->insert('cc_autor_noticia', $data);
            return $this->db->affected_rows();
        }else{
            return 2;
        }
    }


    function remover_autor($id_noticia, $id_autor){
        if(!$this->verifica_autor_original($id_noticia, $id_autor)){
            $this->db->where('aut_noticia_id', $id_noticia);
            $this->db->where('aut_usuario_id', $id_autor);
            $this->db->delete('cc_autor_noticia');
            return $this->db->affected_rows();
        }else{
            return 2;
        }
    }


    function apaga_foto_noticia($not_id){
        $this->db->select('*');
        $this->db->from('cc_noticia');
        $this->db->where('cc_noticia.not_id', $not_id);
        $foto = $this->db->get()->result()[0]->not_foto;
        if(unlink("assets/upload/sistema/noticias/". $foto ."")){
            return true;
        }else{
            return false;
        }

    }
/*
    function principal($qtd = 0, $inicio = 0) {
        if ($qtd > 0)
            $this->db->limit($qtd, $inicio);
        $this->db->order_by("not_criado", "desc");
        return $this->db->get('cc_noticia')->result();
    }

    function ver($slug_noticias) {
        $this->db->select('*');
        $this->db->from('cc_noticia');
        $this->db->where('not_slug', $slug_noticias);
        return $this->db->get()->result();
    }

    function retorna_fotos_auxiliares($noticia) {
        $this->db->select('*');
        $this->db->from('cc_foto_noticia_auxiliar');
        $this->db->where('for_noticia', $noticia);
        return $this->db->get()->result();
    }
    function similares($palavras_chave, $id) {
        $pcs = explode(' ', $palavras_chave);
        $this->db->like('not_palavra_chave', $pcs[0]);
        foreach ($pcs as $pc):
            $this->db->or_like('not_palavra_chave', $pc);
        endforeach;
        $this->db->where('not_id !=', "$id");
        $this->db->order_by("not_criado", "desc");
        return $this->db->get('cc_noticia', 3)->result();
    }
    function ultimas() {
        $this->db->order_by("not_criado", "desc");
        $this->db->order_by("not_revisado", "desc");
        return $this->db->get('cc_noticia', 3)->result();
    }
    function mais_visitadas() {
        $this->db->order_by("not_visita", "desc");
        return $this->db->get('cc_noticia', 3)->result();
    }
/*
    function total_registros() {
        return $this->db->get('cc_noticia')->num_rows();
    }

    

    function atualizar_visitas($id, $dados) {
        $this->db->where('not_id', $id);
        $this->db->update('cc_noticia', $dados);
    }

    

    function not_antprox() {
//        $this->db->where('not_slug', $slug_noticias);
        $this->db->order_by("not_criado", "desc");
        return $this->db->get('cc_noticia', 20)->result();
    }

    

    function ordenar($filtro, $qtd = 0, $inicio = 0) {
        switch ($filtro) {
            case "titulo-asc":
                $order = "not_titulo";
                $asc_desc = "asc";
                break;
            case "titulo-des":
                $order = "not_titulo";
                $asc_desc = "desc";
                break;
            case "data-rec":
                $order = "not_criado";
                $asc_desc = "desc";
                break;
            case "data-ant":
                $order = "not_criado";
                $asc_desc = "asc";
                break;
        }
        if ($qtd > 0)
            $this->db->limit($qtd, $inicio);
        $this->db->order_by("$order", "$asc_desc");
        return $this->db->get('cc_noticias')->result();
    }

    function pesquisar($busca, $filtro) {
        //Paginação foi removida por incompatibilidade, deve ser revista
        switch ($filtro) {
            case "all":
                $this->db->like('not_titulo', $busca);
                $this->db->or_like('not_conteudo', $busca);
                $this->db->or_like('not_palavraschave', $busca);
                $this->db->order_by("not_criado", "desc");
//                if ($qtd > 0)
//                    $this->db->limit($qtd, $inicio);
                $dados = $this->db->get('cc_noticias')->result();
                break;
            case "not_titulo":
                $this->db->like('not_titulo', $busca);
                $this->db->order_by("not_criado", "desc");
//                if ($qtd > 0)
//                    $this->db->limit($qtd, $inicio);
                $dados = $this->db->get('cc_noticias')->result();
                break;
            case "not_conteudo":
                $this->db->like('not_conteudo', $busca);
                $this->db->order_by("not_criado", "desc");
//                if ($qtd > 0)
//                    $this->db->limit($qtd, $inicio);
                $dados = $this->db->get('cc_noticias')->result();
                break;
            case "not_palavraschave":
                $this->db->like('not_palavraschave', $busca);
                $this->db->order_by("not_criado", "desc");
//                if ($qtd > 0)
//                    $this->db->limit($qtd, $inicio);
                $dados = $this->db->get('cc_noticias')->result();
                break;
            default:
                $this->db->order_by("not_criado", "desc");
                $dados = $this->db->get('cc_noticias')->result();
                break;
        }
        return $dados;
    }

    
*/
}
