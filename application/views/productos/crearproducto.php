<?php 
    $formulario = array(
        'name' => 'formproducto',
        'id' => 'formproducto'
         );
    $enviar = array(
        'class' => 'btn btn-success btn-lg');
 ?><hr>
 <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Producto</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php echo form_open("/producto/addProducto",$formulario) ?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="tipo">Tipo de Producto</label>
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
                </div>
            </div>
        </div>
    </section>