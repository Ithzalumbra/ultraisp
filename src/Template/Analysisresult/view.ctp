<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysisresult $analysisresult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Analysisresult'), ['action' => 'edit', $analysisresult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Analysisresult'), ['action' => 'delete', $analysisresult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisresult->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Analysisresult'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysisresult'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="analysisresult view large-9 medium-8 columns content">
    <h3><?= h($analysisresult->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee Rut') ?></th>
            <td><?= h($analysisresult->employee_rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($analysisresult->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ppm') ?></th>
            <td><?= $this->Number->format($analysisresult->ppm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AnalysisSamples Id') ?></th>
            <td><?= $this->Number->format($analysisresult->analysisSamples_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AnalysisType Id') ?></th>
            <td><?= $this->Number->format($analysisresult->analysisType_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Register') ?></th>
            <td><?= h($analysisresult->date_register) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $analysisresult->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
