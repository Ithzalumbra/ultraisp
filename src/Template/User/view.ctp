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
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Analysissamples'), ['controller' => 'Analysissamples', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysissample'), ['controller' => 'Analysissamples', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="user view large-9 medium-8 columns content">
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
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usertype Id') ?></th>
            <td><?= $this->Number->format($user->usertype_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Analysissamples') ?></h4>
        <?php if (!empty($user->analysissamples)): ?>
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
            <?php foreach ($user->analysissamples as $analysissamples): ?>
            <tr>
                <td><?= h($analysissamples->id) ?></td>
                <td><?= h($analysissamples->date) ?></td>
                <td><?= h($analysissamples->temperatureSample) ?></td>
                <td><?= h($analysissamples->quantitySample) ?></td>
                <td><?= h($analysissamples->user_id) ?></td>
                <td><?= h($analysissamples->employee_rut) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Analysissamples', 'action' => 'view', $analysissamples->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Analysissamples', 'action' => 'edit', $analysissamples->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Analysissamples', 'action' => 'delete', $analysissamples->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysissamples->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
