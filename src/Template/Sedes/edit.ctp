<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sede->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sede->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sedes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Escuelas'), ['controller' => 'Escuelas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Escuela'), ['controller' => 'Escuelas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sedes form large-9 medium-8 columns content">
    <?= $this->Form->create($sede) ?>
    <fieldset>
        <legend><?= __('Edit Sede') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('direccion');
            echo $this->Form->input('telefono');
            echo $this->Form->input('director');
            echo $this->Form->input('comuna');
            echo $this->Form->input('ciudad');
            echo $this->Form->input('fecha_inicio');
            echo $this->Form->input('monto_arriendo');
            echo $this->Form->input('nombre_arrendador');
            echo $this->Form->input('mail_arrendador');
            echo $this->Form->input('telefono_arrendador');
            echo $this->Form->input('logo');
            echo $this->Form->input('escuela_id', ['options' => $escuelas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
