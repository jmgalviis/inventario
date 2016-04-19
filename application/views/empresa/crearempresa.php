 <?php 
    $formulario = array(
        'name' => 'crear',
        'id' => 'empresa'
         );
    $nit = array('name' => 'nit',
        'class' => 'form-control',
        'placeholder' => 'Nit',
        'id' => 'nit',
        'required' => 'True');
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
                                <?php echo form_label('Nit','nit') ?>
                                <?php echo form_input($nit) ?>
                            </div>                            
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" id="nombre" required>
                                <p class="help-block text-danger"><?php echo form_error('nombre'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Dirección</label>
                                <input type="text" name="direccion" class="form-control" placeholder="Dirección" id="direccion" required>
                                <p class="help-block text-danger"><?php echo form_error('nombre'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono</label>
                                <input type="tel" name="telefono" class="form-control" placeholder="Teléfono" id="telefono" required >
                                <p class="help-block text-danger"><?php echo form_error('telefono'); ?></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Emails" id="email" required>
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
