<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysisresult[]|\Cake\Collection\CollectionInterface $analysisresult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Analysisresult'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="analysisresult index large-9 medium-8 columns content">
    <h3><?= __('Analysisresult') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ppm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_register') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_rut') ?></th>
                <th scope="col"><?= $this->Paginator->sort('analysisSamples_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('analysisType_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($analysisresult as $analysisresult): ?>
            <tr>
                <td><?= $this->Number->format($analysisresult->id) ?></td>
                <td><?= $this->Number->format($analysisresult->ppm) ?></td>
                <td><?= h($analysisresult->date_register) ?></td>
                <td><?= h($analysisresult->status) ?></td>
                <td><?= h($analysisresult->employee_rut) ?></td>
                <td><?= $this->Number->format($analysisresult->analysisSamples_id) ?></td>
                <td><?= $this->Number->format($analysisresult->analysisType_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $analysisresult->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $analysisresult->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $analysisresult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisresult->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
