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

            <h1 class="page-header">Inserir Locação<br>
            <small><b>Cliente: </b><?= $cliente->cli_nome; ?></small></h1>
            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Ferramenta:</label>
                    <select class="form-control" name="loc_ferramenta">
                        <?php foreach ($ferramentas as $n) { ?>
                            <option value="<?= $n->fer_id; ?>"><?= $n->tip_nome; ?> : <?= $n->fer_codigo; ?> - <?= $n->fer_marca; ?> - <?= $n->fer_modelo; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Data da locação:</label>
                    <input type="text" name="loc_data_locacao" value="<?php echo date('d/m/Y'); ?>" class="form-control" placeholder="DD/MM/AAAA">
                </div>
                <div class="form-group">
                    <label>Data da devolução:</label>
                    <input type="text" name="loc_data_devolucao" value="" class="form-control" placeholder="DD/MM/AAAA">
                </div>
                <div class="form-group">
                    <label>Valor:</label>
                    <input type="number" name="loc_valor" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Acressimo:</label>
                    <input type="number" name="loc_acressimo" value="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Desconto:</label>
                    <input type="number" name="loc_desconto" value="" class="form-control">
                </div>

                <div align="right">
                    <input type="submit" name="inserir" value="Inserir" class="btn btn-outline btn-success">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        
    </div>
<div>

