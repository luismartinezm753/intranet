<div class="users form col-md-7 col-md-offset-1">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ingrese Nombre de Usuario y Contraseña') ?></legend>
        <?= $this->Form->input('username', ['label'=>'Nombre de Usuario']) ?>
        <?= $this->Form->input('password',['label'=>'Contraseña']) ?>
    </fieldset>
<?= $this->Form->button(__('Ingresar'),['class'=>'btn btn-primary']); ?>
<?= $this->Form->end() ?>
</div>