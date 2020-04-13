<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ferramentas
            	<div style="float: right;">
                    <a href="<?= base_url() . "painel/tipos"; ?>" class="btn btn-outline btn-warning">Tipos de ferramenta</a>
        			<a href="<?= base_url() . "painel/ferramentas/inserir_ferramenta"; ?>" class="btn btn-outline btn-success">Inserir</a>
            	</div>
            </h1>
        </div>
    </div>
<div>









  	

    	<table class="table table-hover">
        	<thead> 
        		<tr> 
        			<th>Codigo</th> 
        			<th>Ferramenta</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Estado</th>
        			<th>Alterar</th>
        			<th>Apagar</th>
        		</tr> 
        	</thead> 

        	<tbody> 
		        <?php foreach ($ferramentas as $n): ?>
		        	<tr>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/ferramentas/ver_ferramenta/<?= $n->fer_id; ?>"><?= $n->fer_codigo; ?></a>
		        		</td>
                        <td>
                            <?= $n->tip_nome; ?>
                        </td>
                        <td>
                            <?= $n->fer_marca; ?>
                        </td>
                        <td>
                            <?= $n->fer_modelo; ?>
                        </td>
                        <td>
                            <?= $n->est_nome; ?>
                        </td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/ferramentas/alterar_ferramenta/<?= $n->fer_id; ?>" class="btn btn-outline btn-warning">Alterar</a>
		        		</td>
		        		<td>
		        			<a href="<?= base_url(); ?>painel/ferramentas/apagar_ferramenta/<?= $n->fer_id; ?>" class="btn btn-outline btn-danger">Apagar</a>
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