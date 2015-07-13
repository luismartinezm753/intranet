<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $desvinculacione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $desvinculacione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Desvinculaciones'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="desvinculaciones form large-10 medium-9 columns">
    <?= $this->Form->create($desvinculacione) ?>
    <fieldset>
        <legend><?= __('Edit Desvinculacione') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('fecha_egreso', ['empty' => true, 'default' => '']);
            echo $this->Form->input('motivo');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('monto_deuda');
            echo $this->Form->input('observaciones');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
