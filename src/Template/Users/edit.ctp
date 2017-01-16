<div class="col-md-6 col-md-offset-2">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar Información') ?></legend>
        <?php
            echo $this->Form->input('nombre', ['label'=>'Nombre']);
            echo $this->Form->input('apellido', ['label'=>'Apellido']);
            echo $this->Form->input('fecha_nac',['label'=>'Fecha de Nacimiento', 'minYear' => date('Y') - 70,
                'maxYear' => date('Y') - 4 ]);
            echo $this->Form->input('email');
            echo $this->Form->input('telefono');
            if( $this->AuthUser->hasRole('instructor') || $this->AuthUser->hasRole('director')) {
                echo $this->Form->input('username',['label'=>'Nombre de Usuario']);
                echo $this->Form->input('rol', ['options' =>['Alumno'=>'Alumno', 'Monitor'=>'Monitor','Instructor'=>'Instructor']]);
                echo $this->Form->input('fecha_ing',['label'=>'Fecha de Ingreso']);
                echo $this->Form->input('profesion');
                echo $this->Form->input('grado_id', ['options' => $grados]);
                echo $this->Form->input('referencia');
                echo $this->Form->input('monto_paga',['label'=>'Mensualidad']);
                echo $this->Form->input('fecha_ult_acenso', ['label'=>'Fecha último ascenso','empty' => true, 'default' => '']);
                echo $this->Form->input('nota_salud',['label'=>'Información de Salud', 'empty' => true, 'default' => 'No presenta Complicaciones']);
                echo $this->Form->input('observaciones', ['empty' => true, 'default' => 'No tiene observaciones']);
                echo $this->Form->input('id_user_referencia', ['label'=>'Pagado Por', 'empty' => true, 'options'=>$id_users_ref, 'default' => '']);
            }
            echo $this->Form->input('llevar_a', ['label'=>'En caso de Emergencia', 'empty' => true, 'default' => '']);
            echo $this->Form->input('nombre_apoderado', ['empty' => true, 'default' => 'No tiene Apoderado']);
            echo $this->Form->input('telefono_apoderado',  ['empty' => true, 'default' => '']);
            echo $this->Form->file('foto');
        ?>
    </fieldset>
    <br>
    <?= $this->Form->button(__('Guardar Cambios'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'view', $user->id],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
