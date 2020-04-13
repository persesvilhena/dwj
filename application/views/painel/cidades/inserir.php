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

            <h1 class="page-header">Inserir Cidade</h1>
            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="cid_nome" value="" class="form-control">
                </div>
                <div align="right">
                    <input type="submit" name="inserir_cidade" value="Inserir" class="btn btn-outline btn-success">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        
    </div>
<div>

