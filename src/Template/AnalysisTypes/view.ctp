<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnalysisType $analysisType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?php echo __('Actions') ?></li>
        <li><?php echo $this->Html->link(__('Edit Analysis Type'), ['action' => 'edit', $analysisType->id]) ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Analysis Type'), ['action' => 'delete', $analysisType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $analysisType->id)]) ?> </li>
        <li><?php echo $this->Html->link(__('List Analysis Types'), ['action' => 'index']) ?> </li>
        <li><?php echo $this->Html->link(__('New Analysis Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="analysisTypes view large-9 medium-8 columns content">
    <h3><?php echo h($analysisType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?php echo __('Name') ?></th>
            <td><?php echo h($analysisType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?php echo __('Id') ?></th>
            <td><?php echo $this->Number->format($analysisType->id) ?></td>
        </tr>
    </table>
</div>
