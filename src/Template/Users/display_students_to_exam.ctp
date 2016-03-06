<div class="actions columns large-2 medium-3">
    <h3><?= __('Acciones') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Nuevo Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Agregar Pago'), ['controller' => 'Pagos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Grados'), ['controller' => 'Grados', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Grado'), ['controller' => 'Grados', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Convenios Usuarios'), ['controller' => 'ConveniosUsuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Convenios Usuario'), ['controller' => 'ConveniosUsuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Desvinculaciones'), ['controller' => 'Desvinculaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Desvinculacione'), ['controller' => 'Desvinculaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Historial Alumnos'), ['controller' => 'HistorialAlumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Agregar Historial Alumno'), ['controller' => 'HistorialAlumnos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Lista de Pagos'), ['controller' => 'Pagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Salir'), ['action' => 'logout']) ?></li>

    </ul>
</div>
<div class="users form large-9 medium-9 columns">
<table>
<?php echo $this->Html->tableHeaders(['Nombre', 'Grado', 'Tiempo','Duracion del Grado']);
foreach ($result as $student) {
	echo '<br>';
	echo $this->Html->tableCells([
    	[$student['nombre'], $student['_matchingData']['Grados']['grado'], $student['diff']/30,$student['tiempo_grado']]
	]);
	//echo $student;
}
?>
</div>
</table>
<br>
<div class="users form large-9 medium-9 columns">
    <?= $this->Form->create('Users'); ?>
    <?= $this->Form->button('Escoger Otra Fecha',['controller' => 'Users', 'action' => 'studentsToExam']); ?>
    <?= $this->Form->end(); ?>
</div>