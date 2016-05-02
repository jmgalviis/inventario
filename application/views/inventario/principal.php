<hr>
<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Inventario</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                	<div class="table-responsive">
                		<table class="table table-hover">
                			<thead>
                				<th>#</th>
                				<th>Fecha</th>
                				<th>Código</th>
                				<th>Producto</th>
                				<th>Stock</th>
                			</thead>
                			<tbody>
                				<?php foreach ($inv as $fila) {?>
                					<tr>
                						<td><?php echo $fila->id_inventario; ?></td>
                						<td><?php echo $fila->fech_ingreso; ?></td>
                						<td><?php echo $fila->cod_producto; ?></td>
                						<td><?php echo $fila->nom_producto; ?></td>
                						<td><?php echo $fila->stock; ?></td>
                					</tr>

                				<?php } ?>
                			</tbody>
                		</table>

                	</div>

                </div>
            </div>
        </div>
</section>