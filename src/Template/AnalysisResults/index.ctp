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
                <? if ($currentUser['usertype_id'] == 2 || $currentUser['usertype_id'] == 1): ?>
                    <?= $this->Html->link('<i class="fab fa-react"></i> Agregar Muestra',
                        ['controller' => 'AnalysisSamples','action' => 'add'],
                        ['class' => 'btn btn-outline-info', 'escape' => false])
                    ?>
                <? endif; ?>
                <? if ($currentUser['usertype_id'] == 1): ?>
                    <?= $this->Html->link('<i class="fab fa-sith"></i> Tipos de Analisis',
                        ['controller' => 'AnalysisTypes','action' => 'add'],
                        ['class' => 'btn btn-outline-info', 'escape' => false])
                    ?>
                <? endif; ?>
                <?=$this->Form->end();?>
                </div>
            </div>

            <div class="col-12 col-md-8 mt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <? if ($currentUser['usertype_id'] == 4 || $currentUser['usertype_id'] == 1 || $currentUser['usertype_id'] == 2 ): ?>
                            <th scope="col">C&oacute;digo de Usuario</th>
                        <? endif; ?>
                        <th scope="col">C&oacute;digo de la Muestra</th>
                        <th scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? if($analysisResults != null):?>
                        <? if ($currentUser['usertype_id'] == 3 || $currentUser['usertype_id'] == 5): ?>
                            <? foreach ($analysisResults as $asam): ?>
                                <tr>
                                    <td><?=h($asam->analysisSamples_id)?></td>
                                    <td><?=h($asam->status) == 1 ? '<a href="/muestras/detalles/'.h($asam->analysisSamples_id).'">Terminado</a>' : 'En Proceso'?></a></td>
                                </tr>
                            <? endforeach;
                            else:?>
                                <? foreach ($analysisResults as $asam): ?>
                                    <tr>
                                        <td><?=h($asam->analysis_sample->user_id)?></td>
                                        <td><?=h($asam->analysisSamples_id)?></td>
                                        <td><?=h($asam->status) == 0 ? '<a href="/muestras/llenar/'.h($asam->analysisSamples_id).'">En Proceso</a>' : 'Terminado'?></a></td>
                                    </tr>
                                <? endforeach;
                            endif; ?>
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