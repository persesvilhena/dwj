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

            <h1 class="page-header">Alterar Cliente <small><?= $cliente->cli_nome; ?></small></h1>
            <br>

            <form method="post" action="" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="cli_nome" value="<?= $cliente->cli_nome; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Endereço:</label>
                    <input type="text" name="cli_endereco" value="<?= $cliente->cli_endereco; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Numero:</label>
                    <input type="text" name="cli_num" value="<?= $cliente->cli_num; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Cidade:</label>
                    <select class="form-control" name="cli_cidade">
                        <?php foreach ($cidades as $c) {
                            if($c->cid_id == $cliente->cli_cidade){
                                echo "<option value=\"" . $c->cid_id . "\" selected>". $c->cid_nome ."</option>";
                            }else{
                                echo "<option value=\"" . $c->cid_id . "\">". $c->cid_nome ."</option>";
                            }
                            
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="cli_email" value="<?= $cliente->cli_email; ?>" class="form-control">
                </div>
            
                <div class="form-group">
                    <label>Celular:</label>
                    <input type="text" name="cli_cel" value="<?= $cliente->cli_cel; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="text" name="cli_tel" value="<?= $cliente->cli_tel; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>CPF:</label>
                    <input type="text" name="cli_cpf" value="<?= $cliente->cli_cpf; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea name="cli_descricao" class="form-control" rows="15"><?= $cliente->cli_descricao; ?></textarea>
                </div>
                <div class="form-group">
                    <label>RG:</label>
                    <input type="text" name="cli_rg" value="<?= $cliente->cli_rg; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>CNPJ:</label>
                    <input type="text" name="cli_cnpj" value="<?= $cliente->cli_cnpj; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>IE:</label>
                    <input type="text" name="cli_ie" value="<?= $cliente->cli_ie; ?>" class="form-control">
                </div>
            </div>
                <div align="right">
                    <input type="submit" name="alterar_cliente" value="Alterar" class="btn btn-outline btn-success">
                </div>
            </form>


          
        </div>
    </div>
    <div class="row">
        
    </div>
<div>

