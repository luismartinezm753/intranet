<div class="col-lg-offset-2 col-lg-8">
    <h2>Alumnos para Examen</h2>
<table class="table table-bordered">
<?php echo $this->Html->tableHeaders(['Nombre', 'Grado', 'Tiempo','Duracion del Grado'],['class'=>'bg-primary']);
foreach ($result as $student) {
	echo '<br>';
	echo $this->Html->tableCells([
    	[$this->Html->link($student['nombre'], ['action' => 'view', $student['id']]), $student['_matchingData']['Grados']['grado'], $student['diff']/30,$student['tiempo_grado']]
	]);
	//echo $student;
}
?>
</table>
<br>
<div class="users form large-9 medium-9 columns">
    <?= $this->Form->create(''); ?>
    <?= $this->Form->button(__('Escoger Otra Fecha'),['controller' => 'Users', 'action' => 'studentsToExam'],['class'=>'btn btn-primary']); ?>
    <?= $this->Form->end(); ?>
</div>
</div>