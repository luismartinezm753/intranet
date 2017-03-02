<div class="col-md-offset-1 col-lg-7">
    <?= $this->Form->create($sede) ?>
    <fieldset>
        <legend><?= __('Add Sede') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('direccion');
            echo $this->Form->input('telefono');
            echo $this->Form->input('comuna');
            echo $this->Form->input('ciudad');
            echo $this->Form->input('fecha_inicio');
            echo $this->Form->input('monto_arriendo');
            echo $this->Form->input('nombre_arrendador');
            echo $this->Form->input('mail_arrendador');
            echo $this->Form->input('telefono_arrendador');
            echo $this->Form->input('logo');
            echo $this->Form->input('escuela_id', ['options' => $escuelas]);
            echo $this->Form->input('director_id',['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
