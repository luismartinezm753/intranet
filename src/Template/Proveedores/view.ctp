<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Proveedore'), ['action' => 'edit', $proveedore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Proveedore'), ['action' => 'delete', $proveedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proveedore->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Proveedores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proveedore'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="proveedores view large-10 medium-9 columns">
    <h2><?= h($proveedore->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nombre') ?></h6>
            <p><?= h($proveedore->nombre) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($proveedore->email) ?></p>
            <h6 class="subheader"><?= __('Telefono') ?></h6>
            <p><?= h($proveedore->telefono) ?></p>
            <h6 class="subheader"><?= __('Direccion') ?></h6>
            <p><?= h($proveedore->direccion) ?></p>
            <h6 class="subheader"><?= __('Pagina Web') ?></h6>
            <p><?= h($proveedore->pagina_web) ?></p>
            <h6 class="subheader"><?= __('Ciudad') ?></h6>
            <p><?= h($proveedore->ciudad) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($proveedore->id) ?></p>
        </div>
    </div>
</div>
