<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Proveedores'), ['controller' => 'Proveedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Proveedore'), ['controller' => 'Proveedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="productos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('descripcion') ?></th>
            <th><?= $this->Paginator->sort('precio') ?></th>
            <th><?= $this->Paginator->sort('proveedor_id') ?></th>
            <th><?= $this->Paginator->sort('estado') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $this->Number->format($producto->id) ?></td>
            <td><?= h($producto->nombre) ?></td>
            <td><?= h($producto->descripcion) ?></td>
            <td><?= $this->Number->format($producto->precio) ?></td>
            <td>
                <?= $producto->has('proveedore') ? $this->Html->link($producto->proveedore->id, ['controller' => 'Proveedores', 'action' => 'view', $producto->proveedore->id]) : '' ?>
            </td>
            <td><?= h($producto->estado) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $producto->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $producto->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id)]) ?>
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
