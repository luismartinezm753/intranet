<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grados'), ['controller' => 'Grados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grado'), ['controller' => 'Grados', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Convenios Usuarios'), ['controller' => 'ConveniosUsuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Convenios Usuario'), ['controller' => 'ConveniosUsuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Desvinculaciones'), ['controller' => 'Desvinculaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Desvinculacione'), ['controller' => 'Desvinculaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Historial Alumnos'), ['controller' => 'HistorialAlumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historial Alumno'), ['controller' => 'HistorialAlumnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pagos'), ['controller' => 'Pagos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pago'), ['controller' => 'Pagos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
            <h6 class="subheader"><?= __('Telefono') ?></h6>
            <p><?= h($user->telefono) ?></p>
            <h6 class="subheader"><?= __('Rol') ?></h6>
            <p><?= h($user->rol) ?></p>
            <h6 class="subheader"><?= __('Grado') ?></h6>
            <p><?= $user->has('grado') ? $this->Html->link($user->grado->id, ['controller' => 'Grados', 'action' => 'view', $user->grado->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Nombre') ?></h6>
            <p><?= h($user->nombre) ?></p>
            <h6 class="subheader"><?= __('Apellido') ?></h6>
            <p><?= h($user->apellido) ?></p>
            <h6 class="subheader"><?= __('Referencia') ?></h6>
            <p><?= h($user->referencia) ?></p>
            <h6 class="subheader"><?= __('Estado') ?></h6>
            <p><?= h($user->estado) ?></p>
            <h6 class="subheader"><?= __('Nombre Apoderado') ?></h6>
            <p><?= h($user->nombre_apoderado) ?></p>
            <h6 class="subheader"><?= __('Telefono Apoderado') ?></h6>
            <p><?= h($user->telefono_apoderado) ?></p>
            <h6 class="subheader"><?= __('Profesion') ?></h6>
            <p><?= h($user->profesion) ?></p>
            <h6 class="subheader"><?= __('Llevar A') ?></h6>
            <p><?= h($user->llevar_a) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
            <h6 class="subheader"><?= __('Monto Paga') ?></h6>
            <p><?= $this->Number->format($user->monto_paga) ?></p>
            <h6 class="subheader"><?= __('Id User Referencia') ?></h6>
            <p><?= $this->Number->format($user->id_user_referencia) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha Ing') ?></h6>
            <p><?= h($user->fecha_ing) ?></p>
            <h6 class="subheader"><?= __('Fecha Ult Acenso') ?></h6>
            <p><?= h($user->fecha_ult_acenso) ?></p>
            <h6 class="subheader"><?= __('Fecha Nac') ?></h6>
            <p><?= h($user->fecha_nac) ?></p>
            <h6 class="subheader"><?= __('Fecha Cambio Password') ?></h6>
            <p><?= h($user->fecha_cambio_password) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Nota Salud') ?></h6>
            <?= $this->Text->autoParagraph(h($user->nota_salud)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Observaciones') ?></h6>
            <?= $this->Text->autoParagraph(h($user->observaciones)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Foto') ?></h6>
            <?= $this->Text->autoParagraph(h($user->foto)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Clases') ?></h4>
    <?php if (!empty($user->clases)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Sede Id') ?></th>
            <th><?= __('Horario Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Instructor Id') ?></th>
            <th><?= __('Ayudante1 Id') ?></th>
            <th><?= __('Ayudante2 Id') ?></th>
            <th><?= __('Fecha Inicio') ?></th>
            <th><?= __('Fecha Termino') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->clases as $clases): ?>
        <tr>
            <td><?= h($clases->id) ?></td>
            <td><?= h($clases->sede_id) ?></td>
            <td><?= h($clases->horario_id) ?></td>
            <td><?= h($clases->user_id) ?></td>
            <td><?= h($clases->instructor_id) ?></td>
            <td><?= h($clases->ayudante1_id) ?></td>
            <td><?= h($clases->ayudante2_id) ?></td>
            <td><?= h($clases->fecha_inicio) ?></td>
            <td><?= h($clases->fecha_termino) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Clases', 'action' => 'view', $clases->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Clases', 'action' => 'edit', $clases->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clases', 'action' => 'delete', $clases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clases->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Convenios Usuarios') ?></h4>
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
                <?= $this->Html->link(__('View'), ['controller' => 'ConveniosUsuarios', 'action' => 'view', $conveniosUsuarios->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ConveniosUsuarios', 'action' => 'edit', $conveniosUsuarios->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ConveniosUsuarios', 'action' => 'delete', $conveniosUsuarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conveniosUsuarios->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Desvinculaciones') ?></h4>
    <?php if (!empty($user->desvinculaciones)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Fecha Egreso') ?></th>
            <th><?= __('Motivo') ?></th>
            <th><?= __('Descripcion') ?></th>
            <th><?= __('Monto Deuda') ?></th>
            <th><?= __('Observaciones') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->desvinculaciones as $desvinculaciones): ?>
        <tr>
            <td><?= h($desvinculaciones->id) ?></td>
            <td><?= h($desvinculaciones->user_id) ?></td>
            <td><?= h($desvinculaciones->fecha_egreso) ?></td>
            <td><?= h($desvinculaciones->motivo) ?></td>
            <td><?= h($desvinculaciones->descripcion) ?></td>
            <td><?= h($desvinculaciones->monto_deuda) ?></td>
            <td><?= h($desvinculaciones->observaciones) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Desvinculaciones', 'action' => 'view', $desvinculaciones->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Desvinculaciones', 'action' => 'edit', $desvinculaciones->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Desvinculaciones', 'action' => 'delete', $desvinculaciones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desvinculaciones->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Historial Alumnos') ?></h4>
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
                <?= $this->Html->link(__('View'), ['controller' => 'HistorialAlumnos', 'action' => 'view', $historialAlumnos->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'HistorialAlumnos', 'action' => 'edit', $historialAlumnos->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'HistorialAlumnos', 'action' => 'delete', $historialAlumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historialAlumnos->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Pagos') ?></h4>
    <?php if (!empty($user->pagos)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Mes') ?></th>
            <th><?= __('Monto') ?></th>
            <th><?= __('Año') ?></th>
            <th><?= __('Observacion') ?></th>
            <th><?= __('Fecha Pago') ?></th>
            <th><?= __('Forma Pago') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->pagos as $pagos): ?>
        <tr>
            <td><?= h($pagos->id) ?></td>
            <td><?= h($pagos->user_id) ?></td>
            <td><?= h($pagos->mes) ?></td>
            <td><?= h($pagos->monto) ?></td>
            <td><?= h($pagos->año) ?></td>
            <td><?= h($pagos->observacion) ?></td>
            <td><?= h($pagos->fecha_pago) ?></td>
            <td><?= h($pagos->forma_pago) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Pagos', 'action' => 'view', $pagos->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Pagos', 'action' => 'edit', $pagos->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pagos', 'action' => 'delete', $pagos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagos->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Pedidos') ?></h4>
    <?php if (!empty($user->pedidos)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Producto Id') ?></th>
            <th><?= __('Fecha Pedido') ?></th>
            <th><?= __('Fecha Pago') ?></th>
            <th><?= __('Cantidad') ?></th>
            <th><?= __('Valor') ?></th>
            <th><?= __('Monto Pagado') ?></th>
            <th><?= __('Fecha Entrega') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->pedidos as $pedidos): ?>
        <tr>
            <td><?= h($pedidos->id) ?></td>
            <td><?= h($pedidos->user_id) ?></td>
            <td><?= h($pedidos->producto_id) ?></td>
            <td><?= h($pedidos->fecha_pedido) ?></td>
            <td><?= h($pedidos->fecha_pago) ?></td>
            <td><?= h($pedidos->cantidad) ?></td>
            <td><?= h($pedidos->valor) ?></td>
            <td><?= h($pedidos->monto_pagado) ?></td>
            <td><?= h($pedidos->fecha_entrega) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Pedidos', 'action' => 'view', $pedidos->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Pedidos', 'action' => 'edit', $pedidos->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pedidos', 'action' => 'delete', $pedidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidos->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
