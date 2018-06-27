<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysissample $analysissample
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Analysissamples'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="analysissamples form large-9 medium-8 columns content">
    <?= $this->Form->create($analysissample) ?>
    <fieldset>
        <legend><?= __('Add Analysissample') ?></legend>
        <?php
            echo $this->Form->control('date');
            echo $this->Form->control('temperatureSample');
            echo $this->Form->control('quantitySample');
            echo $this->Form->control('user_id');
            echo $this->Form->control('employee_rut');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
