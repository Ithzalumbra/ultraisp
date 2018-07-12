<section id="m-search" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Muestras</h2>
            </div>

            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3 mb-md-0">
                <?php echo $this->Form->create();?>
                <?php echo $this->Form->control('analysisSamples_id', ['class' => 'form-control', 'placeholder' => 'Código Muestra', 'label' => false, 'type' => 'text']);?>
            </div>
            <div class="col-12 col-md-10 mt-md-4 text-center">
                <div class="btn-group" role="group">
                <?php echo  $this->Form->button('Buscar', [
                    'type' => 'submit',
                    'class' => 'btn w-100'])
                ?>
                <?php echo  $this->Html->link('<i class="fas fa-broom"></i> Limpiar',
                    ['action' => 'index'],
                    ['class' => 'btn btn-outline-info', 'escape' => false])
                ?>
                <?php if ($currentUser['usertype_id'] == 2 || $currentUser['usertype_id'] == 1): ?>
                    <?php echo  $this->Html->link('<i class="fab fa-react"></i> Agregar Muestra',
                        ['controller' => 'AnalysisSamples','action' => 'add'],
                        ['class' => 'btn btn-outline-info', 'escape' => false])
                    ?>
                <?php endif; ?>
                <?php if ($currentUser['usertype_id'] == 1): ?>
                    <?php echo  $this->Html->link('<i class="fab fa-sith"></i> Tipos de Analisis',
                        ['controller' => 'AnalysisTypes','action' => 'index'],
                        ['class' => 'btn btn-outline-info', 'escape' => false])
                    ?>
                <?php endif; ?>
                <?php echo $this->Form->end();?>
                </div>
            </div>

            <div class="col-12 col-md-8 mt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <?php if ($currentUser['usertype_id'] == 4 || $currentUser['usertype_id'] == 1 || $currentUser['usertype_id'] == 2 ): ?>
                            <th scope="col">C&oacute;digo de Usuario</th>
                        <?php endif; ?>
                        <th scope="col">C&oacute;digo de la Muestra</th>
                        <th scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($analysisResults != null):?>
                        <?php if ($currentUser['usertype_id'] == 3 || $currentUser['usertype_id'] == 5): ?>
                            <?php foreach ($analysisResults as $asam): ?>
                                <tr>
                                    <td><?php echo h($asam->analysisSamples_id)?></td>
                                    <td><?php echo h($asam->status) == 1 ? '<a href="/muestras/detalles/'.h($asam->analysisSamples_id).'">Terminado</a>' : 'En Proceso'?></a></td>
                                </tr>
                            <?php endforeach;
                            else:?>
                                <?php foreach ($analysisResults as $asam): ?>
                                    <tr>
                                        <td><?php echo h($asam->analysis_sample->user_id)?></td>
                                        <td><?php echo h($asam->analysisSamples_id)?></td>
                                        <td><?php echo h($asam->status) == 0 ? ($currentUser['usertype_id'] == 2 ? 'En Proceso': '<a href="/muestras/llenar/'.h($asam->analysisSamples_id).'">En Proceso</a>'): 'Terminado'?></a></td>
                                    </tr>

                                <?php endforeach;
                            endif; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">No se encontro ningun registro</td>
                        </tr>
                    <?php endif;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>