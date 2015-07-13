<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Pedidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="pedidos form large-10 medium-9 columns">
    <?= $this->Form->create($pedido) ?>
    <fieldset>
        <legend><?= __('Add Pedido') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('producto_id', ['options' => $productos]);
            echo $this->Form->input('fecha_pedido', ['empty' => true, 'default' => '']);
            echo $this->Form->input('fecha_pago', ['empty' => true, 'default' => '']);
            echo $this->Form->input('cantidad');
            echo $this->Form->input('valor');
            echo $this->Form->input('monto_pagado');
            echo $this->Form->input('fecha_entrega', ['empty' => true, 'default' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
