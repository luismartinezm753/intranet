<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="pedidos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('producto_id') ?></th>
            <th><?= $this->Paginator->sort('fecha_pedido') ?></th>
            <th><?= $this->Paginator->sort('fecha_pago') ?></th>
            <th><?= $this->Paginator->sort('cantidad') ?></th>
            <th><?= $this->Paginator->sort('valor') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pedidos as $pedido): ?>
        <tr>
            <td><?= $this->Number->format($pedido->id) ?></td>
            <td>
                <?= $pedido->has('user') ? $this->Html->link($pedido->user->id, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '' ?>
            </td>
            <td>
                <?= $pedido->has('producto') ? $this->Html->link($pedido->producto->id, ['controller' => 'Productos', 'action' => 'view', $pedido->producto->id]) : '' ?>
            </td>
            <td><?= h($pedido->fecha_pedido) ?></td>
            <td><?= h($pedido->fecha_pago) ?></td>
            <td><?= $this->Number->format($pedido->cantidad) ?></td>
            <td><?= $this->Number->format($pedido->valor) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $pedido->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
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
