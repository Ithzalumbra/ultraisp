<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Usertypes'), ['controller' => 'UserTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usertype'), ['controller' => 'UserTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Analysis Samples'), ['controller' => 'AnalysisSamples', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Analysis Sample'), ['controller' => 'AnalysisSamples', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('rut');
            echo $this->Form->control('name');
            echo $this->Form->control('password');
            echo $this->Form->control('address');
            echo $this->Form->control('email');
            echo $this->Form->control('status');
            echo $this->Form->control('usertype_id', ['options' => $usertypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
