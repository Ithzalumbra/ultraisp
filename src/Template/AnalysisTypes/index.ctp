<section id="m-register" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Tipos de Analisis</h2>
            </div>
            <div class="col-8">
                <div class="col-12 col-sm-3 col-md-2">
                    <div class="btn-group" role="group">
                        <? if ($currentUser['usertype_id'] == 1): ?>
                            <?= $this->Html->link('<i class="fas fa-plus"></i> Agregar Tipo de Analisis',
                                ['controller' => 'AnalysisTypes','action' => 'add'],
                                ['class' => 'btn w-0', 'escape' => false])
                            ?>
                        <? endif; ?>
                        <?=$this->Form->end();?>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    <? foreach ($analysisTypes as $key => $asam): ?>

                        <tr>
                            <td><?= h($asam->id) ?></td>
                            <td><?= h($asam->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('<i class="fas fa-edit"></i>'), ['action' => 'edit', $asam->id],['escape' => false]) ?>
                                <?= $this->Form->postLink(__('<i class="fas fa-trash"></i>'), ['action' => 'delete', $asam->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asam->id), 'escape' => false]) ?>
                            </td>
                        </tr>
                    <? endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
