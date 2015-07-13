<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $grado->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $grado->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grados'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="grados form large-10 medium-9 columns">
    <?= $this->Form->create($grado) ?>
    <fieldset>
        <legend><?= __('Edit Grado') ?></legend>
        <?php
            echo $this->Form->input('grado');
            echo $this->Form->input('programa');
            echo $this->Form->input('video');
            echo $this->Form->input('duracion_mes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
