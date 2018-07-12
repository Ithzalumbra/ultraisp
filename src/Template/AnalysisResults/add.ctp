<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisResult $analysisResult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo  __('Actions') ?></li>
        <li><?php echo  $this->Html->link(__('List Analysis Results'), ['action' => 'index']) ?></li>
        <li><?php echo  $this->Html->link(__('List Analysis Samples'), ['controller' => 'AnalysisSamples', 'action' => 'index']) ?></li>
        <li><?php echo  $this->Html->link(__('New Analysis Sample'), ['controller' => 'AnalysisSamples', 'action' => 'add']) ?></li>
        <li><?php echo  $this->Html->link(__('List Analysis Types'), ['controller' => 'AnalysisTypes', 'action' => 'index']) ?></li>
        <li><?php echo  $this->Html->link(__('New Analysis Type'), ['controller' => 'AnalysisTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="analysisResults form large-9 medium-8 columns content">
    <?php echo  $this->Form->create($analysisResult) ?>
    <fieldset>
        <legend><?php echo  __('Add Analysis Result') ?></legend>
        <?php
            echo $this->Form->control('ppm');
            echo $this->Form->control('date_register');
            echo $this->Form->control('status');
            echo $this->Form->control('employee_rut');
            echo $this->Form->control('analysisSamples_id', ['options' => $analysisSamples]);
            echo $this->Form->control('analysisType_id', ['options' => $analysisTypes]);
        ?>
    </fieldset>
    <?php echo  $this->Form->button(__('Submit')) ?>
    <?php echo  $this->Form->end() ?>
</div>
