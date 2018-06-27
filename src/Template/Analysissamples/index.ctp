<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysissample[]|\Cake\Collection\CollectionInterface $analysissamples
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Analysissample'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="analysissamples index large-9 medium-8 columns content">
    <h3><?= __('Analysissamples') ?></h3>
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
            <?php foreach ($analysissamples as $analysissample): ?>
            <tr>
                <td><?= $this->Number->format($analysissample->id) ?></td>
                <td><?= h($analysissample->date) ?></td>
                <td><?= $this->Number->format($analysissample->temperatureSample) ?></td>
                <td><?= $this->Number->format($analysissample->quantitySample) ?></td>
                <td><?= $this->Number->format($analysissample->user_id) ?></td>
                <td><?= h($analysissample->employee_rut) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $analysissample->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $analysissample->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $analysissample->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysissample->id)]) ?>
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
