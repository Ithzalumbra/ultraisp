<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisSample $analysisSample
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo  __('Actions') ?></li>
        <li><?php echo  $this->Html->link(__('Edit Analysis Sample'), ['action' => 'edit', $analysisSample->id]) ?> </li>
        <li><?php echo  $this->Form->postLink(__('Delete Analysis Sample'), ['action' => 'delete', $analysisSample->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisSample->id)]) ?> </li>
        <li><?php echo  $this->Html->link(__('List Analysis Samples'), ['action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New Analysis Sample'), ['action' => 'add']) ?> </li>
        <li><?php echo  $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="analysisSamples view large-9 medium-8 columns content">
    <h3><?php echo  h($analysisSample->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo  __('User') ?></th>
            <td><?php echo  $analysisSample->has('user') ? $this->Html->link($analysisSample->user->name, ['controller' => 'Users', 'action' => 'view', $analysisSample->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Employee Rut') ?></th>
            <td><?php echo  h($analysisSample->employee_rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Id') ?></th>
            <td><?php echo  $this->Number->format($analysisSample->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('TemperatureSample') ?></th>
            <td><?php echo  $this->Number->format($analysisSample->temperatureSample) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('QuantitySample') ?></th>
            <td><?php echo  $this->Number->format($analysisSample->quantitySample) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Date') ?></th>
            <td><?php echo  h($analysisSample->date) ?></td>
        </tr>
    </table>
</div>
