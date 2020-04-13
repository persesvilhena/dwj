<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Locações abertas
            	<div style="float: right;">
        			<a href="<?= base_url() . "painel/locacoes/pre_inserir"; ?>" class="btn btn-outline btn-success">Inserir</a>
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
        		</tr> 
        	</thead> 

        	<tbody> 
		        <?php foreach ($locacoes as $n): ?>
		        	<tr>
		        		<td>
		        			<?= $n->loc_id; ?>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/clientes/ver_cliente/<?= $n->cli_id; ?>"><?= $n->cli_nome ?></a>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/locacoes/ver/<?= $n->cli_id; ?>" class="btn btn-outline btn-success">Ver Locações</a>
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