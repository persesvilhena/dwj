<?php

class Ferramentas_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function ferramentas(){
        $this->db->select('*');
        $this->db->from('ferramenta');
        $this->db->join('tipo_ferramenta', 'tip_id = fer_tipo', 'inner');
        $this->db->join('estado_ferramenta', 'est_id = fer_estado', 'inner');
        $this->db->order_by('tip_nome', 'asc');
        return $this->db->get()->result();
    }


    function ferramentas_disponiveis(){
        $this->db->select('*');
        $this->db->from('ferramenta');
        $this->db->join('tipo_ferramenta', 'tip_id = fer_tipo', 'inner');
        $this->db->join('estado_ferramenta', 'est_id = fer_estado', 'inner');
        $this->db->where('fer_estado', 4);
        $this->db->order_by('tip_nome', 'asc');
        return $this->db->get()->result();
    }

    function ver_ferramenta($id){
        $this->db->select('*');
        $this->db->from('ferramenta');
        $this->db->join('tipo_ferramenta', 'tip_id = fer_tipo', 'inner');
        $this->db->join('estado_ferramenta', 'est_id = fer_estado', 'inner');
        $this->db->where('fer_id', $id);
        return $this->db->get()->result()[0];
    }


    function retorna_todos_tipos(){
        $this->db->select('*');
        $this->db->from('tipo_ferramenta');
        $this->db->order_by('tip_nome', 'asc');
        return $this->db->get()->result();
    }


    function retorna_todos_estados(){
        $this->db->select('*');
        $this->db->from('estado_ferramenta');
        $this->db->order_by('est_nome', 'asc');
        return $this->db->get()->result();
    }


    function inserir_ferramenta($fer_codigo, $fer_marca, $fer_modelo, $fer_preco, $fer_preco_aluguel, $fer_tipo, $fer_estado, $fer_descricao){
        $data = array(
        'fer_codigo' => $fer_codigo,
        'fer_marca' => $fer_marca,
        'fer_modelo' => $fer_modelo,
        'fer_preco' => $fer_preco,
        'fer_preco_aluguel' => $fer_preco_aluguel,
        'fer_tipo' => $fer_tipo,
        'fer_estado' => $fer_estado,
        'fer_descricao' => $fer_descricao
        );
        $this->db->insert('ferramenta', $data);
        return $this->db->affected_rows();
    }

    function alterar_ferramenta($fer_id, $fer_codigo, $fer_marca, $fer_modelo, $fer_preco, $fer_preco_aluguel, $fer_tipo, $fer_estado, $fer_descricao){
        $data = array(
        'fer_codigo' => $fer_codigo,
        'fer_marca' => $fer_marca,
        'fer_modelo' => $fer_modelo,
        'fer_preco' => $fer_preco,
        'fer_preco_aluguel' => $fer_preco_aluguel,
        'fer_tipo' => $fer_tipo,
        'fer_estado' => $fer_estado,
        'fer_descricao' => $fer_descricao
        );

        $this->db->where('fer_id', $fer_id);
        $this->db->update('ferramenta', $data);
        return $this->db->affected_rows();
    }

    function apagar_ferramenta($id){
        $this->db->where('fer_id', $id);
        $this->db->delete('ferramenta');
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
