<div class="col-lg-offset-1 col-lg-10">
	<table class="table table-bordered">
	<?php
	echo $this->Html->script('js');
	echo $this->Html->tableHeaders(['Nombre','Ultimo Pago Registrado','Email','Monto Adeudado','Número de Meses','Enviar Notificación'],['class'=>'bg-primary']);
	foreach ($result as $payment) {
		echo $this->Html->tableCells([
			[$this->html->link($payment['users']['nombre'],['controller'=>'Users','action'=>'view',$payment['users']['id']]), $payment['pagos']['mes']." ".$payment['pagos']['año'], $payment['users']['email'], $payment['pagos']['deuda'],$payment['pagos']['meses_deuda'],$this->Html->link('Enviar Mail',['controller' => 'Pagos', 'action' => 'sendEmailPayment',json_encode($payment),$month,$year])]
		]);
		//echo $student;
	}
	?>
	</table>
	<div>
		<?php
		echo "<strong>Total Deudas: </strong>$".$total_debt."<br>";
		echo "<strong>Alumnos con pagos Pendientes: </strong>".$numberStudents."<br>"
		?>
	</div>
	<div class="users form large-9 medium-9 columns">
		<?= $this->Form->create('Pagos'); ?>
		<?= $this->Form->button('Escoger Otra Fecha',['controller' => 'Pagos', 'action' => 'studentsDelay']); ?>
		<?= $this->Form->end(); ?>
	</div>
	<div>
		<?= $this->Form->create('Pagos',['url' => ['action' => 'exportToExcel']]); ?>
		<?= $this->Form->button('Exportar a Excel',['type'=>'button','onclick'=>'export_to_excel()']); ?>
		<?= $this->Form->end(); ?>
	</div>
</div>
<script>
	function export_to_excel(){
		$.ajax({
			type:"POST",
			url: "<?php echo $this->Url->build([
				"controller" => "Pagos",
				"action" => "exportToExcel",
			]);?>" ,
			data:{"payments":<?php echo json_encode($result);?>},
			success: function(url){
				//TODO: Change to the correct url
				window.location= "http://localhost/intranet/webroot/files/csv/morosidades.csv";
			},
			error: function (error) {
				alert(error);
			}
		});
	}
</script>