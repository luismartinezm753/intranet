<?php
/*
 * Template/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<div class="col-md-10 col-md-offset-1">
    <div class="Calendar index">
        <div id="calendar"></div>
    </div>
    <div class="actions">
        <?= $this->Html->link(__('Agregar Evento', true), ['controller' => 'events', 'action' => 'add'],['class'=>'btn btn-primary']) ?>
        <?= $this->Html->link(__('Administrar Eventos', true), ['controller' => 'events'],['class'=>'btn btn-primary']) ?>
        <?= $this->Html->link(__('Administrar tipos de Eventos', true), ['controller' => 'event_types'],['class'=>'btn btn-primary']) ?>
    </div>
</div>

<?= $this->Html->css('/full_calendar/css/fullcalendar.min', ['plugin' => true]); ?>
<?= $this->Html->css('/full_calendar/css/jquery.qtip.min', ['plugin' => true]); ?>
<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') ?>
<?= $this->Html->script('/full_calendar/js/lib/moment.min.js', ['plugin' => true]); ?>
<?= $this->Html->script('/full_calendar/js/fullcalendar.js', ['plugin' => true]); ?>
<?= $this->Html->script('/full_calendar/js/jquery.qtip.min.js', ['plugin' => true]); ?>
<?= $this->Html->script('/full_calendar/js/ready.js', ['plugin' => true]); ?>
<?= $this->Html->script('/full_calendar/js/lang-all.js', ['plugin' => true]); ?>
