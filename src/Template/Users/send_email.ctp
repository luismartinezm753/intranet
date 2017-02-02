<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <div class="users form large-10 medium-9 columns">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Enviar Mensaje') ?></legend>
                <?php
                echo $this->Form->input('nombre', ['label'=>'Nombre']);
                echo $this->Form->input('apellido', ['label'=>'Apellido']);
                echo $this->Form->input('fecha_nac',['label'=>'Fecha de Nacimiento', 'minYear' => date('Y') - 70,
                    'maxYear' => date('Y') - 4 ]);
                echo $this->Form->input('username',['label'=>'Nombre de Usuario']);
                echo $this->Form->input('email');
                echo $this->Form->input('telefono');
                echo $this->Form->input('rol_id', ['options' =>['Director','Instructor', 'Monitor','Alumno']]);
                ?>
            </fieldset>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
            <?= $this->Form->button(__('Agregar'),['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
