<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hero $hero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Heroes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="heroes form large-9 medium-8 columns content">
    <?= $this->Form->create($hero) ?>
    <fieldset>
        <legend><?= __('Add Hero') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
