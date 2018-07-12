<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo  __('Actions') ?></li>
        <li><?php echo  $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?php echo  $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?php echo  $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?php echo  $this->Html->link(__('List Usertypes'), ['controller' => 'UserTypes', 'action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New Usertype'), ['controller' => 'UserTypes', 'action' => 'add']) ?> </li>
        <li><?php echo  $this->Html->link(__('List Analysis Samples'), ['controller' => 'AnalysisSamples', 'action' => 'index']) ?> </li>
        <li><?php echo  $this->Html->link(__('New Analysis Sample'), ['controller' => 'AnalysisSamples', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?php echo  h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo  __('Rut') ?></th>
            <td><?php echo  h($user->rut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Name') ?></th>
            <td><?php echo  h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Password') ?></th>
            <td><?php echo  h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Address') ?></th>
            <td><?php echo  h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Email') ?></th>
            <td><?php echo  h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Usertype') ?></th>
            <td><?php echo  $user->has('usertype') ? $this->Html->link($user->usertype->name, ['controller' => 'UserTypes', 'action' => 'view', $user->usertype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Id') ?></th>
            <td><?php echo  $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo  __('Status') ?></th>
            <td><?php echo  $user->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?php echo  __('Related Analysis Samples') ?></h4>
        <?php   if (!empty($user->analysis_samples)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?php echo  __('Id') ?></th>
                <th scope="col"><?php echo  __('Date') ?></th>
                <th scope="col"><?php echo  __('TemperatureSample') ?></th>
                <th scope="col"><?php echo  __('QuantitySample') ?></th>
                <th scope="col"><?php echo  __('User Id') ?></th>
                <th scope="col"><?php echo  __('Employee Rut') ?></th>
                <th scope="col" class="actions"><?php echo  __('Actions') ?></th>
            </tr>
            <?php   foreach ($user->analysis_samples as $analysisSamples): ?>
            <tr>
                <td><?php echo  h($analysisSamples->id) ?></td>
                <td><?php echo  h($analysisSamples->date) ?></td>
                <td><?php echo  h($analysisSamples->temperatureSample) ?></td>
                <td><?php echo  h($analysisSamples->quantitySample) ?></td>
                <td><?php echo  h($analysisSamples->user_id) ?></td>
                <td><?php echo  h($analysisSamples->employee_rut) ?></td>
                <td class="actions">
                    <?php echo  $this->Html->link(__('View'), ['controller' => 'AnalysisSamples', 'action' => 'view', $analysisSamples->id]) ?>
                    <?php echo  $this->Html->link(__('Edit'), ['controller' => 'AnalysisSamples', 'action' => 'edit', $analysisSamples->id]) ?>
                    <?php echo  $this->Form->postLink(__('Delete'), ['controller' => 'AnalysisSamples', 'action' => 'delete', $analysisSamples->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisSamples->id)]) ?>
                </td>
            </tr>
            <?php   endforeach; ?>
        </table>
        <?php   endif; ?>
    </div>
</div>
