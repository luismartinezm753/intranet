<div class="grados form col-md-offset-1 col-lg-7">
    <?= $this->Form->create($grado, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Agregar Grado') ?></legend>
        <?php
            echo $this->Form->input('grado');
            echo $this->Form->file('programa',['label'=>'Programa']);
            echo $this->Form->input('video', ['label'=>'Link del video']);
            echo $this->Form->input('duracion_mes',['label'=>'Duración en Meses']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
