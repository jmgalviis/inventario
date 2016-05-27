<?php 
    $formulario = array(
        'name' => 'formorde',
        'id' => 'formorden'
         );
    $enviar = array(
        'class' => 'btn btn-success btn-lg');
 ?><hr>
 <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Orden</h2>
                    <hr class="star-primary">
                </div>
            </div>
           
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php echo form_open("/orden/crearorden",$formulario) ?>
                        <?php foreach ($proveedor as $fila) {?>
                        <div class="row control-group">
                            <div class="form-group col-xs-4 controls">
                                <label>Proveedor</label>
                                <input id="prove" name="prove" type="hidden" value="<?php echo $fila->id_proveedor ?>">
                                <input id="proveedor" type="text" value="<?php echo $fila->nom_proveedor ?>" name="proveedor" class="form-control" disabled>
                                <p class="help-block text-danger"><?php echo form_error('proveedor'); ?></p>
                            </div>
                            <div class="form-group col-xs-4 controls">
                                <label>Nit</label>
                                <input id="nit" type="text" value="<?php echo $fila->nit_proveedor ?>" name="nit" class="form-control" disabled>
                                <p class="help-block text-danger"><?php echo form_error('nit'); ?></p>
                            </div>
                            <div class="form-group col-xs-4 controls">
                                <label>Dirección</label>
                                <input id="direccion" type="text" value="<?php echo $fila->dir_proveedor?>" name="direccion" class="form-control" disabled>
                                <p class="help-block text-danger"><?php echo form_error('direccion'); ?></p>
                            </div>
                        </div>
                        <a id="bt" name="bt" data-toggle="modal" data-target="#actualizar" class="btn btn-success" value="<?php echo $fila->id_proveedor ?>">Agregar Productos</a><?php }?>
                        <button id="savetmp" name="savetmp" class="btn btn-default"><i class="glyphicon glyphicon-floppy-save"></i>  Guardar</button>
                        <?php echo form_close() ?>
                        <hr>
                        <br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="table-responsive" id="listatmp"></div>
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
                            <h2>Producto</h2>
                            <hr class="star-primary">
                            <?php echo form_open("/orden/savetmp",$formulario) ?>
                            <div id="listar" class="table-responsive">
                            </div>

                            <?php echo form_close() ?>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>