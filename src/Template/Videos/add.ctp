<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Videos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Grados'), ['controller' => 'Grados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grado'), ['controller' => 'Grados', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="videos form large-9 medium-8 columns content">
    <?= $this->Form->create($video) ?>
    <fieldset>
        <legend><?= __('Add Video') ?></legend>
        <?php
            echo $this->Form->input('grado_id', ['options' => $grados]);
            echo $this->Form->input('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
