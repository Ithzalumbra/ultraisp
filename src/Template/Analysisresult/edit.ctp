<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysisresult $analysisresult
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $analysisresult->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $analysisresult->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Analysisresult'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="analysisresult form large-9 medium-8 columns content">
    <?= $this->Form->create($analysisresult) ?>
    <fieldset>
        <legend><?= __('Edit Analysisresult') ?></legend>
        <?php
            echo $this->Form->control('ppm');
            echo $this->Form->control('date_register');
            echo $this->Form->control('status');
            echo $this->Form->control('employee_rut');
            echo $this->Form->control('analysisSamples_id');
            echo $this->Form->control('analysisType_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
