<div class="col-md-offset-1 col-lg-7">
    <?= $this->Form->create($horario) ?>
    <fieldset>
        <legend><?= __('Add Horario') ?></legend>
        <?php
            echo $this->Form->input('dia1');
            echo $this->Form->input('dia2');
            echo $this->Form->input('dia3');
            echo $this->Form->input('dia4');
            echo $this->Form->input('horario_inicio1');
            echo $this->Form->input('horario_inicio2', ['empty' => true]);
            echo $this->Form->input('horario_inicio3', ['empty' => true]);
            echo $this->Form->input('horario_inicio4', ['empty' => true]);
            echo $this->Form->input('horario_termino1');
            echo $this->Form->input('horario_termino2', ['empty' => true]);
            echo $this->Form->input('horario_termino3', ['empty' => true]);
            echo $this->Form->input('horario_termino4', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
