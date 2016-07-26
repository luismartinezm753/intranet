<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Escuelas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sedes'), ['controller' => 'Sedes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sede'), ['controller' => 'Sedes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="escuelas form large-9 medium-8 columns content">
    <?= $this->Form->create($escuela) ?>
    <fieldset>
        <legend><?= __('Add Escuela') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('rut_tributario');
            echo $this->Form->input('estilo');
            echo $this->Form->input('representante');
            echo $this->Form->input('direccion');
            echo $this->Form->input('email');
            echo $this->Form->input('pagina_web');
            echo $this->Form->input('telefono1');
            echo $this->Form->input('telefono2');
            echo $this->Form->input('comuna');
            echo $this->Form->input('pais');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
