<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pedidos view large-10 medium-9 columns">
    <h2><?= h($pedido->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $pedido->has('user') ? $this->Html->link($pedido->user->id, ['controller' => 'Users', 'action' => 'view', $pedido->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Producto') ?></h6>
            <p><?= $pedido->has('producto') ? $this->Html->link($pedido->producto->id, ['controller' => 'Productos', 'action' => 'view', $pedido->producto->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($pedido->id) ?></p>
            <h6 class="subheader"><?= __('Cantidad') ?></h6>
            <p><?= $this->Number->format($pedido->cantidad) ?></p>
            <h6 class="subheader"><?= __('Valor') ?></h6>
            <p><?= $this->Number->format($pedido->valor) ?></p>
            <h6 class="subheader"><?= __('Monto Pagado') ?></h6>
            <p><?= $this->Number->format($pedido->monto_pagado) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha Pedido') ?></h6>
            <p><?= h($pedido->fecha_pedido) ?></p>
            <h6 class="subheader"><?= __('Fecha Pago') ?></h6>
            <p><?= h($pedido->fecha_pago) ?></p>
            <h6 class="subheader"><?= __('Fecha Entrega') ?></h6>
            <p><?= h($pedido->fecha_entrega) ?></p>
        </div>
    </div>
</div>
