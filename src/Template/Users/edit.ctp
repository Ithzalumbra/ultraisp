<section id="register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Editar Datos</h2>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <?php echo  $this->Form->create($user); ?>
                <div class="form-group">
                    <?php echo  $this->Form->control('rut', ['class' => 'form-control', 'label' => false, 'placeholder' => 'RUT', 'required']) ?>
                </div>
                <div class="form-group">
                    <?php echo  $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre', 'required']) ?>
                </div>
                <div class="form-group">
                    <?php echo  $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Contraseña', 'required', 'value' => '']) ?>
                </div>
                <?php if ($user->usertype_id == 3 || $user->usertype_id == 5): ?>
                    <div class="form-group address">
                        <?php echo  $this->Form->control('address', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Direccion', 'required']) ?>
                    </div>
                <?php endif; ?>
                <?php echo  $this->Form->submit('Guardar', ['class' => 'btn w-100']) ?>
                <br>
                <?php if ($user->usertype_id == 3 || $user->usertype_id == 5) echo $this->Html->link($user->usertype_id == '3' ? 'Contactos' : 'Telefonos',
                    '/perfil/' . $user->id . '/otros/',
                    ['class' => 'btn w-100', 'escape' => false])
                ?>
                <br><br>
                <?php echo  $this->Form->end(); ?>
            </div>

        </div>
    </div>
</section>