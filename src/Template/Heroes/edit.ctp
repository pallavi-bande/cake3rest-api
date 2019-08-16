<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hero $hero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $hero->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $hero->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Heroes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="heroes form large-9 medium-8 columns content">
    <?= $this->Form->create($hero) ?>
    <fieldset>
        <legend><?= __('Edit Hero') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
