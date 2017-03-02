<?php
/*
 * Template/Events/add.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div class="col-md-6 col-md-offset-1">
<?= $this->Form->create($event);?>
	<fieldset>
 		<legend><?= __('Agregar Evento'); ?></legend>
	<?php
		echo $this->Form->input('event_type_id',['label'=>'Tipo de Evento']);
		echo $this->Form->input('title',['label'=>'Titulo']);
		echo $this->Form->input('details',['label'=>'Detalles']);
		echo $this->Form->input('start', ['timeFormat' => 24,'label'=>'Hora de Inicio']);
		echo $this->Form->input('end', ['timeFormat' => 24,'label'=>'Hora de Termino']);
		echo $this->Form->input('all_day',['label'=>'Todo el Día']);
		echo $this->Form->input('price',['label'=>'Precio']);
		echo $this->Form->input('link',['label'=>'Link del Evento']);
        echo $this->Form->input('region',['label'=>'Región']);
        echo $this->Form->input('comuna',['label'=>'Comuna']);
        echo $this->Form->input('address',['label'=>'Dirección']);
        echo $this->Form->input('user_type',['label'=>'Tipo de Usuario','options'=>['Instructor', 'Monitor','Alumno']]);
		echo $this->Form->input('status', ['options' => [
					'Scheduled' => 'Scheduled','Confirmed' => 'Confirmed','In Progress' => 'In Progress',
					'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
				]
			]
		);
        echo $this->Form->input('observation',['label'=>'Observaciones']);
        echo $this->Form->input('notify_users',['label'=>'Notificar Usuarios','type'=>'checkbox'])
	?>
	</fieldset>
    <?= $this->Form->button(__('Agregar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>