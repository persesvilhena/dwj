<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tipos de ferramentas
            	<div style="float: right;">
        				<a href="<?= base_url() . "painel/tipos/inserir_tipo"; ?>" class="btn btn-outline btn-success">Inserir</a>
            	</div>
            </h1>
        </div>
    </div>
<div>









  	

    	<table class="table table-hover">
        	<thead> 
        		<tr> 
        			<th>#</th> 
        			<th>Tipos</th>
        			<th>Alterar</th>
        			<th>Apagar</th>
        		</tr> 
        	</thead> 

        	<tbody> 
		        <?php foreach ($tipos as $n): ?>
		        	<tr>
		        		<td>
		        			<?= $n->tip_id; ?>
		        		</td>
		        		<td>
		        			<?= $n->tip_nome ?>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/tipos/alterar_tipo/<?= $n->tip_id; ?>" class="btn btn-outline btn-warning">Alterar</a>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/tipos/apagar_tipo/<?= $n->tip_id; ?>" class="btn btn-outline btn-danger">Apagar</a>
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