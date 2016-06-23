<div class="actions columns large-2 medium-3">
    <h3><?= __('Acciones') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Html->link(__('Nuevo pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <?php if( isset($is_admin) && $is_admin == 1 ) { ?>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('Fechas de Examen'), ['action' => 'studentsToExam']) ?></li>
        <li><?= $this->Html->link(__('Agregar Pago'), ['controller' => 'Pagos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Grados'), ['controller' => 'Grados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Grado'), ['controller' => 'Grados', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Clases'), ['controller' => 'Clases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Clase'), ['controller' => 'Clases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Convenios Usuarios'), ['controller' => 'ConveniosUsuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Convenios Usuario'), ['controller' => 'ConveniosUsuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Desvinculaciones'), ['controller' => 'Desvinculaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Desvinculacione'), ['controller' => 'Desvinculaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Historial Alumnos'), ['controller' => 'HistorialAlumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Historial Alumno'), ['controller' => 'HistorialAlumnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Pagos'), ['controller' => 'Pagos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Lista de Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <?php } ?>
        <li><?= $this->Html->link(__('Salir'), ['action' => 'logout']) ?></li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2>Perfil de <?= h($user->nombre) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nombre de usuario') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Telefono') ?></h6>
            <p><?= h($user->telefono) ?></p>
            <h6 class="subheader"><?= __('Rol') ?></h6>
            <p><?= h($user->rol) ?></p>
            <h6 class="subheader"><?= __('Grado') ?></h6>
            <p><?= $user->has('grado') ? $this->Html->link($user->grado->grado, ['controller' => 'Grados', 'action' => 'view', $user->grado->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Referencia') ?></h6>
            <p><?= h($user->referencia) ?></p>
            <h6 class="subheader"><?= __('Estado') ?></h6>
            <p><?= h($estado) ?></p>
            <h6 class="subheader"><?= __('Nombre Apoderado') ?></h6>
            <p><?= h($user->nombre_apoderado) ?></p>
            <h6 class="subheader"><?= __('Telefono Apoderado') ?></h6>
            <p><?= h($user->telefono_apoderado) ?></p>
            <h6 class="subheader"><?= __('Profesión') ?></h6>
            <p><?= h($user->profesion) ?></p>
            <h6 class="subheader"><?= __('En caso de emergencia llevar a') ?></h6>
            <p><?= h($user->llevar_a) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Mensualidad') ?></h6>
            <p><?= $this->Number->format($user->monto_paga) ?></p>
            <h6 class="subheader"><?= __('Pagado por') ?></h6>
            <p><?= h($user->id_user_referencia) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha de Ingreso') ?></h6>
            <p><?= h($user->fecha_ing) ?></p>
            <h6 class="subheader"><?= __('Fecha ultimo ascenso') ?></h6>
            <p><?= h($user->fecha_ult_acenso) ?></p>
            <h6 class="subheader"><?= __('Fecha Nacimiento') ?></h6>
            <p><?= h($user->fecha_nac) ?></p>
        </div>
    </div>
    <?php if( isset($is_admin) && $is_admin == 1 ) { ?>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Observaciones de salud') ?></h6>
            <?= $this->Text->autoParagraph(h($user->nota_salud)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Observaciones') ?></h6>
            <?= $this->Text->autoParagraph(h($user->observaciones)) ?>
        </div>
    </div>
    <?php } ?>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Foto') ?></h6>
            <?= $this->Text->autoParagraph(h($user->foto)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Convenios') ?></h4>
    <?php if (!empty($user->convenios_usuarios)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Convenio Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->convenios_usuarios as $conveniosUsuarios): ?>
        <tr>
            <td><?= h($conveniosUsuarios->id) ?></td>
            <td><?= h($conveniosUsuarios->user_id) ?></td>
            <td><?= h($conveniosUsuarios->convenio_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['controller' => 'ConveniosUsuarios', 'action' => 'view', $conveniosUsuarios->id]) ?>
                <?php if( isset($is_admin) && $is_admin == 1 ): ?>
                <?= $this->Html->link(__('Editar'), ['controller' => 'ConveniosUsuarios', 'action' => 'edit', $conveniosUsuarios->id]) ?>

                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'ConveniosUsuarios', 'action' => 'delete', $conveniosUsuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conveniosUsuarios->id)]) ?>
                <?php endif;?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Historial') ?></h4>
    <?php if (!empty($user->historial_alumnos)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Fecha') ?></th>
            <th><?= __('Tipo') ?></th>
            <th><?= __('Descripcion') ?></th>
            <th><?= __('Logro') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->historial_alumnos as $historialAlumnos): ?>
        <tr>
            <td><?= h($historialAlumnos->id) ?></td>
            <td><?= h($historialAlumnos->user_id) ?></td>
            <td><?= h($historialAlumnos->fecha) ?></td>
            <td><?= h($historialAlumnos->tipo) ?></td>
            <td><?= h($historialAlumnos->descripcion) ?></td>
            <td><?= h($historialAlumnos->logro) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['controller' => 'HistorialAlumnos', 'action' => 'view', $historialAlumnos->id]) ?>
                <?php if( isset($is_admin) && $is_admin == 1 ): ?>
                <?= $this->Html->link(__('Editar'), ['controller' => 'HistorialAlumnos', 'action' => 'edit', $historialAlumnos->id]) ?>

                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'HistorialAlumnos', 'action' => 'delete', $historialAlumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historialAlumnos->id)]) ?>
                <?php endif; ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Pagos Realizados') ?></h4>
    <?php if (!empty($user->pagos)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Mes') ?></th>
            <th><?= __('Monto') ?></th>
            <th><?= __('Año') ?></th>
            <th><?= __('Fecha de Pago') ?></th>
            <th><?= __('Forma de Pago') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->pagos as $pagos): ?>
        <tr>
            <td><?= h($pagos->mes) ?></td>
            <td><?= h($pagos->monto) ?></td>
            <td><?= h($pagos->año) ?></td>
            <td><?= h($pagos->fecha_pago) ?></td>
            <td><?= h($pagos->forma_pago) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['controller' => 'Pagos', 'action' => 'view', $pagos->id]) ?>
                <?php if( isset($is_admin) && $is_admin == 1 ): ?>
                <?= $this->Html->link(__('Editar'), ['controller' => 'Pagos', 'action' => 'edit', $pagos->id]) ?>

                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Pagos', 'action' => 'delete', $pagos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagos->id)]) ?>
                <?php endif; ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Pedidos') ?></h4>
    <?php if (!empty($user->pedidos)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Producto') ?></th>
            <th><?= __('Fecha Pedido') ?></th>
            <th><?= __('Fecha Pago') ?></th>
            <th><?= __('Cantidad') ?></th>
            <th><?= __('Valor') ?></th>
            <th><?= __('Monto Pagado') ?></th>
            <th><?= __('Fecha de Entrega') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->pedidos as $pedidos): ?>
        <tr>
            <td><?= h($pedidos->id) ?></td>
            <td><?= h($pedidos->producto_id) ?></td>
            <td><?= h($pedidos->fecha_pedido) ?></td>
            <td><?= h($pedidos->fecha_pago) ?></td>
            <td><?= h($pedidos->cantidad) ?></td>
            <td><?= h($pedidos->valor) ?></td>
            <td><?= h($pedidos->monto_pagado) ?></td>
            <td><?= h($pedidos->fecha_entrega) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['controller' => 'Pedidos', 'action' => 'view', $pedidos->id]) ?>
                <?php if( isset($is_admin) && $is_admin == 1 ): ?>
                <?= $this->Html->link(__('Editar'), ['controller' => 'Pedidos', 'action' => 'edit', $pedidos->id]) ?>

                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Pedidos', 'action' => 'delete', $pedidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidos->id)]) ?>
                <?php endif; ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
