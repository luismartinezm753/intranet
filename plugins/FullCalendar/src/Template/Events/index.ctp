<?php
/*
 * Template/Events/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<div class="col-sm-offset-1">
	<h2 class="inline-block"><?= __('Eventos');?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-responsive table-striped table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('event_type_id',['label'=>'Tipo de Evento']);?></th>
                <th><?= $this->Paginator->sort('title',['label'=>'Titulo']);?></th>
                <th><?= $this->Paginator->sort('status',['label'=>'Estado']);?></th>
                <th><?= $this->Paginator->sort('start',['label'=>'Fecha de Inicio']);?></th>
                <th><?= $this->Paginator->sort('end',['label'=>'Fecha de Termino']);?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
		<?php
			$i = 0;
			foreach ($events as $event):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
		?>
			<tr<?= $class;?>>
				<td>
					<?= $this->Html->link($event->event_type->name, ['controller' => 'event_types', 'action' => 'view', $event->event_type->id]); ?>
				</td>
				<td><?= $event->title ?></td>
				<td><?= $event->status ?></td>
				<td><?= $event->start ?></td>
		        <?php if($event->all_day == 0): ?>
		   			<td><?= $event->end ?></td>
		    	<?php else: ?>
				<td>N/A</td>
		        <?php endif; ?>
				<td class="actions">
					<?= $this->Html->link(__('Ver', true), ['action' => 'view', $event->id]); ?>
					<?= $this->Html->link(__('Editar', true), ['action' => 'edit', $event->id]); ?>
					<?= $this->Form->postLink('Borrar', ['action' => 'delete', $event->id], ['confirm' => 'Are you sure?']); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
    <?= $this->Html->link(__('Agregar Evento'), ['action' => 'add'],['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Ver Calendario'), ['controller'=>'FullCalendar','action' => 'index'],['class'=>'btn btn-primary']) ?>
</div>
<div class="paginator small-12 small-centered medium-8 medium-centered large-6 large-centered columns text-center">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>