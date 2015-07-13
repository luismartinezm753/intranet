<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $historialAlumno->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $historialAlumno->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Historial Alumnos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="historialAlumnos form large-10 medium-9 columns">
    <?= $this->Form->create($historialAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Historial Alumno') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('fecha');
            echo $this->Form->input('tipo');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('logro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
