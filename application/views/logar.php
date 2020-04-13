<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <!--<div class="panel-heading">
                    <h3 class="panel-title">Usuário - Login</h3>
                </div>-->
                <div class="panel-body">
                    <form action="<?= base_url(); ?>home/login" id="formlogin" method="post" accept-charset="utf-8">
                    <fieldset>
                        <div class="form-group">
                            <label>Usuário: </label>
                            <input type="text" name="usuario" autofocus class="form-control"  />
                        </div>
                        <div class="form-group">
                            <label>Senha: </label>
                            <input type="password" name="senha" autofocus class="form-control"  />
                        </div>
                        <input type="submit" name="btnSubmit" value="Entrar"  class='btn btn-lg btn-success btn-block' />
                    </fieldset>
                    </form>  
                </div>
            </div>
        </div>        
    </div>
    <?php
    if (isset($aviso)) {
        ?>
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $aviso; ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>

