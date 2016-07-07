<div class="col-md-offset-2">
    <div class="users view large-10 medium-9 columns">
        <h2>Perfil de <?= h($user->full_name) ?></h2>
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
                    <?php if( isset($is_admin) && $is_admin == 1 ): ?>
                        <tr>
                            <th class="subheader"><?= __('Observaciones de salud') ?></th>
                            <td><?= $this->Text->autoParagraph(h($user->nota_salud)) ?></td>
                        </tr>
                        <tr>
                            <th ><?= __('Observaciones') ?></th>
                            <td><?= $this->Text->autoParagraph(h($user->observaciones)) ?></td>
                        </tr>
                    <?php endif; ?>
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
                <div class="col-lg-6">
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
    </div>
    <div class="related row col-lg-10">
        <div class="column large-12">
        <h4 class="subheader"><?= __('Pagos Realizados') ?></h4>
        <?php if (!empty($user->pagos)): ?>
        <table class="table table-bordered table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th class="bg-primary"><?= __('Mes') ?></th>
                <th class="bg-primary"><?= __('Monto') ?></th>
                <th class="bg-primary"><?= __('Año') ?></th>
                <th class="bg-primary"><?= __('Fecha de Pago') ?></th>
                <th class="bg-primary"><?= __('Forma de Pago') ?></th>
                <th class="actions bg-primary"><?= __('Acciones') ?></th>
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
        <?php else:?>
            <p>No hay pagos registrados</p>
        <?php endif; ?>
        </div>
    </div>
    <div class="related row col-lg-10">
        <div class="column large-12">
        <h4 class="subheader"><?= __('Pedidos') ?></h4>
        <?php if (!empty($user->pedidos)): ?>
        <table class="table table-bordered table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th class="bg-primary"><?= __('Id') ?></th>
                <th class="bg-primary"><?= __('Producto') ?></th>
                <th class="bg-primary"><?= __('Fecha Pedido') ?></th>
                <th class="bg-primary"><?= __('Fecha Pago') ?></th>
                <th class="bg-primary"><?= __('Cantidad') ?></th>
                <th class="bg-primary"><?= __('Valor') ?></th>
                <th class="bg-primary"><?= __('Monto Pagado') ?></th>
                <th class="bg-primary"><?= __('Fecha de Entrega') ?></th>
                <th class="bg-primary"><?= __('Acciones') ?></th>
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
        <?php else: ?>
            <p>No hay pedidos registrados</p>
        <?php endif; ?>
        </div>
        <?= $this->Html->link(__('Editar Perfil'), ['action' => 'edit', $user->id],['class'=>'btn btn-primary']) ?>
    </div>
</div><!--col-md-offset-2-->
