<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pago->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pagos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="pagos form large-10 medium-9 columns">
    <?= $this->Form->create($pago) ?>
    <fieldset>
        <legend><?= __('Edit Pago') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('mes', ['type' => 'month']);
            echo $this->Form->input('monto');
            echo $this->Form->input('año', ['type' => 'year', [
                'minYear' => date('Y')-2,
                'maxYear' => date('Y')+2
            ]]);
            echo $this->Form->input('fecha_pago');
            echo $this->Form->input('forma_pago', ['options'=>['Efectivo'=>'Efectivo','Transferencia'=>'Transferencia','Cheque'=>'Cheque']]);
            echo $this->Form->input('observacion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
