<div class="users form large-7 medium-12 columns">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ingrese Nombre de Usuario y Contraseña') ?></legend>
        <?= $this->Form->input('username', ['label'=>'Nombre de Usuario']) ?>
        <?= $this->Form->input('password',['label'=>'Contraseña']) ?>
    </fieldset>
<?= $this->Form->button(__('Ingresar')); ?>
<?= $this->Form->end() ?>
</div>