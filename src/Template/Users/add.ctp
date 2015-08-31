<div class="actions columns large-2 medium-3">
    <h3><?= __('Acciones') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Lista de Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Grados'), ['controller' => 'Grados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Grado'), ['controller' => 'Grados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Convenios Usuarios'), ['controller' => 'ConveniosUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Convenios Usuario'), ['controller' => 'ConveniosUsuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Desvinculaciones'), ['controller' => 'Desvinculaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Desvinculacion'), ['controller' => 'Desvinculaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Historial Alumnos'), ['controller' => 'HistorialAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Historial Alumno'), ['controller' => 'HistorialAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Pagos'), ['controller' => 'Pagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Pago'), ['controller' => 'Pagos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Agrega Nuevo Usuario') ?></legend>
        <?php
            echo $this->Form->input('nombre', ['label'=>'Nombre Completo']);
            echo $this->Form->input('fecha_nac',['label'=>'Fecha de Nacimiento']);
            echo $this->Form->input('username',['label'=>'Nombre de Usuario']);
            echo $this->Form->input('email');
            echo $this->Form->input('password', ['label'=>'Contraseña']);
            echo $this->Form->input('telefono');
            echo $this->Form->input('rol', ['options' =>['Alumno'=>'Alumno', 'Monitor'=>'Monitor','Instructor'=>'Instructor']]);
            echo $this->Form->input('fecha_ing',['label'=>'Fecha de Ingreso']);
            echo $this->Form->input('profesion');
            echo $this->Form->input('grado_id', ['options' => $grados]);
            echo $this->Form->input('referencia');
            echo $this->Form->input('estado', ['options' =>[0=>'Activo',1=>'Inactivo']]);
            echo $this->Form->input('fecha_ult_acenso', ['label'=>'Fecha último ascenso','empty' => true, 'default' => '']);
            echo $this->Form->input('nombre_apoderado', ['empty' => true, 'default' => 'No tiene Apoderado']);
            echo $this->Form->input('telefono_apoderado',  ['empty' => true, 'default' => '']);
            echo $this->Form->input('nota_salud',['label'=>'Información de Salud', 'empty' => true, 'default' => 'No presenta Complicaciones']);
            echo $this->Form->input('llevar_a', ['label'=>'En caso de Emergencia', 'empty' => true, 'default' => '']);
            echo $this->Form->input('monto_paga',['label'=>'Mensualidad']);
            echo $this->Form->input('id_user_referencia', ['label'=>'Quien Paga', 'empty' => true, 'options'=>$id_users_ref, 'default' => '']);
            echo $this->Form->input('observaciones', ['empty' => true, 'default' => 'No tiene observaciones']);
            echo $this->Form->input('fecha_cambio_password', ['label'=>'Fecha de Cambio de contraseña','empty' => true, 'default' => '']);
            echo $this->Form->file('foto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
