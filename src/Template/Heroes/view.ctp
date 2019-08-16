<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hero $hero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hero'), ['action' => 'edit', $hero->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hero'), ['action' => 'delete', $hero->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hero->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Heroes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hero'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="heroes view large-9 medium-8 columns content">
    <h3><?= h($hero->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($hero->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($hero->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($hero->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($hero->modified) ?></td>
        </tr>
    </table>
</div>
