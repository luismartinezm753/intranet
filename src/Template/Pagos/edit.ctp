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
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
