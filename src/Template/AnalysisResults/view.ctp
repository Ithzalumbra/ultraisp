<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisResult $analysisResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Analysis Result'), ['action' => 'edit', $analysisResult->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Analysis Result'), ['action' => 'delete', $analysisResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisResult->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Analysis Results'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysis Result'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Analysis Samples'), ['controller' => 'AnalysisSamples', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysis Sample'), ['controller' => 'AnalysisSamples', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Analysis Types'), ['controller' => 'AnalysisTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysis Type'), ['controller' => 'AnalysisTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="analysisResults view large-9 medium-8 columns content">
    <h3><?= h($analysisResult->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee Rut') ?></th>
            <td><?= h($analysisResult->employee_rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analysis Sample') ?></th>
            <td><?= $analysisResult->has('analysis_sample') ? $this->Html->link($analysisResult->analysis_sample->id, ['controller' => 'AnalysisSamples', 'action' => 'view', $analysisResult->analysis_sample->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Analysis Type') ?></th>
            <td><?= $analysisResult->has('analysis_type') ? $this->Html->link($analysisResult->analysis_type->name, ['controller' => 'AnalysisTypes', 'action' => 'view', $analysisResult->analysis_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($analysisResult->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ppm') ?></th>
            <td><?= $this->Number->format($analysisResult->ppm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Register') ?></th>
            <td><?= h($analysisResult->date_register) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $analysisResult->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
