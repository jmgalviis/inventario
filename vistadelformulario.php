<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('empresa', $attributes); ?>

<p>
        <label for="nit">Nit <span class="required">*</span></label>
        <?php echo form_error('nit'); ?>
        <br /><input id="nit" type="text" name="nit"  value="<?php echo set_value('nit'); ?>"  />
</p>

<p>
        <label for="nombre">Nombre <span class="required">*</span></label>
        <?php echo form_error('nombre'); ?>
        <br /><input id="nombre" type="text" name="nombre"  value="<?php echo set_value('nombre'); ?>"  />
</p>

<p>
        <label for="direccion">Dirección <span class="required">*</span></label>
        <?php echo form_error('direccion'); ?>
        <br /><input id="direccion" type="text" name="direccion"  value="<?php echo set_value('direccion'); ?>"  />
</p>

<p>
        <label for="telefono">Teléfono <span class="required">*</span></label>
        <?php echo form_error('telefono'); ?>
        <br /><input id="telefono" type="text" name="telefono"  value="<?php echo set_value('telefono'); ?>"  />
</p>

<p>
        <label for="email">Email <span class="required">*</span></label>
        <?php echo form_error('email'); ?>
        <br /><input id="email" type="text" name="email"  value="<?php echo set_value('email'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>