<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Productos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Proveedores'), ['controller' => 'Proveedores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Proveedore'), ['controller' => 'Proveedores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="productos form large-10 medium-9 columns">
    <?= $this->Form->create($producto) ?>
    <fieldset>
        <legend><?= __('Add Producto') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('precio');
            echo $this->Form->input('proveedor_id', ['options' => $proveedores]);
            echo $this->Form->input('estado');
            echo $this->Form->input('imagen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
