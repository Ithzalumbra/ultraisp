<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usertypes'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usertype'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Analysis Samples'), ['controller' => 'AnalysisSamples', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysis Sample'), ['controller' => 'AnalysisSamples', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rut') ?></th>
            <td><?= h($user->rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usertype') ?></th>
            <td><?= $user->has('usertype') ? $this->Html->link($user->usertype->name, ['controller' => 'UserTypes', 'action' => 'view', $user->usertype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $user->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Analysis Samples') ?></h4>
        <?php if (!empty($user->analysis_samples)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('TemperatureSample') ?></th>
                <th scope="col"><?= __('QuantitySample') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Employee Rut') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->analysis_samples as $analysisSamples): ?>
            <tr>
                <td><?= h($analysisSamples->id) ?></td>
                <td><?= h($analysisSamples->date) ?></td>
                <td><?= h($analysisSamples->temperatureSample) ?></td>
                <td><?= h($analysisSamples->quantitySample) ?></td>
                <td><?= h($analysisSamples->user_id) ?></td>
                <td><?= h($analysisSamples->employee_rut) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AnalysisSamples', 'action' => 'view', $analysisSamples->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AnalysisSamples', 'action' => 'edit', $analysisSamples->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AnalysisSamples', 'action' => 'delete', $analysisSamples->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisSamples->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
