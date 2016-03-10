<table>
<?php 
echo $this->Html->tableHeaders(['Nombre','Ultimo Pago Registrado','Email','Monto Adeudado','Número de Meses','Enviar Notificación']);
foreach ($result as $payment) {
	echo $this->Html->tableCells([
    	[$payment['users']['nombre'], $payment['pagos']['mes']." ".$payment['pagos']['año'], $payment['users']['email'], $payment['pagos']['deuda'],$payment['pagos']['meses_deuda'],'Enviar mail']
	]);
	//echo $student;
}
?>
</table>
<div>
	<?php 
	echo "Total Deudas: $".$total_debt."<br>";
	echo "Alumnos con pagos Pendientes: ".$numberStudents."<br>"
	?>
</div>
<div class="users form large-9 medium-9 columns">
    <?= $this->Form->create('Pagos'); ?>
    <?= $this->Form->button('Escoger Otra Fecha',['controller' => 'Pagos', 'action' => 'studentsDelay']); ?>
    <?= $this->Form->end(); ?>
</div>