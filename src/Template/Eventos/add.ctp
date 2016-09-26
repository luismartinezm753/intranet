<div class="col-lg-6 col-lg-offset-1">
    <?= $this->Form->create($evento) ?>
    <fieldset>
        <legend><?= __('Agregar Evento') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('fecha_inicio');
            echo $this->Form->input('fecha_termino', ['empty' => true]);
            echo $this->Form->input('Precio');
            echo $this->Form->input('region',['label'=>'Región']);
            echo $this->Form->input('comuna');
            echo $this->Form->input('direccion',['label'=>'Dirección']);
            echo $this->Form->input('userrole',['label'=>'Usuarios','options' =>['Alumno'=>'Alumno', 'Monitor'=>'Monitor','Instructor'=>'Instructor']]);
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
