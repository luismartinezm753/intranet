<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Historial Alumno'), ['action' => 'edit', $historialAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Historial Alumno'), ['action' => 'delete', $historialAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historialAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Historial Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historial Alumno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="historialAlumnos view large-10 medium-9 columns">
    <h2><?= h($historialAlumno->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $historialAlumno->has('user') ? $this->Html->link($historialAlumno->user->id, ['controller' => 'Users', 'action' => 'view', $historialAlumno->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($historialAlumno->id) ?></p>
            <h6 class="subheader"><?= __('Tipo') ?></h6>
            <p><?= $this->Number->format($historialAlumno->tipo) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha') ?></h6>
            <p><?= h($historialAlumno->fecha) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Descripcion') ?></h6>
            <?= $this->Text->autoParagraph(h($historialAlumno->descripcion)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Logro') ?></h6>
            <?= $this->Text->autoParagraph(h($historialAlumno->logro)) ?>
        </div>
    </div>
</div>
