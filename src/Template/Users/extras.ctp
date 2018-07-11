<section id="register" class="pb-3">
    <div class="container">
        <?= $this->Form->create(''); ?>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Editar <? echo $currentUser['usertype_id'] == 3 ? 'Contactos' : 'Telefonos' ?></h2>

            </div>
            <? $pos = 0;
            if ($currentUser['usertype_id'] == 3): ?>

                <? foreach ($data as $key => $contact): ?>
                    <div class="col-12 col-md-6 col-xl-4" id="pos<?= $key ?>">
                        <hr>
                        <div class="form-group">
                            <?= $this->Form->control('contact.' . $key . '.rut', ['class' => 'form-control', 'label' => false, 'type' => 'text', 'placeholder' => 'RUT contacto', 'required', 'readonly' => true, 'value' => $contact->rut]) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('contact.' . $key . '.name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre contacto', 'required', 'value' => $contact->name]) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('contact.' . $key . '.email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Correo contacto', 'required', 'value' => $contact->email]) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('contact.' . $key . '.phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Telefono contacto', 'required', 'value' => $contact->phone]) ?>
                        </div>
                    </div>
                    <? $pos = $key; endforeach; ?>

            <? else: ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <? foreach ($data as $key => $phone): ?>
                        <hr>
                        <div class="form-group" key="0">
                            <?= $this->Form->control('phone.' . $key . '.phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Telefono', 'required', 'value' => $phone->phone]) ?>
                        </div>
                        <? $pos = $key; endforeach; ?>
                    <div id="telefono">
                    </div>
                </div>

            <? endif; ?>

            <div class="col-12 text-center">
                <?= $this->Form->submit('Guardar', ['class' => 'btn w-90']) ?>
                <?= $this->Form->end(); ?>
                <br>
                <button class="btn w-90" onclick="slaido()"><i class="fas fa-plus"></i> Nuevo Contacto</button>
            </div>

        </div>
    </div>
</section>
<script>
    var key = <?=$pos + 1?>;
    function slaido() {

        <? if ($currentUser['usertype_id'] == 5): ?>

        $('#telefono').append('<div id="tel' + key + '"></div>');
        $('#tel' + key).append('<hr><div class="form-group contacto" key="' + key + '"><div class="form-group"><input type="text" name="phone[' + key + '][phone]" class="form-control" placeholder="Telefono" required="required"></div></div>');
        key += 1;

        <? else: ?>

        $('#contacto').append('<div class="col-12 col-md-6 col-xl-4" id="con' + key + '"></div>');
        $('<div class="col-12 col-md-6 col-xl-4" id="con' + key + '"></div>').insertAfter('#pos<?=$pos?>');

        $('#con' + key).append('<hr><div class="form-group contacto" key="' + key + '"><div class="form-group"><input type="text" name="contact[' + key + '][rut]" class="form-control" placeholder="RUT contacto" required="required"></div><div class="form-group"><input type="text" name="contact[' + key + '][name]" class="form-control" placeholder="Nombre contacto" required="required"></div><div class="form-group"><input type="text" name="contact[' + key + '][email]" class="form-control" placeholder="Correo contacto" required="required"></div><div class="form-group"><input type="text" name="contact[' + key + '][phone]" class="form-control" placeholder="Telefono contacto" required="required"></div></div>');
        key += 1;

        <? endif; ?>
    }
</script>


