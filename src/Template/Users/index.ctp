<div class="actions columns large-2 medium-3">
    <h3><?= __('Acciones') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Fechas de Examen'), ['action' => 'studentsToExam']) ?></li>
        <li><?= $this->Html->link(__('Lista de Grados'), ['controller' => 'Grados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Grado'), ['controller' => 'Grados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Convenios Usuarios'), ['controller' => 'ConveniosUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Convenios Usuario'), ['controller' => 'ConveniosUsuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Desvinculaciones'), ['controller' => 'Desvinculaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Desvinculacione'), ['controller' => 'Desvinculaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Historial Alumnos'), ['controller' => 'HistorialAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Historial Alumno'), ['controller' => 'HistorialAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Pagos'), ['controller' => 'Pagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Pago'), ['controller' => 'Pagos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Salir'), ['action' => 'logout']) ?></li>
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('telefono') ?></th>
            <th><?= $this->Paginator->sort('rol') ?></th>
            <th><?= $this->Paginator->sort('fecha de ingreso') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->nombre) ?></td>
            <td><?= h($user->telefono) ?></td>
            <td><?= h($user->rol) ?></td>
            <td><?= h($user->fecha_ing) ?></td>
            <td class="actions">
                <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class'=>'fa fa-search']) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $user->id],['class'=>'fa fa-pencil']) ?>
                <?= $this->Html->link(__(''),['action'=>'archiveUser',$user->id],['class'=>'fa fa-archive']) ?>
                <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id], ['class'=>'fa fa-trash'],['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?= $this->Html->link(_('Agregar Usuario'),['action' => 'add'],['class'=>'button']) ?>
    <?php if(abs($archived-1)==0){ ?>
        <?= $this->Html->link(_('Ver Usuarios Archivados'),['action' => 'index',abs($archived-1)],['class'=>'button']) ?>
    <?php }else{ ?>
        <?= $this->Html->link(_('Ver Usuarios Activos'),['action' => 'index',abs($archived-1)],['class'=>'button']) ?>
    <?php } ?>
</div>
