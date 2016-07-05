<div class="col-lg-offset-2">
    <?= $this->Form->create('Users'); ?>
        <?= $this->Form->input('fecha_examen',['type'=>'date' ,'label'=>'Seleccione un fecha']); ?>
    <?= $this->Form->button('Ver',['class'=>'btn btn-primary']); ?>
    <?= $this->Form->end(); ?>
    <div id="students" class="row">

    </div>
</div>