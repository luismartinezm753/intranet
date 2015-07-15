<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Grados'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="grados form large-10 medium-9 columns">
    <?= $this->Form->create($grado, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Grado') ?></legend>
        <?php
            echo $this->Form->input('grado');
            echo $this->Form->file('programa');
            echo $this->Form->input('video', ['label'=>'Link del video']);
            echo $this->Form->input('duracion_mes',['label'=>'Duración en Meses']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
