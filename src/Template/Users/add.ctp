<section id="register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Agregar usuario</h2>
            </div>

            <div class="col-12 col-md-6 col-xl-4">
                <?= $this->Form->create(); ?>
                    <div class="form-group">
                        <?= $this->Form->control('rut', ['class' => 'form-control', 'label' => false, 'placeholder' => 'RUT', 'required']) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre', 'required']) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Contraseña', 'required']) ?>
                    </div>
                    <div class="form-group address">
                        <?= $this->Form->control('address', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Direccion', 'required']) ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $this->Form->select('usertype_id', $usertypes, ['class' => 'form-control', 'label' => false, 'id' => 'lista'])
                        ?>
                    </div>
                    <div id="particular">
                    </div>
                    <div id="empresa">
                    </div>
                    <?= $this->Form->submit('Guardar', ['class' => 'btn w-100']) ?>
                    <br><br>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
<script>

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
                $('#particular').append('<div class="form-group particular"><?=$this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Telefono contacto', 'required'])?></div><div class="form-group particular"><?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Email', 'type' => 'email', 'required']) ?></div>');
                $('#particular').slideDown(500);
            });
            $('#empresa').slideUp(500, function () {
                $('.empresa').remove();
            });
            $('.address').slideDown(500, function () {
                $('#address').prop('disabled', false);
            })

        } else if (x === '3'){
            $('#empresa').hide(function () {
                $('#empresa').append('<div class="form-group empresa"><?=$this->Form->control('contact.rut', ['class' => 'form-control', 'label' => false, 'placeholder' => 'RUT contacto', 'required'])?></div><div class="form-group empresa"><?=$this->Form->control('contact.name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre contacto', 'required'])?></div><div class="form-group empresa"><?=$this->Form->control('contact.email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Correo contacto', 'required'])?></div><div class="form-group empresa"><?=$this->Form->control('contact.phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Telefono contacto', 'required'])?></div>');
                $('#empresa').slideDown(500);
            });
            $('#particular').slideUp(500, function () {
                $('.particular').remove();
            });
            $('.address').slideDown(500, function () {
                $('#address').prop('disabled', false);
            })
        } else {
            $('#empresa').slideUp(500, function () {
                $('.empresa').remove();
            });
            $('#particular').slideUp(500, function () {
                $('.particular').remove();
            });
            $('.address').slideUp(500, function () {
                $('#address').prop('disabled', true);
            })
        }
    }
</script>

