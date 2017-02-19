<div class="col-md-7 col-md-offset-1">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Enviar Mensaje') ?></legend>
        <?php
            echo $this->Form->input('header',['label'=>'Título']);
            echo $this->Form->input('sendto',['options'=>$users,'label'=>'Destinatarios','empty' => 'Selecciona los destinatarios','multiple'=>true]);
            echo $this->Form->input('message',['label'=>'Mensaje']);
            echo $this->Form->input('file');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar Mensaje'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
