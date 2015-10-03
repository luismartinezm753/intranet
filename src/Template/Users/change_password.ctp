<div class="users form large-9 medium-9 columns">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Actualice su contraseña') ?></legend>
        <?= $this->Form->input('password1',['type'=>'password' ,'label'=>'Ingrese Contraseña']) ?>
        <?= $this->Form->input('password2',['type' => 'password' , 'label'=>'Reescriba su Contraseña'])?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>