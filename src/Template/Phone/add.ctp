<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Phone $phone
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Phone'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="phone form large-9 medium-8 columns content">
    <?= $this->Form->create($phone) ?>
    <fieldset>
        <legend><?= __('Add Phone') ?></legend>
        <?php
            echo $this->Form->control('phone');
            echo $this->Form->control('particular_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
