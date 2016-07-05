<div class="users view large-10 medium-9 columns col-md-offset-2">
    <h2>Perfil de <?= h($user->nombre) ?></h2>
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Información Personal</strong></div>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th><?= __('Nombre de usuario') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Teléfono') ?></th>
                    <td><?= h($user->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rol') ?></th>
                    <td><?= h($user->rol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Grado') ?></th>
                    <td><?= $user->has('grado') ? $this->Html->link($user->grado->grado, ['controller' => 'Grados', 'action' => 'view', $user->grado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Referencia') ?></th>
                    <td><?= h($user->referencia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estado') ?></th>
                    <td><?= h($estado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Profesión') ?></th>
                    <td><?= h($user->profesion) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Fecha de Ingreso') ?></th>
                    <td><?= h($user->fecha_ing) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Fecha ultimo ascenso') ?></th>
                    <td><?= h($user->fecha_ult_acenso) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Fecha Nacimiento') ?></th>
                    <td><?= h($user->fecha_nac) ?></td>
                </tr>
                </tbody>
            </table>
        </div><!-- panel-->
    </div><!--col-lg-8-->
    <div class="col-lg-5">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Información de Pago</strong></div>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th><?= __('Mensualidad') ?></th>
                    <td><?= $this->Number->format($user->monto_paga) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Pagado por') ?></th>
                    <td><?= h($user->id_user_referencia) ?></td>
                </tr>
                </tbody>
            </table>
        </div><!--panel-primary-->
    </div><!--col-lg-5-->
        <?php if($user->nombre_apoderado != 'No tiene Apoderado'): ?>
            <div class="col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading"><strong>Información Apoderado</strong></div>
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th><?= __('Nombre Apoderado') ?></th>
                            <td><?= h($user->nombre_apoderado) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Teléfono Apoderado') ?></th>
                            <td><?= h($user->telefono_apoderado) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('En caso de emergencia llevar a') ?></th>
                            <td><?= h($user->llevar_a) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div><!--panel-primary-->
            </div><!--col-lg-6-->
        <?php endif; ?>
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
