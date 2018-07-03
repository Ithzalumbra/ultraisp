<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisType $analysisType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Analysis Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="analysisTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($analysisType) ?>
    <fieldset>
        <legend><?= __('Add Analysis Type') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
