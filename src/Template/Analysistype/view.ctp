<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Analysistype $analysistype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Analysistype'), ['action' => 'edit', $analysistype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Analysistype'), ['action' => 'delete', $analysistype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysistype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Analysistype'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Analysistype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="analysistype view large-9 medium-8 columns content">
    <h3><?= h($analysistype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($analysistype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($analysistype->id) ?></td>
        </tr>
    </table>
</div>
