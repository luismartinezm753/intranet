<div class="col-lg-offset-1 col-lg-10">
	<table class="table table-bordered">
	<?php
	echo $this->Html->tableHeaders(['Nombre','Ultimo Pago Registrado','Email','Monto Adeudado','Número de Meses','Enviar Notificación'],['class'=>'bg-primary']);
	foreach ($result as $payment) {
		echo $this->Html->tableCells([
			[$this->html->link($payment['pay_info']['users__nombre'].' '.$payment['pay_info']['users__apellido'],['controller'=>'Users','action'=>'view',$payment['pay_info']['users__id']]), $payment['pay_info']['pagos__mes']." ".$payment['pay_info']['pagos__año'], $payment['pay_info']['users__email'], $payment['pay_info']['deuda'],$payment['pay_info']['meses_deuda'],$this->Html->link('Enviar Mail',['controller' => 'Pagos', 'action' => 'sendEmailPayment',http_build_query(['debt_info'=>['month'=>$month,'year'=>$year,'payment'=>$payment->toArray()]])])]
		]);
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
		<?= $this->Html->link(__('Escoger Otra Fecha'), ['action' => 'studentsDelay'],['class'=>'btn btn-primary']) ?>
	</div>
	<div>
		<?= $this->Form->button('Exportar a Excel',['onclick'=>'export_to_excel()','class'=>'btn btn-primary']); ?>
	</div>
</div>
<script>
	function export_to_excel(){
		$.ajax({
			type:"POST",
			url: "<?php echo $this->Url->build([
				"controller" => "Pagos",
				"action" => "exportToExcel"
			]);?>" ,
			data: {'debt_info':<?php echo json_encode($result);?>},
			beforeSend: function(xhr){
				xhr.setRequestHeader('X-CSRF-Token', <?= json_encode($this->request->param('_csrfToken'));?>);
			},
			success: function(url){
				//TODO: Change to the correct url
				window.location= "http://localhost/intranet/webroot/files/csv/morosidades.csv";
			},
			error: function (error) {
				console.log(error);
			}
		});
	}
</script>