<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysistype $analysistype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Analysistype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="analysistype form large-9 medium-8 columns content">
    <?= $this->Form->create($analysistype) ?>
    <fieldset>
        <legend><?= __('Add Analysistype') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
