<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Desvinculacione'), ['action' => 'edit', $desvinculacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Desvinculacione'), ['action' => 'delete', $desvinculacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desvinculacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Desvinculaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Desvinculacione'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="desvinculaciones view large-10 medium-9 columns">
    <h2><?= h($desvinculacione->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $desvinculacione->has('user') ? $this->Html->link($desvinculacione->user->id, ['controller' => 'Users', 'action' => 'view', $desvinculacione->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Descripcion') ?></h6>
            <p><?= h($desvinculacione->descripcion) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($desvinculacione->id) ?></p>
            <h6 class="subheader"><?= __('Motivo') ?></h6>
            <p><?= $this->Number->format($desvinculacione->motivo) ?></p>
            <h6 class="subheader"><?= __('Monto Deuda') ?></h6>
            <p><?= $this->Number->format($desvinculacione->monto_deuda) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha Egreso') ?></h6>
            <p><?= h($desvinculacione->fecha_egreso) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Observaciones') ?></h6>
            <?= $this->Text->autoParagraph(h($desvinculacione->observaciones)) ?>
        </div>
    </div>
</div>
