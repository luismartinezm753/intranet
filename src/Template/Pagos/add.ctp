<div class="pagos form col-lg-offset-2 col-lg-7">
    <?= $this->Form->create($pago) ?>
    <fieldset>
        <legend><?= __('Agregar Pago') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('mes', ['type' => 'month','selected'=>'0']);
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
    <?= $this->Form->button(__('Agregar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
