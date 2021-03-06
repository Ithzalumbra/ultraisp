<section id="register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Registro de Clientes</h2>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-group">
                        <?php echo  $this->Form->control('rut', ['class' => 'form-control', 'label' => false, 'placeholder' => 'RUT', 'required']) ?>
                    </div>
                    <div class="form-group">
                        <?php echo  $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre', 'required']) ?>
                    </div>
                    <div class="form-group">
                        <?php echo  $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Contraseña', 'required']) ?>
                    </div>
                    <div class="form-group">
                        <?php echo  $this->Form->control('address', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Direccion', 'required']) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $opciones = [
                            ['text' => '--Selecciones una opcion--', 'value' => '', 'disabled' => true],
                            ['text' => 'Empresa', 'value' => '3', 'disabled' => false],
                            ['text' => 'Particular', 'value' => '5', 'disabled' => false]
                        ];
                        echo $this->Form->select('usertype_id', $opciones, ['class' => 'form-control', 'label' => false, 'id' => 'lista'])
                        ?>
                    </div>
                    <div id="particular">
                    </div>
                    <div id="empresa">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input"
                               onchange="this.setCustomValidity(validity.valueMissing ? 'Tiene que aceptar los terminos y condiciones antes de continuar.' : '');"
                               id="check">
                        <label class="form-check-label" for="check"><p>Acepto los t&eacute;rminos</p></label>
                    </div>
                    <?php echo  $this->Form->submit('Registrarse', ['class' => 'btn w-100']) ?>
                    <br><br>
                    <p class="text-center"><?php echo  $this->Html->link('Ya tienes una cuenta? Login acá.', '/login') ?></p>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("check").setCustomValidity("Tiene que aceptar los terminos antes de continuar.");


    $(document).ready(function () {
        var n = $('#lista').val();
        slaido(n);

        $('#lista').change(function () {
            console.log($('#lista').val());
            slaido($('#lista').val());
        });
    });

    function slaido(x) {
        if (x === '5') {
            $('#particular').hide(function () {
                $('#particular').append('<div class="form-group particular"><?php echo $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Telefono contacto', 'required'])?></div><div class="form-group particular"><?php echo  $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Email', 'type' => 'email', 'required']) ?></div>');
                $('#particular').slideDown(500);
            });
            $('#empresa').slideUp(500, function () {
                $('.empresa').remove();
            })

        } else {
            $('#empresa').hide(function () {
                $('#empresa').append('<div class="form-group empresa"><?php echo $this->Form->control('contact.rut', ['class' => 'form-control', 'label' => false, 'placeholder' => 'RUT contacto', 'required'])?></div><div class="form-group empresa"><?php echo $this->Form->control('contact.name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre contacto', 'required'])?></div><div class="form-group empresa"><?php echo $this->Form->control('contact.email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Correo contacto', 'required'])?></div><div class="form-group empresa"><?php echo $this->Form->control('contact.phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Telefono contacto', 'required'])?></div>');
                $('#empresa').slideDown(500);
            });
            $('#particular').slideUp(500, function () {
                $('.particular').remove();
            })
        }
    }
</script>

