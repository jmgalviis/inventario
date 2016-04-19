 <?php 
    $formulario = array(
        'name' => 'crear',
        'id' => 'empresa'
         );
    $nit = array('name' => 'nit',
        'class' => 'form-control',
        'placeholder' => 'Nit',
        'id' => 'nit',
        'required' => 'True'
        );
    $enviar = array(
        'class' => 'btn btn-success btn-lg');
 ?>
 <hr>
 <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Empresa</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php echo form_open("/empresa/addEmpresa",$formulario) ?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="nit">Nit</label>
                                <input id="nit" type="text" name="nit" class="form-control" placeholder="Nit"  >
                                <p class="help-block text-danger"><?php echo form_error('nit'); ?></p>
                            </div>                            
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre</label>
                                <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre"  >
                                <p class="help-block text-danger"><?php echo form_error('nombre'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Dirección</label>
                                <input id="direccion" type="text" name="direccion" class="form-control" placeholder="Dirección"  >
                                <p class="help-block text-danger"><?php echo form_error('direccion'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono</label>
                                <input id="telefono" type="text" name="telefono" class="form-control" placeholder="Teléfono"   >
                                <p class="help-block text-danger"><?php echo form_error('telefono'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input id="email" type="email" name="email" class="form-control" placeholder="Emails"  >
                                <p class="help-block text-danger"><?php echo form_error('email'); ?></p></p>
                            </div>
                        </div><br>
                         <div class="row">
                            <div class="form-group col-xs-12">
                                <?php echo form_submit($enviar,'Guardar') ?>
                            </div>
                        </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
