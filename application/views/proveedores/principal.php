<?php 
    $formulario = array(
        'name' => 'formproveedor',
        'id' => 'formproveedor'
         );
    $enviar = array(
        'name' => 'btnactualizaprov',
        'id' => 'btnactualizaprov',
        'class' => 'btn btn-success btn-lg');
 ?>
<hr>
<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Proveedores</h2>
                    <hr class="star-primary">
                </div>
            </div>
             <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="input-group">
                        <input id="buscarprov" name="buscarprov" type="text" class="form-control" placeholder="Buscar..">
                        <span class="input-group-btn">
                            <button id="btnbuscarprov" name="btnbuscarprov" class="btn btn-primary" type="button">Mostrar Todos</button>
                            <a class="btn btn-warning" href="<?php echo base_url();?>proveedor/vistacrear">Agregar Proveedor</a>
                        </span>
                    </div>                   
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 ">
                	<div id="listaProveedor" class="table-responsive">
           
                	</div>

                </div>
            </div>
        </div>
</section>
<div class="portfolio-modal modal fade" id="actualizarprov" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>Actualizar Proveedor</h2>
                    <hr class="star-primary">
                </div>
            </div>
           
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php echo form_open("/proveedor/updateProveedor",$formulario) ?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input id="idproveedor" name="idproveedor" type="hidden">
                                <label for="nit">Nit Proveedor</label>
                                <input id="nit" type="text" name="nit" class="form-control" placeholder="Nit de la empresa"  required>                               
                                <p class="help-block text-danger"><?php echo form_error('nit'); ?></p>
                            </div>                            
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre de la Empresa</label>
                                <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre de la Empresa"  required>
                                <p class="help-block text-danger"><?php echo form_error('empresa'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Dirección de la Empresa</label>
                                <input id="direccion" type="text" name="direccion" class="form-control" placeholder="Dirección de la Empresa"  required>
                                <p class="help-block text-danger"><?php echo form_error('direccion'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono de la Empresa</label>
                                <input id="telefono" type="tel" name="telefono" class="form-control" placeholder="Teléfono de la Empresa"  required>
                                <p class="help-block text-danger"><?php echo form_error('telefono'); ?></p>
                            </div>
                        </div>
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email de Contacto</label>
                                <input id="email" type="email" name="email" class="form-control" placeholder="Email de Contacto"  required>
                                <p class="help-block text-danger"><?php echo form_error('email'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre del Contacto</label>
                                <input id="nombrecontacto" type="text" name="nombrecontacto" class="form-control" placeholder="Nombre del Contacto"  required>
                                <p class="help-block text-danger"><?php echo form_error('nombrecontacto'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono del Contacto</label>
                                <input id="telefonocontacto" type="tel" name="telefonocontacto" class="form-control" placeholder="Teléfono del Contacto"  required>
                                <p class="help-block text-danger"><?php echo form_error('telefonocontacto'); ?></p>
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