<section id="m-register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Registro de Muestras</h2>
            </div>
            <div class="col-6 text-right">
                <h6>C&oacute;digo del Cliente: <?=$analysisDetails->toArray()[0]->analysis_sample->user_id?></h6>
            </div>
            <div class="col-6 text-left">
                <h6>C&oacute;digo de Muestra: <?=$analysisDetails->toArray()[0]->analysis_sample->id?></h6>
            </div>
            <div class="col-8">
                <?=$this->Form->create('')?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Tipo de An&aacute;lisis</th>
                            <th scope="col">PPM de la Muestra</th>
                        </tr>
                        </thead>
                        <tbody>

                        <? foreach ($analysisDetails as $key => $asam): ?>

                            <tr>
                                <td><?= h($asam->analysis_type->name) ?></td>
                                <?= $this->Form->hidden('resultado.'.$key.'.analysisType_id',['value' => $asam->analysisType_id])?>
                                <?= $this->Form->hidden('resultado.'.$key.'.analysisSample_id',['value' => $asam->analysis_sample->id])?>
                                <td><?= $this->Form->control('resultado.'.$key.'.ppm',['class' => 'form-control w-75', 'div' => false, 'label' => false, 'type' => 'number', 'min' => 0])?></td>

                            </tr>
                        <? endforeach; ?>
                        </tbody>
                    </table>
                    <?= $this->Form->button('Guardar An&aacute;lisis', [
                        'type' => 'submit',
                        'class' => 'btn '])
                    ?>
                <?=$this->Form->end()?>
            </div>
        </div>
    </div>
</section>