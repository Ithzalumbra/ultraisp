<section id="login" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Ingreso de Usuarios</h2>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <?php echo  $this->Form->create('') ?>
                <div class="form-group">
                    <?php echo  $this->Form->control('rut', ['class' => 'form-control', 'label' => false, 'placeholder' => 'RUT', 'required']) ?>
                </div>
                <div class="form-group">
                    <?php echo  $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Contraseña', 'required']) ?>
                </div>
                <?php echo  $this->Form->submit('Ingresar', ['class' => 'btn w-100']) ?>
                <br><br>
                <p class="text-center"><a href="/registro">No est&aacute;s registrado? Registrate
                        ac&aacute;.</a></p>
                <?php echo  $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>
