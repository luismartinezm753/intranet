<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clase'), ['action' => 'edit', $clase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Clase'), ['action' => 'delete', $clase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sedes'), ['controller' => 'Sedes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sede'), ['controller' => 'Sedes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clases view large-9 medium-8 columns content">
    <h3><?= h($clase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Sede') ?></th>
            <td><?= $clase->has('sede') ? $this->Html->link($clase->sede->id, ['controller' => 'Sedes', 'action' => 'view', $clase->sede->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Horario') ?></th>
            <td><?= $clase->has('horario') ? $this->Html->link($clase->horario->id, ['controller' => 'Horarios', 'action' => 'view', $clase->horario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $clase->has('user') ? $this->Html->link($clase->user->full_name, ['controller' => 'Users', 'action' => 'view', $clase->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($clase->id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($clase->user_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Instructor Id') ?></th>
            <td><?= $this->Number->format($clase->instructor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ayudante1 Id') ?></th>
            <td><?= $this->Number->format($clase->ayudante1_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Inicio') ?></th>
            <td><?= h($clase->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Termino') ?></th>
            <td><?= h($clase->fecha_termino) ?></td>
        </tr>
    </table>
</div>
