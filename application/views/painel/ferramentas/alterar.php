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

            <h1 class="page-header">Alterar ferramenta <small><?= $ferramenta->tip_nome; ?></small></h1>
            <br>

            <form method="post" action="" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tipo de ferramenta:</label>
                    <select class="form-control" name="fer_tipo">
                        <?php foreach ($tipos as $n) {
                            if($n->tip_id == $ferramenta->fer_tipo){
                                echo "<option value=\"" . $n->tip_id . "\" selected>". $n->tip_nome ."</option>";
                            }else{
                                echo "<option value=\"" . $n->tip_id . "\">". $n->tip_nome ."</option>";
                            } 
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Estado da ferramenta:</label>
                    <select class="form-control" name="fer_estado">
                        <?php foreach ($estados as $n) {
                            if($n->est_id == $ferramenta->fer_estado){
                                echo "<option value=\"" . $n->est_id . "\" selected>". $n->est_nome ."</option>";
                            }else{
                                echo "<option value=\"" . $n->est_id . "\">". $n->est_nome ."</option>";
                            }
                        } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Marca:</label>
                    <input type="text" name="fer_marca" value="<?= $ferramenta->fer_marca; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Modelo:</label>
                    <input type="text" name="fer_modelo" value="<?= $ferramenta->fer_modelo; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Valor da ferramenta:</label>
                    <input type="text" name="fer_preco" value="<?= $ferramenta->fer_preco; ?>" class="form-control">
                </div>
            
                <div class="form-group">
                    <label>Preço de aluguel:</label>
                    <input type="text" name="fer_preco_aluguel" value="<?= $ferramenta->fer_preco_aluguel; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Código:</label>
                    <input type="text" name="fer_codigo" value="<?= $ferramenta->fer_codigo; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea name="fer_descricao" class="form-control" rows="15"><?= $ferramenta->fer_descricao; ?></textarea>
                </div>
            </div>
                <div align="right">
                    <input type="submit" name="alterar_ferramenta" value="Alterar" class="btn btn-outline btn-success">
                </div>
            </form>


          
        </div>
    </div>
    <div class="row">
        
    </div>
<div>

