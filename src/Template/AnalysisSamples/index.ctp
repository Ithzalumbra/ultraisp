<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisSample[]|\Cake\Collection\CollectionInterface $analysisSamples
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Analysis Sample'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="analysisSamples index large-9 medium-8 columns content">
    <h3><?= __('Analysis Samples') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('temperatureSample') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantitySample') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_rut') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($analysisSamples as $analysisSample): ?>
            <tr>
                <td><?= $this->Number->format($analysisSample->id) ?></td>
                <td><?= h($analysisSample->date) ?></td>
                <td><?= $this->Number->format($analysisSample->temperatureSample) ?></td>
                <td><?= $this->Number->format($analysisSample->quantitySample) ?></td>
                <td><?= $analysisSample->has('user') ? $this->Html->link($analysisSample->user->name, ['controller' => 'Users', 'action' => 'view', $analysisSample->user->id]) : '' ?></td>
                <td><?= h($analysisSample->employee_rut) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $analysisSample->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $analysisSample->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $analysisSample->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisSample->id)]) ?>
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
