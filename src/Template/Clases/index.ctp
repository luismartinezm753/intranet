<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sedes'), ['controller' => 'Sedes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sede'), ['controller' => 'Sedes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['controller' => 'Horarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['controller' => 'Horarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clases index large-9 medium-8 columns content">
    <h3><?= __('Clases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('sede_id') ?></th>
                <th><?= $this->Paginator->sort('horario_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('instructor_id') ?></th>
                <th><?= $this->Paginator->sort('ayudante1_id') ?></th>
                <th><?= $this->Paginator->sort('ayudante2_id') ?></th>
                <th><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th><?= $this->Paginator->sort('fecha_termino') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clases as $clase): ?>
            <tr>
                <td><?= $this->Number->format($clase->id) ?></td>
                <td><?= $clase->has('sede') ? $this->Html->link($clase->sede->id, ['controller' => 'Sedes', 'action' => 'view', $clase->sede->id]) : '' ?></td>
                <td><?= $clase->has('horario') ? $this->Html->link($clase->horario->id, ['controller' => 'Horarios', 'action' => 'view', $clase->horario->id]) : '' ?></td>
                <td><?= $this->Number->format($clase->user_id) ?></td>
                <td><?= $this->Number->format($clase->instructor_id) ?></td>
                <td><?= $this->Number->format($clase->ayudante1_id) ?></td>
                <td><?= $clase->has('user') ? $this->Html->link($clase->user->full_name, ['controller' => 'Users', 'action' => 'view', $clase->user->id]) : '' ?></td>
                <td><?= h($clase->fecha_inicio) ?></td>
                <td><?= h($clase->fecha_termino) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?>
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
