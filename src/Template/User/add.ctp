<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Analysissamples'), ['controller' => 'Analysissamples', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Analysissample'), ['controller' => 'Analysissamples', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="user form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('rut');
            echo $this->Form->control('name');
            echo $this->Form->control('password');
            echo $this->Form->control('address');
            echo $this->Form->control('email');
            echo $this->Form->control('usertype_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>