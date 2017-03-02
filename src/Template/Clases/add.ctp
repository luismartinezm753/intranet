<div class="col-md-offset-1 col-lg-7">
    <?= $this->Form->create($clase) ?>
    <fieldset>
        <legend><?= __('Agregar Clase') ?></legend>
        <?php
            echo $this->Form->input('sede_id', ['options' => $sedes]);
            echo $this->Form->input('horario_id', ['options' => $horarios]);
            echo $this->Form->input('instructor_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('ayudante1_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('ayudante2_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('fecha_inicio', ['empty' => true]);
            echo $this->Form->input('fecha_termino', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
