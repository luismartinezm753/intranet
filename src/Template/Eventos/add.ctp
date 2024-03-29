<div class="col-lg-6 col-lg-offset-1">
    <?= $this->Form->create($evento) ?>
    <fieldset>
        <legend><?= __('Agregar Evento') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('fecha_inicio');
            echo $this->Form->input('fecha_termino', ['empty' => true]);
            echo $this->Form->input('ubicacion');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('price',['label'=>'Precio']);
            echo $this->Form->input('user_rol',['label'=>'Tipo de Usuario','options'=>['Instructor', 'Monitor','Alumno']]);
            echo $this->Form->input('notify_users',['label'=>'Notificar Usuarios','type'=>'checkbox'])
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
