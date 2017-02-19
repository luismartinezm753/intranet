<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <div class="users form large-10 medium-9 columns">
            <?= $this->Form->create(false,['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Enviar Mensaje') ?></legend>
                <?php
                echo $this->Form->input('header', ['label'=>'Título']);
                echo $this->Form->input('sendto',['options'=>$users,'label'=>'Destinatarios','empty' => 'Selecciona los destinatarios','multiple'=>true]);
                echo $this->Form->input('message',['label'=>'Mensaje','type'=>'textarea']);
                echo $this->Form->file('submittedfile',['label'=>'Archivo Adjunto']);
                ?>
            </fieldset>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
            <?= $this->Form->button(__('Enviar'),['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
