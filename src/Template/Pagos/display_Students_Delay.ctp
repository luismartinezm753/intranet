<table>
<?php 
echo $this->Html->tableHeaders(['Nombre','Ultimo Pago Registrado','Email','Monto Adeudado']);
foreach ($result as $payment) {
	echo $this->Html->tableCells([
    	[$payment['users']['nombre'], $payment['pagos']['mes']." ".$payment['pagos']['año'], $payment['users']['email']]
	]);
	//echo $student;
}
?>
</table>