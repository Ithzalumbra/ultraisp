<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysissample $analysissample
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Analysissample'), ['action' => 'edit', $analysissample->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Analysissample'), ['action' => 'delete', $analysissample->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysissample->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Analysissamples'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysissample'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="analysissamples view large-9 medium-8 columns content">
    <h3><?= h($analysissample->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee Rut') ?></th>
            <td><?= h($analysissample->employee_rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($analysissample->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TemperatureSample') ?></th>
            <td><?= $this->Number->format($analysissample->temperatureSample) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('QuantitySample') ?></th>
            <td><?= $this->Number->format($analysissample->quantitySample) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($analysissample->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($analysissample->date) ?></td>
        </tr>
    </table>
</div>
