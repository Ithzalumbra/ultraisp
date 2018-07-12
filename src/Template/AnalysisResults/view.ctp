<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisResult $analysisResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo  __('Actions') ?></li>
        <li><?php echo  $this->Html->link(__('Edit Analysis Result'), ['action' => 'edit', $analysisResult->id]) ?> </li>
        <li><?php echo  $this->Form->postLink(__('Delete Analysis Result'), ['action' => 'delete', $analysisResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisResult->id)]) ?> </li>
        <li><?php echo  $this->Html->link(__('List Analysis Results'), ['action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New Analysis Result'), ['action' => 'add']) ?> </li>
        <li><?php echo  $this->Html->link(__('List Analysis Samples'), ['controller' => 'AnalysisSamples', 'action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New Analysis Sample'), ['controller' => 'AnalysisSamples', 'action' => 'add']) ?> </li>
        <li><?php echo  $this->Html->link(__('List Analysis Types'), ['controller' => 'AnalysisTypes', 'action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New Analysis Type'), ['controller' => 'AnalysisTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="analysisResults view large-9 medium-8 columns content">
    <h3><?php echo  h($analysisResult->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo  __('Employee Rut') ?></th>
            <td><?php echo  h($analysisResult->employee_rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Analysis Sample') ?></th>
            <td><?php echo  $analysisResult->has('analysis_sample') ? $this->Html->link($analysisResult->analysis_sample->id, ['controller' => 'AnalysisSamples', 'action' => 'view', $analysisResult->analysis_sample->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Analysis Type') ?></th>
            <td><?php echo  $analysisResult->has('analysis_type') ? $this->Html->link($analysisResult->analysis_type->name, ['controller' => 'AnalysisTypes', 'action' => 'view', $analysisResult->analysis_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Id') ?></th>
            <td><?php echo  $this->Number->format($analysisResult->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Ppm') ?></th>
            <td><?php echo  $this->Number->format($analysisResult->ppm) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Date Register') ?></th>
            <td><?php echo  h($analysisResult->date_register) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Status') ?></th>
            <td><?php echo  $analysisResult->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
