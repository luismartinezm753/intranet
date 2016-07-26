<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $horario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horarios form large-9 medium-8 columns content">
    <?= $this->Form->create($horario) ?>
    <fieldset>
        <legend><?= __('Edit Horario') ?></legend>
        <?php
            echo $this->Form->input('dia1');
            echo $this->Form->input('dia2');
            echo $this->Form->input('dia3');
            echo $this->Form->input('dia4');
            echo $this->Form->input('horario_inicio1');
            echo $this->Form->input('horario_inicio2', ['empty' => true]);
            echo $this->Form->input('horario_inicio3', ['empty' => true]);
            echo $this->Form->input('horario_inicio4', ['empty' => true]);
            echo $this->Form->input('horario_termino1');
            echo $this->Form->input('horario_termino2', ['empty' => true]);
            echo $this->Form->input('horario_termino3', ['empty' => true]);
            echo $this->Form->input('horario_termino4', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
