<section id="m-search" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Muestras</h2>
            </div>

            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3 mb-md-0">
                <?=$this->Form->create();?>
                <?=$this->Form->control('analysisSamples_id', ['class' => 'form-control', 'placeholder' => 'Código Muestra', 'label' => false, 'type' => 'text']);?>
            </div>
            <div class="col-12 col-sm-3 col-md-2">
                <div class="btn-group" role="group">
                <?= $this->Form->button('Buscar', [
                    'type' => 'submit',
                    'class' => 'btn w-100'])
                ?>
                <?= $this->Html->link('<i class="fas fa-broom"></i> Limpiar',
                    ['action' => 'index'],
                    ['class' => 'btn btn-outline-info', 'escape' => false])
                ?>
                <?=$this->Form->end();?>
                </div>
            </div>

            <div class="col-12 col-md-8 mt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">C&oacute;digo de la Muestra</th>
                        <th scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? if($analysisResults != null):?>

                        <? foreach ($analysisResults as $asam):?>
                            <tr>
                                <td><?=h($asam->analysisSamples_id)?></td>
                                <td><?=h($asam->status) == 1 ? '<a href="/muestras/detalles/'.h($asam->analysisSamples_id).'">Terminado</a>' : 'En Proceso'?></a></td>
                            </tr>
                        <? endforeach;?>
                    <? else: ?>
                        <tr>
                            <td colspan="2">No se encontro ningun registro</td>
                        </tr>
                    <? endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>