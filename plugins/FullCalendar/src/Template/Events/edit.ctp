<?php
/*
 * Template/Events/edit.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<div class="col-md-offset-1 col-lg-7">
	<?= $this->Form->create($event, ['type' => 'file']);?>
		<fieldset>
	 		<legend><?= __('Editar Evento'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('event_type_id',['label'=>'Tipo de Evento']);
			echo $this->Form->input('title',['label'=>'Titulo']);
			echo $this->Form->input('details',['label'=>'Detalles']);
			echo $this->Form->input('start', ['interval' => 15, 'timeFormat' => 24,'label'=>'Inicio']);
			echo $this->Form->input('end', ['interval' => 15, 'timeFormat' => 24,'label'=>'Termino']);
			echo $this->Form->input('all_day',['label'=>'Todo el Día']);
            echo $this->Form->input('price',['label'=>'Precio']);
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
		?>
		</fieldset>
    <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
	<?= $this->Form->end(); ?>
</div>