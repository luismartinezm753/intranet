<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clase->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sedes'), ['controller' => 'Sedes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sede'), ['controller' => 'Sedes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clases form large-9 medium-8 columns content">
    <?= $this->Form->create($clase) ?>
    <fieldset>
        <legend><?= __('Edit Clase') ?></legend>
        <?php
            echo $this->Form->input('sede_id', ['options' => $sedes]);
            echo $this->Form->input('horario_id', ['options' => $horarios]);
            echo $this->Form->input('user_id');
            echo $this->Form->input('instructor_id');
            echo $this->Form->input('ayudante1_id');
            echo $this->Form->input('ayudante2_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('fecha_inicio', ['empty' => true]);
            echo $this->Form->input('fecha_termino', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
