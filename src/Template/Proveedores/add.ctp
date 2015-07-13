<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Proveedores'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="proveedores form large-10 medium-9 columns">
    <?= $this->Form->create($proveedore) ?>
    <fieldset>
        <legend><?= __('Add Proveedore') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('email');
            echo $this->Form->input('telefono');
            echo $this->Form->input('direccion');
            echo $this->Form->input('pagina_web');
            echo $this->Form->input('ciudad');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
