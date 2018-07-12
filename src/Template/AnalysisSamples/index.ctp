<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisSample[]|\Cake\Collection\CollectionInterface $analysisSamples
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php/*= __('Actions') */?></li>
        <li><?php/*= $this->Html->link(__('New Analysis Sample'), ['action' => 'add']) */?></li>
        <li><?php/*= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) */?></li>
        <li><?php/*= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) */?></li>
    </ul>
</nav>
<div class="analysisSamples index large-9 medium-8 columns content">
    <h3><?php/*= __('Analysis Samples') */?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?php/*= $this->Paginator->sort('id') */?></th>
                <th scope="col"><?php/*= $this->Paginator->sort('date') */?></th>
                <th scope="col"><?php/*= $this->Paginator->sort('temperatureSample') */?></th>
                <th scope="col"><?php/*= $this->Paginator->sort('quantitySample') */?></th>
                <th scope="col"><?php/*= $this->Paginator->sort('user_id') */?></th>
                <th scope="col"><?php/*= $this->Paginator->sort('employee_rut') */?></th>
                <th scope="col" class="actions"><?php/*= __('Actions') */?></th>
            </tr>
        </thead>
        <tbody>
            <?php   /*foreach ($analysisSamples as $analysisSample): */?>
            <tr>
                <td><?php/*= $this->Number->format($analysisSample->id) */?></td>
                <td><?php/*= h($analysisSample->date) */?></td>
                <td><?php/*= $this->Number->format($analysisSample->temperatureSample) */?></td>
                <td><?php/*= $this->Number->format($analysisSample->quantitySample) */?></td>
                <td><?php/*= $analysisSample->has('user') ? $this->Html->link($analysisSample->user->name, ['controller' => 'Users', 'action' => 'view', $analysisSample->user->id]) : '' */?></td>
                <td><?php/*= h($analysisSample->employee_rut) */?></td>
                <td class="actions">
                    <?php/*= $this->Html->link(__('View'), ['action' => 'view', $analysisSample->id]) */?>
                    <?php/*= $this->Html->link(__('Edit'), ['action' => 'edit', $analysisSample->id]) */?>
                    <?php/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $analysisSample->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisSample->id)]) */?>
                </td>
            </tr>
            <?php   /*endforeach; */?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?php/*= $this->Paginator->first('<< ' . __('first')) */?>
            <?php/*= $this->Paginator->prev('< ' . __('previous')) */?>
            <?php/*= $this->Paginator->numbers() */?>
            <?php/*= $this->Paginator->next(__('next') . ' >') */?>
            <?php/*= $this->Paginator->last(__('last') . ' >>') */?>
        </ul>
        <p><?php/*= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) */?></p>
    </div>
</div>-->

<section id="m-search" class="pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2>Muestras</h2>
            </div>
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3 mb-md-0">
                <input  type="text" class="form-control" placeholder="Código Muestra">
            </div>
            <div class="col-12 col-sm-3 col-md-2">
                <button type="submit" class="btn w-100">Buscar</button>
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
                    <?php if($analysisSamples != null):?>
                        <?php foreach ($analysisSamples as $asam):?>
                            <tr>
                                <td><?php echo $asam->id?></td>
                                <td><a href="m-result.html">En Proceso</a></td>
                            </tr>
                        <?php endforeach;?>
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