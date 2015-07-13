<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Grados'), ['controller' => 'Grados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Grado'), ['controller' => 'Grados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Convenios Usuarios'), ['controller' => 'ConveniosUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Convenios Usuario'), ['controller' => 'ConveniosUsuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Desvinculaciones'), ['controller' => 'Desvinculaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Desvinculacione'), ['controller' => 'Desvinculaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Historial Alumnos'), ['controller' => 'HistorialAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Historial Alumno'), ['controller' => 'HistorialAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos'), ['controller' => 'Pagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pago'), ['controller' => 'Pagos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('password') ?></th>
            <th><?= $this->Paginator->sort('telefono') ?></th>
            <th><?= $this->Paginator->sort('rol') ?></th>
            <th><?= $this->Paginator->sort('fecha_ing') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->password) ?></td>
            <td><?= h($user->telefono) ?></td>
            <td><?= h($user->rol) ?></td>
            <td><?= h($user->fecha_ing) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
