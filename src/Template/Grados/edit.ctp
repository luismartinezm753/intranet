
<div class="col-md-offset-1 col-lg-7">
    <?= $this->Form->create($grado) ?>
    <fieldset>
        <legend><?= __('Editar Grado') ?></legend>
        <?php
            echo $this->Form->input('grado');
            echo $this->Form->input('programa');
            echo $this->Form->input('video');
            echo $this->Form->input('duracion_mes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
