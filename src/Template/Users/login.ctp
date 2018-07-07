<section id="login" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Ingreso de Usuarios</h2>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <?= $this->Form->create('') ?>
                <div class="form-group">
                    <?= $this->Form->control('rut', ['class' => 'form-control', 'label' => false, 'placeholder' => 'RUT', 'required']) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Contraseña', 'required']) ?>
                </div>
                <?= $this->Form->submit('Ingresar', ['class' => 'btn w-100']) ?>
                <br><br>
                <p class="text-center"><a href="/registro">No est&aacute;s registrado? Registrate
                        ac&aacute;.</a></p>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</section>

<div class="links text-center">
    <p>Ir a:</p>
    <a href="m-reception.html">Recepci&oacute;n</a>
    <a href="m-list.html">Listado</a>
    <a href="m-register.html">Registro</a>
    <a href="m-search.html">B&uacute;squeda</a>
    <a href="m-result.html">Resultado</a>
</div>