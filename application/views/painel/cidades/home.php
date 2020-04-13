<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cidade
            	<div style="float: right;">
        				<a href="<?= base_url() . "painel/cidades/inserir_cidade"; ?>" class="btn btn-outline btn-success">Inserir</a>
            	</div>
            </h1>
        </div>
    </div>
<div>









  	

    	<table class="table table-hover">
        	<thead> 
        		<tr> 
        			<th>#</th> 
        			<th>Cidades</th>
        			<th>Alterar</th>
        			<th>Apagar</th>
        		</tr> 
        	</thead> 

        	<tbody> 
		        <?php foreach ($cidades as $n): ?>
		        	<tr>
		        		<td>
		        			<?= $n->cid_id; ?>
		        		</td>
		        		<td>
		        			<?= $n->cid_nome ?>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/cidades/alterar_cidade/<?= $n->cid_id; ?>" class="btn btn-outline btn-warning">Alterar</a>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/cidades/apagar_cidade/<?= $n->cid_id; ?>" class="btn btn-outline btn-danger">Apagar</a>
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