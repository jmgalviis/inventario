<?php 
    $formulario = array(
        'name' => 'formproducto',
        'id' => 'formproducto'
         );
    $enviar = array(
        'name' => 'btnactualizar',
        'id' => 'btnactualizar',
        'class' => 'btn btn-success btn-lg');
 ?>
<hr>
<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Productos</h2>
                    <hr class="star-primary">
                </div>
            </div>
             <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="input-group">
                        <input id="buscar" name="buscar" type="text" class="form-control" placeholder="Buscar..">
                        <span class="input-group-btn">
                            <button id="btnbuscar" name="btnbuscar" class="btn btn-primary" type="button">Mostrar Todos</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-lg-offset-1">
                	<div id="listaProductos" class="table-responsive">
           
                	</div>

                </div>
            </div>
        </div>
</section>
<div class="portfolio-modal modal fade" id="actualizar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Actualizar Producto</h2>
                            <hr class="star-primary">
                            <?php echo form_open("/producto/updateProducto",$formulario) ?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="tipo">Tipo de Producto</label>
                                <input id="idproducto" name="idproducto" type="hidden">
                                <select name="tipo" id="tipo" class="form-control">
                                    <?php foreach ($tipo as $fila) {
                                        ?>
                                        <option value="<?php echo $fila->id_tipo ?>">
                                            <?php echo $fila->des_tipo ?>
                                        </option>
                                        <?php
                                    }?>
                                </select>
                                <p class="help-block text-danger"><?php echo form_error('tipo'); ?></p>
                            </div>                            
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Código de Producto</label>
                                <input id="codigo" type="text" name="codigo" class="form-control" placeholder="Código Producto"  required>
                                <p class="help-block text-danger"><?php echo form_error('producto'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre del Producto</label>
                                <input id="producto" type="text" name="producto" class="form-control" placeholder="Nombre del Producto"  required>
                                <p class="help-block text-danger"><?php echo form_error('producto'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Descripción</label>
                                <textarea id="descripcion"  name="descripcion" class="form-control" placeholder="Descripción" rows="3"></textarea>
                                <p class="help-block text-danger"><?php echo form_error('descripcion'); ?></p>
                            </div>
                        </div>
                        <br>
                         <div class="row">
                            <div class="form-group col-xs-12">
                                <?php echo form_submit($enviar,'Guardar') ?>
                            </div>
                        </div>

                    <?php echo form_close() ?>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <?php foreach ($prod as $fila) {?>
                                    <tr>
                                        <td><?php echo $fila->id_producto; ?></td>
                                        <td><?php echo $fila->cod_producto; ?></td>
                                        <td><?php echo $fila->nom_producto; ?></td>
                                        <td><?php echo $fila->des_producto; ?></td>
                                        <td><button data-toggle="modal" data-target="#actualizar" class="btn btn-success" value="<?php echo $fila->id_producto; ?>">Actualizar</button></td>
                                        
                                        <td id="eliminar"><a class="btn btn-danger" href="<?php echo $fila->id_producto; ?>">Eliminar</a></td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table> -->