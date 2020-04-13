<?php
class Painel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('logar_model');
        $this->load->model('painel_model');
        $this->load->model('cidades_model');
        $this->load->model('clientes_model');
        $this->load->model('ferramentas_model');
        $this->load->model('tipos_model');
        $this->load->model('locacoes_model');
        $this->logar_model->protege();
    }



    public function index() {
        /*$dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $this->load->view('header');
        $this->load->view('barra_superior', $dados);
        $this->load->view('painel/home', $dados);
        $this->load->view('footer');*/
        redirect('painel/locacoes');
    }

    function testedata(){
        echo $this->painel_model->r_data("2017-09-10");
    }


    public function clientes($pag = null, $par = null){
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $dados['clientes'] = $this->clientes_model->clientes();

        $this->load->view('header');
        $this->load->view('barra_superior', $dados);

        if($pag == null || $pag == "home"){
            $this->load->view('painel/clientes/home', $dados);
        }

        if($pag == "ver_cliente"){
            $dados['cliente'] = $this->clientes_model->ver_cliente($par);
            $this->load->view('painel/clientes/ver', $dados);
        }

        if($pag == "inserir_cliente"){
            if($this->input->post('inserir_cliente') != null){
                $cli_nome = $this->input->post('cli_nome');
                $cli_endereco = $this->input->post('cli_endereco');
                $cli_num = $this->input->post('cli_num');
                $cli_cidade = $this->input->post('cli_cidade');
                $cli_email = $this->input->post('cli_email');
                $cli_cel = $this->input->post('cli_cel');
                $cli_tel = $this->input->post('cli_tel');
                $cli_descricao = $this->input->post('cli_descricao');
                $cli_cpf = $this->input->post('cli_cpf');
                $cli_rg = $this->input->post('cli_rg');
                $cli_cnpj = $this->input->post('cli_cnpj');
                $cli_ie = $this->input->post('cli_ie');
                $resultado = $this->clientes_model->inserir_cliente($cli_nome, $cli_endereco, $cli_num, $cli_cidade, $cli_email, $cli_cel, $cli_tel, $cli_descricao, $cli_cpf, $cli_rg, $cli_cnpj, $cli_ie);
                if($resultado){
                    $dados['sucesso'] = "Cliente inserido com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema! Contate o administrador!";
                }
            }
            $dados['cidades'] = $this->painel_model->retorna_todas_cidades();
            $this->load->view('painel/clientes/inserir', $dados);
        }

        if($pag == "apagar_cliente"){
            if($this->input->post('apagar_cliente') != null){
                $dados['avisos'] = 1;
                $resultado = $this->clientes_model->apagar_cliente($par);
                if($resultado){
                    $dados['sucesso'] = "Cliente apagado com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema ao apagar o cliente! Contate o administrador!";
                }
            }else{
                $dados['avisos'] = 0;
                $dados['cliente'] = $this->clientes_model->ver_cliente($par);
            }
            $this->load->view('painel/clientes/apagar', $dados);
        }


        if($pag == "alterar_cliente"){

            if($this->input->post('alterar_cliente') != null){
                $cli_nome = $this->input->post('cli_nome');
                $cli_endereco = $this->input->post('cli_endereco');
                $cli_num = $this->input->post('cli_num');
                $cli_cidade = $this->input->post('cli_cidade');
                $cli_email = $this->input->post('cli_email');
                $cli_cel = $this->input->post('cli_cel');
                $cli_tel = $this->input->post('cli_tel');
                $cli_descricao = $this->input->post('cli_descricao');
                $cli_cpf = $this->input->post('cli_cpf');
                $cli_rg = $this->input->post('cli_rg');
                $cli_cnpj = $this->input->post('cli_cnpj');
                $cli_ie = $this->input->post('cli_ie');
                $resultado = $this->clientes_model->alterar_cliente($par, $cli_nome, $cli_endereco, $cli_num, $cli_cidade, $cli_email, $cli_cel, $cli_tel, $cli_descricao, $cli_cpf, $cli_rg, $cli_cnpj, $cli_ie);
                if($resultado){
                    $dados['sucesso'] = "Cliente alterado com sucesso!";
                }else{
                    $dados['erro'] = "Nada foi alterado!";
                }
            }
            
            $dados['cidades'] = $this->painel_model->retorna_todas_cidades();
            $dados['cliente'] = $this->clientes_model->ver_cliente($par);
            $this->load->view('painel/clientes/alterar', $dados);
        }



        $this->load->view('footer');
    }










    public function cidades($pag = null, $par = null){
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $dados['cidades'] = $this->cidades_model->cidades();

        $this->load->view('header');
        $this->load->view('barra_superior', $dados);

        if($pag == null || $pag == "home"){
            $this->load->view('painel/cidades/home', $dados);
        }


        if($pag == "inserir_cidade"){
            if($this->input->post('inserir_cidade') != null){
                $cid_nome = $this->input->post('cid_nome');

                $resultado = $this->cidades_model->inserir_cidade($cid_nome);
                if($resultado){
                    $dados['sucesso'] = "Cidade inserida com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema! Contate o administrador!";
                }
            }
            $this->load->view('painel/cidades/inserir', $dados);
        }


        if($pag == "apagar_cidade"){
            if($this->input->post('apagar_cidade') != null){
                $dados['avisos'] = 1;
                $resultado = $this->cidades_model->apagar_cidade($par);
                if($resultado){
                    $dados['sucesso'] = "Cidade apagada com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema ao apagar a cidade! Contate o administrador!";
                }
            }else{
                $dados['avisos'] = 0;
                $dados['cidade'] = $this->cidades_model->ver_cidade($par);
            }
            $this->load->view('painel/cidades/apagar', $dados);
        }


        if($pag == "alterar_cidade"){

            if($this->input->post('alterar_cidade') != null){
                $cid_nome = $this->input->post('cid_nome');

                $resultado = $this->cidades_model->alterar_cidade($par, $cid_nome);
                if($resultado){
                    $dados['sucesso'] = "Cidade alterada com sucesso!";
                }else{
                    $dados['erro'] = "Nada foi alterado!";
                }
            }

            $dados['cidade'] = $this->cidades_model->ver_cidade($par);
            $this->load->view('painel/cidades/alterar', $dados);
        }



        $this->load->view('footer');
    }









    public function ferramentas($pag = null, $par = null){
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $dados['ferramentas'] = $this->ferramentas_model->ferramentas();

        $this->load->view('header');
        $this->load->view('barra_superior', $dados);

        if($pag == null || $pag == "home"){
            $this->load->view('painel/ferramentas/home', $dados);
        }

        if($pag == "ver_ferramenta"){
            $dados['ferramenta'] = $this->ferramentas_model->ver_ferramenta($par);
            $this->load->view('painel/ferramentas/ver', $dados);
        }

        if($pag == "inserir_ferramenta"){
            if($this->input->post('inserir_ferramenta') != null){
                $fer_codigo = $this->input->post('fer_codigo');
                $fer_marca = $this->input->post('fer_marca');
                $fer_modelo = $this->input->post('fer_modelo');
                $fer_preco = $this->input->post('fer_preco');
                $fer_preco_aluguel = $this->input->post('fer_preco_aluguel');
                $fer_tipo = $this->input->post('fer_tipo');
                $fer_estado = $this->input->post('fer_estado');
                $fer_descricao = $this->input->post('fer_descricao');
                $resultado = $this->ferramentas_model->inserir_ferramenta($fer_codigo, $fer_marca, $fer_modelo, $fer_preco, $fer_preco_aluguel, $fer_tipo, $fer_estado, $fer_descricao);
                if($resultado){
                    $dados['sucesso'] = "Ferramenta inserida com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema! Contate o administrador!";
                }
            }
            $dados['tipos'] = $this->ferramentas_model->retorna_todos_tipos();
            $dados['estados'] = $this->ferramentas_model->retorna_todos_estados();
            $this->load->view('painel/ferramentas/inserir', $dados);
        }

        if($pag == "apagar_ferramenta"){
            if($this->input->post('apagar_ferramenta') != null){
                $dados['avisos'] = 1;
                $resultado = $this->ferramentas_model->apagar_ferramenta($par);
                if($resultado){
                    $dados['sucesso'] = "Ferramenta apagada com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema ao apagar a ferramenta! Contate o administrador!";
                }
            }else{
                $dados['avisos'] = 0;
                $dados['ferramenta'] = $this->ferramentas_model->ver_ferramenta($par);
            }
            $this->load->view('painel/ferramentas/apagar', $dados);
        }


        if($pag == "alterar_ferramenta"){

            if($this->input->post('alterar_ferramenta') != null){
                $fer_codigo = $this->input->post('fer_codigo');
                $fer_marca = $this->input->post('fer_marca');
                $fer_modelo = $this->input->post('fer_modelo');
                $fer_preco = $this->input->post('fer_preco');
                $fer_preco_aluguel = $this->input->post('fer_preco_aluguel');
                $fer_tipo = $this->input->post('fer_tipo');
                $fer_estado = $this->input->post('fer_estado');
                $fer_descricao = $this->input->post('fer_descricao');
                $resultado = $this->ferramentas_model->alterar_ferramenta($par, $fer_codigo, $fer_marca, $fer_modelo, $fer_preco, $fer_preco_aluguel, $fer_tipo, $fer_estado, $fer_descricao);
                if($resultado){
                    $dados['sucesso'] = "Ferramenta alterada com sucesso!";
                }else{
                    $dados['erro'] = "Nada foi alterado!";
                }
            }
            
            $dados['tipos'] = $this->ferramentas_model->retorna_todos_tipos();
            $dados['estados'] = $this->ferramentas_model->retorna_todos_estados();
            $dados['ferramenta'] = $this->ferramentas_model->ver_ferramenta($par);
            $this->load->view('painel/ferramentas/alterar', $dados);
        }



        $this->load->view('footer');
    }









    public function tipos($pag = null, $par = null){
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $dados['tipos'] = $this->tipos_model->tipos();

        $this->load->view('header');
        $this->load->view('barra_superior', $dados);

        if($pag == null || $pag == "home"){
            $this->load->view('painel/tipos/home', $dados);
        }


        if($pag == "inserir_tipo"){
            if($this->input->post('inserir_tipo') != null){
                $tip_nome = $this->input->post('tip_nome');

                $resultado = $this->tipos_model->inserir_tipo($tip_nome);
                if($resultado){
                    $dados['sucesso'] = "Tipo inserido com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema! Contate o administrador!";
                }
            }
            $this->load->view('painel/tipos/inserir', $dados);
        }


        if($pag == "apagar_tipo"){
            if($this->input->post('apagar_tipo') != null){
                $dados['avisos'] = 1;
                $resultado = $this->tipos_model->apagar_tipo($par);
                if($resultado){
                    $dados['sucesso'] = "tipo apagada com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema ao apagar a tipo! Contate o administrador!";
                }
            }else{
                $dados['avisos'] = 0;
                $dados['tipo'] = $this->tipos_model->ver_tipo($par);
            }
            $this->load->view('painel/tipos/apagar', $dados);
        }


        if($pag == "alterar_tipo"){

            if($this->input->post('alterar_tipo') != null){
                $tip_nome = $this->input->post('tip_nome');

                $resultado = $this->tipos_model->alterar_tipo($par, $tip_nome);
                if($resultado){
                    $dados['sucesso'] = "Tipo alterado com sucesso!";
                }else{
                    $dados['erro'] = "Nada foi alterado!";
                }
            }

            $dados['tipo'] = $this->tipos_model->ver_tipo($par);
            $this->load->view('painel/tipos/alterar', $dados);
        }



        $this->load->view('footer');
    }













    public function locacoes($pag = null, $par = null){
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $dados['locacoes'] = $this->locacoes_model->locacoes();

        $this->load->view('header');
        $this->load->view('barra_superior', $dados);

        if($this->input->post('entregar') != null){
            $loc_id = $this->input->post('loc_id');
            $resultado = $this->locacoes_model->entregar($loc_id);
            if($resultado){
                $dados['sucesso'] = "Ferramenta entregue com sucesso!";
            }else{
                $dados['erro'] = "Houve um problema! Contate o administrador!";
            }
        }
        if($this->input->post('nao_entregue') != null){
            $loc_id = $this->input->post('loc_id');
            $resultado = $this->locacoes_model->nao_entregue($loc_id);
            if($resultado){
                $dados['sucesso'] = "Operação realizada com sucesso!";
            }else{
                $dados['erro'] = "Houve um problema! Contate o administrador!";
            }
        }
        if($this->input->post('pagar') != null){
            $loc_id = $this->input->post('loc_id');
            $resultado = $this->locacoes_model->pagar($loc_id);
            if($resultado){
                $dados['sucesso'] = "Ferramenta paga com sucesso!";
            }else{
                $dados['erro'] = "Houve um problema! Contate o administrador!";
            }
        }

        if($this->input->post('apagar') != null){
            $loc_id = $this->input->post('loc_id');
            $resultado = $this->locacoes_model->apagar($loc_id);
            if($resultado){
                $dados['sucesso'] = "Locação apagada com sucesso!";
            }else{
                $dados['erro'] = "Houve um problema! Contate o administrador!";
            }
        }

        if($pag == null || $pag == "home"){
            $this->load->view('painel/locacoes/home', $dados);
        }


        if($pag == "ver"){
            $dados['cliente'] = $this->locacoes_model->ver_cliente($par);
            $dados['locacoes_cliente'] = $this->locacoes_model->ver_locacoes($par);
            $dados['locacoes_pagar'] = $this->locacoes_model->ver_locacoes_a_pagar($par);
            $dados['locacoes_historico'] = $this->locacoes_model->ver_locacoes_historico($par);
            $this->load->view('painel/locacoes/ver', $dados);
        }


        if($pag == "pre_inserir"){
            if($this->input->post('inserir') != null){
                $cli_id = $this->input->post('cli_id');
                redirect('painel/locacoes/inserir/' . $cli_id);
            }
            $dados['clientes'] = $this->clientes_model->clientes();
            $this->load->view('painel/locacoes/pre_inserir', $dados);
        }


        if($pag == "inserir"){
            if($this->input->post('inserir') != null){
                $loc_ferramenta = $this->input->post('loc_ferramenta');
                $loc_data_locacao = $this->painel_model->c_data($this->input->post('loc_data_locacao'));
                $loc_data_devolucao = $this->painel_model->c_data($this->input->post('loc_data_devolucao'));
                $loc_valor = $this->input->post('loc_valor');
                $loc_acressimo = $this->input->post('loc_acressimo');
                $loc_desconto = $this->input->post('loc_desconto');

                $resultado = $this->locacoes_model->inserir($par, $loc_ferramenta, $loc_data_locacao, $loc_data_devolucao, $loc_valor, $loc_acressimo, $loc_desconto);
                if($resultado){
                    $dados['sucesso'] = "Locação inserida com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema! Contate o administrador!";
                }
            }
            $dados['ferramentas'] = $this->ferramentas_model->ferramentas_disponiveis();
            $dados['cliente'] = $this->clientes_model->ver_cliente($par);
            $this->load->view('painel/locacoes/inserir', $dados);
        }


        if($pag == "apagar_cliente"){
            if($this->input->post('apagar_cliente') != null){
                $dados['avisos'] = 1;
                $resultado = $this->locacoes_model->apagar_cliente($par);
                if($resultado){
                    $dados['sucesso'] = "Cliente apagado com sucesso!";
                }else{
                    $dados['erro'] = "Houve um problema ao apagar o cliente! Contate o administrador!";
                }
            }else{
                $dados['avisos'] = 0;
                $dados['cliente'] = $this->clientes_model->ver_cliente($par);
            }
            $this->load->view('painel/locacoes/apagar', $dados);
        }


        if($pag == "alterar_cliente"){

            if($this->input->post('alterar_cliente') != null){
                $cli_nome = $this->input->post('cli_nome');
                $cli_endereco = $this->input->post('cli_endereco');
                $cli_num = $this->input->post('cli_num');
                $cli_cidade = $this->input->post('cli_cidade');
                $cli_email = $this->input->post('cli_email');
                $cli_cel = $this->input->post('cli_cel');
                $cli_tel = $this->input->post('cli_tel');
                $cli_descricao = $this->input->post('cli_descricao');
                $cli_cpf = $this->input->post('cli_cpf');
                $cli_rg = $this->input->post('cli_rg');
                $cli_cnpj = $this->input->post('cli_cnpj');
                $cli_ie = $this->input->post('cli_ie');
                $resultado = $this->clientes_model->alterar_cliente($par, $cli_nome, $cli_endereco, $cli_num, $cli_cidade, $cli_email, $cli_cel, $cli_tel, $cli_descricao, $cli_cpf, $cli_rg, $cli_cnpj, $cli_ie);
                if($resultado){
                    $dados['sucesso'] = "Cliente alterado com sucesso!";
                }else{
                    $dados['erro'] = "Nada foi alterado!";
                }
            }
            
            $dados['cidades'] = $this->painel_model->retorna_todas_cidades();
            $dados['cliente'] = $this->clientes_model->ver_cliente($par);
            $this->load->view('painel/locacoes/alterar', $dados);
        }



        $this->load->view('footer');
    }






















    public function admin($pag = null) {
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $dados['nucleos'] = $this->painel_model->retorna_todos_nucleos($this->session->userdata['usu_id']);
        $dados['todos_sistemas'] = $this->permissao_model->retorna_todos_sistemas();
        $dados['todos_nucleos'] = $this->permissao_model->retorna_todos_nucleos();
        $dados['todos_usuarios'] = $this->permissao_model->retorna_todos_usuarios();
        $dados['todas_permissoes'] = $this->permissao_model->retorna_todas_permissoes();
        if($dados['user']->usu_adm == 1){
            $this->load->view('usuario/header');
            $this->load->view('usuario/barra_superior', $dados);
           // $this->load->view('usuario/painel', $dados);
            if($pag == null || $pag == "home"){
                $this->load->view('usuario/adm/home', $dados);
            }
            if($pag == "permissao"){
                $this->load->view('usuario/adm/permissao', $dados);
            }
            if($pag == "aplica_permissao"){
                $sistema = $this->input->post("sistema");
                $nucleo = $this->input->post("nucleo");
                $user = $this->input->post("user");
                foreach ($dados['todas_permissoes'] as $n){
                    if($this->input->post($n->per_nome)){
                        //echo "$sistema, $nucleo, $user, $n->per_id, '1'<br>";
                        $this->permissao_model->aplica_permissao($sistema, $nucleo, $user, $n->per_id, '1');
                    }else{
                        //echo "$sistema, $nucleo, $user, $n->per_id, '0'<br>";
                        $this->permissao_model->aplica_permissao($sistema, $nucleo, $user, $n->per_id, '0');
                    }
                }
                redirect("usuario/painel");
            }



            if($pag == "teste"){
                $this->load->view('usuario/adm/teste');
            }

            $this->load->view('usuario/footer');
        }

        
    }








    public function nucleo($id = null, $pag = null, $par = null) {
        $this->load->model('usuario/nucleo_model');
        $dados['user'] = $this->painel_model->retorna_dados_usuario($this->session->userdata['usu_id']);
        $dados['nucleos'] = $this->painel_model->retorna_todos_nucleos($this->session->userdata['usu_id']);
        $dados['nucleo'] = $this->nucleo_model->retorna_dados_nucleo($id);
        $dados['noticias_nucleo_na'] = $this->nucleo_model->retorna_todas_noticias_na($id);
        $dados['noticias_nucleo_a'] = $this->nucleo_model->retorna_todas_noticias_a($id);
        $dados['noticias_nucleo_suas_na'] = $this->nucleo_model->retorna_todas_noticias_suas_na($id);
        $dados['noticias_nucleo_suas_a'] = $this->nucleo_model->retorna_todas_noticias_suas_a($id);


        $this->load->view('usuario/header');
        $this->load->view('usuario/barra_superior', $dados);
       // $this->load->view('usuario/painel', $dados);
        if($pag == null || $pag == "home"){
            $this->load->view('usuario/nucleo/home', $dados);
        }
        if($pag == "noticias"){
            $this->load->view('usuario/nucleo/noticias/home', $dados);
        }

        if($pag == "ver_noticia"){
            if($this->permissao_model->verifica_permissao("lis_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1)){
                $dados['noticia'] = $this->noticias_model->ver_noticia($par);
                $dados['autores'] = $this->noticias_model->ver_autor_noticia($par);
                $this->load->view('usuario/nucleo/noticias/ver', $dados);
                //var_dump($this->noticias_model->descobrir_permissao($id, $par, 221));
            }
        }

        if($pag == "apagar_imagem"){
            var_dump($this->noticias_model->apaga_foto("85a04e17970ccbd18e3536bea9555b92.png"));
        }

        if($pag == "inserir_noticia"){
            if($this->permissao_model->verifica_permissao("ins", $id, 1)){
                /////////////faz a alteracao
                if($this->input->post('inserir_noticia') != null){
                    $not_titulo = $this->input->post('not_titulo');
                    $not_subtitulo = $this->input->post('not_subtitulo');
                    $not_conteudo = $this->input->post('not_conteudo');
                    $not_conteudo_sem_formatacao = $this->input->post('not_conteudo_sem_formatacao');
                    $not_foto = $nome_imagem;
                    $not_criado = $this->input->post('not_criado');
                    $not_revisado = $this->input->post('not_revisado');
                    $not_slug = $this->input->post('not_slug');
                    $not_palavra_chave = $this->input->post('not_palavra_chave');
                    $resultado = $this->noticias_model->inserir_noticia($this->session->usu_id, $id, $not_titulo, $not_subtitulo, $not_conteudo, $not_conteudo_sem_formatacao, $not_foto, $not_criado, $not_revisado, $not_slug, $not_palavra_chave);
                    if($resultado){
                        $dados['sucesso'] = "Notícia inserida com sucesso!";
                    }else{
                        $dados['erro'] = "Houve um problema! Contate o administrador!";
                    }

                }

                ////////////exibe o formulario para alteracao
               // $dados['noticia'] = $this->noticias_model->ver_noticia($par);
                $this->load->view('usuario/nucleo/noticias/inserir', $dados);
            }

        }

        if($pag == "alterar_noticia"){
            if($this->permissao_model->verifica_permissao2("alt_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par) || $this->permissao_model->verifica_permissao1("alt_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par)){
                /////////////faz a alteracao
                if($this->input->post('alterar_noticia') != null){
                    $this->noticias_model->apaga_foto_noticia($par);



                        $foto = $_FILES['not_foto'];
                        if (!empty($foto["name"])) {
                            $largura = 5000;
                            $larguramin = 1;
                            $altura = 2500;
                            $tamanho = 5000000;
                            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                            if($ext[1] != "gif" && $ext[1] != "bmp" && $ext[1] != "png" && $ext[1] != "jpg" && $ext[1] != "jpeg"){
                               $error[1] = "Formato incompativel!";
                            } else {
                                $dimensoes = getimagesize($foto["tmp_name"]);
                                if($dimensoes[0] > $largura) {
                                    $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
                                }
                                if($dimensoes[0] < $larguramin) {
                                    $error[5] = "A largura da imagem não deve ser menor de ".$larguramin." pixels";
                                }
                                if($dimensoes[1] > $altura) {
                                    $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
                                }
                                if($foto["size"] > $tamanho) {
                                    $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
                                }
                            }
                            if (!isset($error)){
                                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                                $caminho_imagem = "assets/upload/sistema/noticias/" . $nome_imagem;
                                move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                            }
                            if(isset($error)){
                                foreach ($error as $erro) {
                                    echo $erro;
                                }
                            }
                        }



                    $not_titulo = $this->input->post('not_titulo');
                    $not_subtitulo = $this->input->post('not_subtitulo');
                    $not_conteudo = $this->input->post('not_conteudo');
                    $not_conteudo_sem_formatacao = $this->input->post('not_conteudo_sem_formatacao');
                    $not_foto = $nome_imagem;
                    $not_criado = $this->input->post('not_criado');
                    $not_revisado = $this->input->post('not_revisado');
                    $not_slug = $this->input->post('not_slug');
                    $not_palavra_chave = $this->input->post('not_palavra_chave');
                    $resultado = $this->noticias_model->alterar_noticia($par, $not_titulo, $not_subtitulo, $not_conteudo, $not_conteudo_sem_formatacao, $not_foto, $not_criado, $not_revisado, $not_slug, $not_palavra_chave);
                    if($resultado){
                        $dados['sucesso'] = "Notícia alterada com sucesso!";
                    }else{
                        $dados['erro'] = "Nada foi alterado!";
                    }

                }

                ////////////exibe o formulario para alteracao
                $dados['noticia'] = $this->noticias_model->ver_noticia($par);
                $dados['autores'] = $this->noticias_model->ver_autor_noticia($par);
                $this->load->view('usuario/nucleo/noticias/alterar', $dados);
            }

        }





        if($pag == "autores_noticia"){
            if($this->permissao_model->verifica_permissao2("alt_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par) || $this->permissao_model->verifica_permissao1("alt_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par)){
                /////////////faz a alteracao
                if($this->input->post('inserir_autor') != null){
                    $autor = $this->input->post('autor');
                    $resultado = $this->noticias_model->inserir_autor($par, $autor);
                    if($resultado == 1){
                        $dados['sucesso'] = "Autor inserido com sucesso!";
                    }else{
                        if($resultado == 0){
                            $dados['erro'] = "Houve um problema! Contate o administrador!";
                        }else{
                            $dados['erro'] = "Autor já existente na notícia!";
                        }   
                    }
                }
                if($this->input->post('remover_autor') != null){
                    $autor = $this->input->post('autor');
                    $resultado = $this->noticias_model->remover_autor($par, $autor);
                    if($resultado == 1){
                        $dados['sucesso'] = "Autor removido com sucesso!";
                    }else{
                        if($resultado == 0){
                            $dados['erro'] = "Houve um problema! Contate o administrador!";
                        }else{
                            $dados['erro'] = "Autor não pode ser removido pois é autor original!";
                        }   
                    }
                }

                ////////////exibe o formulario para alteracao
                $dados['todos_usuarios'] = $this->painel_model->retorna_todos_usuarios();
                $dados['noticia'] = $this->noticias_model->ver_noticia($par);
                $dados['autores'] = $this->noticias_model->ver_autor_noticia($par);
                $this->load->view('usuario/nucleo/noticias/autores_noticia', $dados);
            }

        }




        if($pag == "apagar_noticia"){
            if($this->permissao_model->verifica_permissao2("exc_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par) || $this->permissao_model->verifica_permissao1("exc_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par)){
                if($this->input->post('apagar_noticia') != null){
                    $dados['avisos'] = 1;
                    $resultado = $this->noticias_model->apagar_noticia($par);
                    if($resultado){
                        $dados['sucesso'] = "Notícia apagada com sucesso!";
                    }else{
                        $dados['erro'] = "Houve um problema ao apagar a notícia! Contate o administrador!";
                    }
                }else{
                    $dados['avisos'] = 0;
                    $dados['noticia'] = $this->noticias_model->ver_noticia($par);
                }
                
                $this->load->view('usuario/nucleo/noticias/apagar', $dados);
            }
        }







        if($pag == "duplicar_noticia"){
            if($this->permissao_model->verifica_permissao2("dup_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par) || $this->permissao_model->verifica_permissao1("dup_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par)){
                if($this->input->post('duplicar_noticia') != null){
                    $nucleo = $this->input->post('nucleo');
                    $dados['avisos'] = 1;
                    $resultado = $this->noticias_model->duplicar_noticia($par, $nucleo);
                    if($resultado == 1){
                        $dados['sucesso'] = "Notícia duplicada com sucesso!";
                    }else{
                        if($resultado == 0){
                            $dados['erro'] = "Houve um problema ao duplicar a notícia! Contate o administrador!";
                        }else{
                            $dados['erro'] = "Notícia já existente para nucleo escolhido!";
                        }
                    }
                }else{
                    $dados['avisos'] = 0;
                    $dados['todos_nucleos'] = $this->permissao_model->retorna_todos_nucleos();
                    $dados['noticia'] = $this->noticias_model->ver_noticia($par);
                }
                
                $this->load->view('usuario/nucleo/noticias/duplicar', $dados);
            }
        }






        if($pag == "remover_duplicacao"){
            if($this->permissao_model->verifica_permissao2("dup_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par) || $this->permissao_model->verifica_permissao1("dup_" . $this->noticias_model->descobrir_permissao($id, $par, $this->session->usu_id), $id, 1, $par)){
                if($this->input->post('remover_duplicacao') != null){
                    $nucleo = $this->input->post('nucleo');
                    $dados['avisos'] = 1;
                    $resultado = $this->noticias_model->remover_duplicacao($par, $nucleo);
                    if($resultado == 1){
                        $dados['sucesso'] = "Duplicação removida com sucesso!";
                    }else{
                        if($resultado == 0){
                            $dados['erro'] = "Houve um problema ao remover a duplicação! Contate o administrador!";
                        }else{
                            $dados['erro'] = "Este nucleo não pode ser removido pois é nucleo original!";
                        }
                    }
                }else{
                    $dados['avisos'] = 0;
                    $dados['todos_nucleos'] = $this->noticias_model->retorna_todos_nucleos($par);
                    $dados['noticia'] = $this->noticias_model->ver_noticia($par);
                }
                
                $this->load->view('usuario/nucleo/noticias/remover_duplicacao', $dados);
            }
        }



        $this->load->view('usuario/footer');
    }

}
