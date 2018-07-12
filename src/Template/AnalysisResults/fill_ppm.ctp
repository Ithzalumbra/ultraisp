<section id="m-register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Registro de Muestras</h2>
            </div>
            <div class="col-6 text-right">
                <h6>C&oacute;digo del Cliente: <?php echo $analysisDetails->toArray()[0]->analysis_sample->user_id?></h6>
            </div>
            <div class="col-6 text-left">
                <h6>C&oacute;digo de Muestra: <?php echo $analysisDetails->toArray()[0]->analysis_sample->id?></h6>
            </div>
            <div class="col-8">
                <?php echo $this->Form->create('')?>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Tipo de An&aacute;lisis</th>
                            <th scope="col">PPM de la Muestra</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($analysisDetails as $key => $asam): ?>

                            <tr>
                                <td><?php echo  h($asam->analysis_type->name) ?></td>
                                <?php echo  $this->Form->hidden('resultado.'.$key.'.analysisType_id',['value' => $asam->analysisType_id])?>
                                <?php echo  $this->Form->hidden('resultado.'.$key.'.analysisSample_id',['value' => $asam->analysis_sample->id])?>
                                <td><?php echo  $this->Form->control('resultado.'.$key.'.ppm',['class' => 'form-control w-75', 'div' => false, 'label' => false, 'type' => 'number', 'min' => 0])?></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo  $this->Form->button('Guardar An&aacute;lisis', [
                        'type' => 'submit',
                        'class' => 'btn '])
                    ?>
                <?php echo $this->Form->end()?>
            </div>
        </div>
    </div>
</section>