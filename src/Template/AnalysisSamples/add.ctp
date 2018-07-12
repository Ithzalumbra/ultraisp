<section id="m-reception" class="pb-3">
    <div class="container">
        <?php echo $this->Form->create('') ?>
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Recepci&oacute;n de Muestras</h2>
            </div>

            <div class="col-12 col-md-8 col-xl-6">
                <h5>Datos Cliente</h5>
                <div class="form-group">
                    <?php echo $this->Form->control('', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Código Cliente', 'disabled' => true, 'value' => $currentUser['id']]) ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->control('', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Rut Cliente', 'disabled' => true, 'value' => $currentUser['rut']]) ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->control('', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre Cliente', 'disabled' => true, 'value' => $currentUser['name']]) ?>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-4">
                <h5>Fecha De Recepci&oacute;n</h5>
                <div class="form-group">
                    <?php echo $this->Form->control('temperatureSample', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Temperatura de Muestra', 'required']) ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->control('quantitySample', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Cantidad de Muestra', 'required']) ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->control('date', ['class' => 'form-control datepicker', 'label' => false, 'required', 'placeholder' => 'Fecha de rececion de muestra']) ?>
                </div>
            </div>
            <div class="col-12 col-lg-10">
                <h5>Tipo de An&aacute;lisis a Realizar</h5>
                <div class="form-group">
                    <?php echo $this->Form->control('', ['options' => $analysisT, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Cantidad de Muestra', 'required', 'id' => 'ultraselect']) ?>
                </div>
                <button type="button" class="btn mb-3" onclick="addLi()">Agregar</button>
                <div class="form-group">
                    <!--                        <textarea type="text" class="form-control"></textarea>-->
                    <ul id="ultraul">

                    </ul>
                </div>
                <button type="submit" class="btn">Guardar</button>
                <button type="submit" class="btn">Salir</button>
            </div>

        </div>
        <?php echo $this->Form->end() ?>
    </div>
</section>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd'
    });

    function addLi() {
        var text = $("#ultraselect option:selected").text();
        var id = $("#ultraselect option:selected").val();
        var val = $("#ultraselect option:selected").is(':disabled');
        if (val === false) {
            var litext = $("#ultraselect option:selected").text();
            console.log('|' + litext + '|');
            $("#ultraselect option:selected").attr('disabled', 'disabled');
            $('#ultraul').append('<li class="list-group-item" onclick="remLi()">' + text + '<input type="hidden" name="analysistypes[' + id + '][analysis_type]" class="form-control" value="' + id + '"></li>');
        }
    }

    function remLi() {
        $("li").on("click", function () {
            var hola = $(this).text();
            var valor = $('#ultraselect option').filter(function () {
                return $(this).html() === hola;
            }).val();
            $('#ultraselect option[value="' + valor + '"]').removeAttr('disabled');
            $(this).remove();

        });
    }
</script>
