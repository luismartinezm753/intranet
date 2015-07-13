<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Proveedores'), ['controller' => 'Proveedores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proveedore'), ['controller' => 'Proveedores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="productos view large-10 medium-9 columns">
    <h2><?= h($producto->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nombre') ?></h6>
            <p><?= h($producto->nombre) ?></p>
            <h6 class="subheader"><?= __('Descripcion') ?></h6>
            <p><?= h($producto->descripcion) ?></p>
            <h6 class="subheader"><?= __('Proveedore') ?></h6>
            <p><?= $producto->has('proveedore') ? $this->Html->link($producto->proveedore->id, ['controller' => 'Proveedores', 'action' => 'view', $producto->proveedore->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($producto->id) ?></p>
            <h6 class="subheader"><?= __('Precio') ?></h6>
            <p><?= $this->Number->format($producto->precio) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Estado') ?></h6>
            <p><?= $producto->estado ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Imagen') ?></h6>
            <?= $this->Text->autoParagraph(h($producto->imagen)) ?>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Pedidos') ?></h4>
    <?php if (!empty($producto->pedidos)): ?>
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
        <?php foreach ($producto->pedidos as $pedidos): ?>
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
