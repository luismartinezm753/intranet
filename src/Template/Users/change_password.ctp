<div class="col-lg-6 col-lg-offset-2">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Actualice su contraseña') ?></legend>
        <?= $this->Form->input('password1',['type'=>'password' ,'label'=>'Ingrese Contraseña']) ?>
        <?= $this->Form->input('password2',['type' => 'password' , 'label'=>'Reescriba su Contraseña'])?>
    </fieldset>
    <?= $this->Form->button(__('Actualizar Contraseña'),['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>