<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        

            <h1 class="page-header">Escolha o cliente</h1>
            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Cliente:</label>
                    <select class="form-control" name="cli_id">
                        <?php foreach ($clientes as $c) { ?>
                            <option value="<?= $c->cli_id; ?>"><?= $c->cli_nome; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div align="right">
                    <input type="submit" name="inserir" value="Escolher" class="btn btn-outline btn-success">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        
    </div>
<div>

