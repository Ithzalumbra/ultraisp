<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisSample $analysisSample
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo  __('Actions') ?></li>
        <li><?php echo  $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $analysisSample->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $analysisSample->id)]
            )
        ?></li>
        <li><?php echo  $this->Html->link(__('List Analysis Samples'), ['action' => 'index']) ?></li>
        <li><?php echo  $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?php echo  $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="analysisSamples form large-9 medium-8 columns content">
    <?php echo  $this->Form->create($analysisSample) ?>
    <fieldset>
        <legend><?php echo  __('Edit Analysis Sample') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('temperatureSample');
            echo $this->Form->control('quantitySample');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('employee_rut');
        ?>
    </fieldset>
    <?php echo  $this->Form->button(__('Submit')) ?>
    <?php echo  $this->Form->end() ?>
</div>
