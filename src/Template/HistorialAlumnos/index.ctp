<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Historial Alumno'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="historialAlumnos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('fecha') ?></th>
            <th><?= $this->Paginator->sort('tipo') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($historialAlumnos as $historialAlumno): ?>
        <tr>
            <td><?= $this->Number->format($historialAlumno->id) ?></td>
            <td>
                <?= $historialAlumno->has('user') ? $this->Html->link($historialAlumno->user->id, ['controller' => 'Users', 'action' => 'view', $historialAlumno->user->id]) : '' ?>
            </td>
            <td><?= h($historialAlumno->fecha) ?></td>
            <td><?= $this->Number->format($historialAlumno->tipo) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $historialAlumno->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $historialAlumno->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $historialAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historialAlumno->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
