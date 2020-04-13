<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clientes
            	<div style="float: right;">
                    <a href="<?= base_url() . "painel/cidades"; ?>" class="btn btn-outline btn-warning">Cidades</a>
        			<a href="<?= base_url() . "painel/clientes/inserir_cliente"; ?>" class="btn btn-outline btn-success">Inserir</a>
            	</div>
            </h1>
        </div>
    </div>
<div>









  	

    	<table class="table table-hover">
        	<thead> 
        		<tr> 
        			<th>#</th> 
        			<th>Clientes</th>
        			<th>Locações</th>
        			<th>Alterar</th>
        			<th>Apagar</th>
        		</tr> 
        	</thead> 

        	<tbody> 
		        <?php foreach ($clientes as $n): ?>
		        	<tr>
		        		<td>
		        			<?= $n->cli_id; ?>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/clientes/ver_cliente/<?= $n->cli_id; ?>"><?= $n->cli_nome ?></a>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/locacoes/ver/<?= $n->cli_id; ?>" class="btn btn-outline btn-success">Ver Locações</a>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/clientes/alterar_cliente/<?= $n->cli_id; ?>" class="btn btn-outline btn-warning">Alterar</a>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/clientes/apagar_cliente/<?= $n->cli_id; ?>" class="btn btn-outline btn-danger">Apagar</a>
		        		</td>
		        	</tr>

		        <?php endforeach; ?>
			</tbody>
		</table>

	







	


</div>
    <!-- /.row -->
    <div class="row">
        
    </div>
</div>