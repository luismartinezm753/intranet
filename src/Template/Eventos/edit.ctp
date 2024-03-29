<div class="col-lg-6 col-lg-offset-1">
    <?= $this->Form->create($evento) ?>
    <fieldset>
        <legend><?= __('Editar Evento') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('fecha_inicio');
            echo $this->Form->input('fecha_termino', ['empty' => true]);
            echo $this->Form->input('ubicacion');
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
