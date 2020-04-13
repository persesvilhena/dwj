<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <?php if(isset($sucesso)){ ?>
                <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 15px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Sucesso!</strong> <?= $sucesso; ?>
                </div>
            <?php } if(isset($erro)){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-top: 15px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Erro!</strong> <?= $erro; ?>
                </div>
            <?php } ?>

            <h1 class="page-header">
                Ver locações de <?= $cliente->cli_nome; ?>
                <div style="float: right;">
                    <a href="<?= base_url(); ?>painel/locacoes/inserir/<?= $cliente->cli_id; ?>" class="btn btn-outline btn-success">Inserir</a>
                </div>
            </h1>

            <div class="panel panel-primary">
                <div class="panel-heading"><?= $cliente->cli_nome; ?></div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <b>Nome: </b><?= $cliente->cli_nome; ?><br>
                        <b>Endereço: </b><?= $cliente->cli_endereco; ?><br>
                        <b>Numero: </b><?= $cliente->cli_num; ?><br>
                        <b>Cidade: </b><?= $cliente->cid_nome; ?><br>
                        <b>Email: </b><?= $cliente->cli_email; ?><br>
                        <b>Celular: </b><?= $cliente->cli_cel; ?><br>
                        <b>Telefone: </b><?= $cliente->cli_tel; ?><br>
                    </div>
                    <div class="col-md-6">
                        <b>CPF: </b><?= $cliente->cli_cpf; ?><br>
                        <b>RG: </b><?= $cliente->cli_rg; ?><br>
                        <b>CNPJ: </b><?= $cliente->cli_cnpj; ?><br>
                        <b>IE: </b><?= $cliente->cli_ie; ?><br>
                        <b>Descrição: </b><?= $cliente->cli_descricao; ?><br>
                    </div>
                </div>
            </div>

            <div class="panel panel-danger">
                <div class="panel-heading">Locações abertas</div>

                <table class="table table-hover">
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Ferramenta</th>
                            <th>Data de locação</th>
                            <th>Data de devolução</th>
                            <th>Acressimo</th>
                            <th>Desconto</th>
                            <th>Valor</th>
                            <th>Entregar</th>
                            <th>Alterar</th>
                            <th>Apagar</th>
                        </tr> 
                    </thead> 

                    <tbody> 
                        <?php foreach ($locacoes_cliente as $n): ?>
                            <tr>
                                <td>
                                    <?= $n->loc_id; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>painel/ferramentas/ver_ferramenta/<?= $n->fer_id; ?>"><?= $n->tip_nome ?></a>
                                </td>
                                <td>
                                    <?= $this->painel_model->r_data($n->loc_data_locacao); ?>
                                </td>
                                <td>
                                    <?= $this->painel_model->r_data($n->loc_data_devolucao); ?>
                                </td>
                                <td>
                                    <?= $n->loc_acressimo; ?>
                                </td>
                                <td>
                                    <?= $n->loc_desconto; ?>
                                </td>
                                <td>
                                    <?= $n->loc_valor; ?>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="loc_id" value="<?= $n->loc_id; ?>">
                                        <input type="submit" name="entregar" class="btn btn-outline btn-success" value="Entregar">
                                    </form>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>painel/locacoes/alterar/<?= $n->loc_id; ?>" class="btn btn-outline btn-warning">Alterar</a>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="loc_id" value="<?= $n->loc_id; ?>">
                                        <input type="submit" name="apagar" class="btn btn-outline btn-danger" value="Apagar">
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>




















            <div class="panel panel-warning">
                <div class="panel-heading">Locações a pagar</div>

                <table class="table table-hover">
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Ferramenta</th>
                            <th>Data de locação</th>
                            <th>Data de devolução</th>
                            <th>Acressimo</th>
                            <th>Desconto</th>
                            <th>Valor</th>
                            <th>Pagar</th>
                            <th>Não entregue</th>
                        </tr> 
                    </thead> 

                    <tbody> 
                        <?php 
                        $val_total = 0;
                        foreach ($locacoes_pagar as $n): 
                            $val_total = $val_total + $n->loc_valor;
                        ?>
                            <tr>
                                <td>
                                    <?= $n->loc_id; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>painel/ferramentas/ver_ferramenta/<?= $n->fer_id; ?>"><?= $n->tip_nome ?></a>
                                </td>
                                <td>
                                    <?= $this->painel_model->r_data($n->loc_data_locacao); ?>
                                </td>
                                <td>
                                    <?= $this->painel_model->r_data($n->loc_data_devolucao); ?>
                                </td>
                                <td>
                                    <?= $n->loc_acressimo; ?>
                                </td>
                                <td>
                                    <?= $n->loc_desconto; ?>
                                </td>
                                <td>
                                    <?= $n->loc_valor; ?>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="loc_id" value="<?= $n->loc_id; ?>">
                                        <input type="submit" name="pagar" class="btn btn-outline btn-success" value="Pagar">
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="loc_id" value="<?= $n->loc_id; ?>">
                                        <input type="submit" name="nao_entregue" class="btn btn-outline btn-danger" value="Não entregue">
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="panel-footer">
                    Total a pagar: R$<?= $val_total; ?>
                    <div style="float: right;">
                        <form action="" method="post">
                            <input type="submit" name="pagar_tudo" class="btn btn-outline btn-success" value="Pagar tudo">
                        </form>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>



            <div class="panel panel-info">
                <div class="panel-heading">Histórico</div>

                <table class="table table-hover">
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Ferramenta</th>
                            <th>Data de locação</th>
                            <th>Data de devolução</th>
                            <th>Acressimo</th>
                            <th>Desconto</th>
                            <th>Valor</th>
                        </tr> 
                    </thead> 

                    <tbody> 
                        <?php foreach ($locacoes_historico as $n): ?>
                            <tr>
                                <td>
                                    <?= $n->loc_id; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>painel/ferramentas/ver_ferramenta/<?= $n->fer_id; ?>"><?= $n->tip_nome ?></a>
                                </td>
                                <td>
                                    <?= $this->painel_model->r_data($n->loc_data_locacao); ?>
                                </td>
                                <td>
                                    <?= $this->painel_model->r_data($n->loc_data_devolucao); ?>
                                </td>
                                <td>
                                    <?= $n->loc_acressimo; ?>
                                </td>
                                <td>
                                    <?= $n->loc_desconto; ?>
                                </td>
                                <td>
                                    <?= $n->loc_valor; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="panel-footer">
                    <div style="float: right;">
                        <form action="" method="post">
                            <input type="hidden" name="loc_id" value="<?= $n->loc_id; ?>">
                            <input type="submit" name="limpar" class="btn btn-outline btn-default" value="Limpar Histórico">
                        </form>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>
            
        </div>
    </div>
<div>


</div>
    <!-- /.row -->
    <div class="row">
        
    </div>
</div>