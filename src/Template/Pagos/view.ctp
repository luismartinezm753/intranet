<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Editar Pago'), ['action' => 'edit', $pago->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Pago'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id)]) ?> </li>
        <li><?= $this->Html->link(__('Lista de Pagos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Pago'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista de  Usuarios'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Usuario'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pagos view large-10 medium-9 columns">
    <h2>Pago de <?= h($pago->mes) ?> del <?= h($pago->año) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Usuario') ?></h6>
            <p><?= $pago->has('user') ? $this->Html->link($pago->user->nombre, ['controller' => 'Users', 'action' => 'view', $pago->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Mes') ?></h6>
            <p><?= h($pago->mes) ?></p>
            <h6 class="subheader"><?= __('Observacion') ?></h6>
            <p><?= h($pago->observacion) ?></p>
            <h6 class="subheader"><?= __('Forma Pago') ?></h6>
            <p><?= h($pago->forma_pago) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Monto') ?></h6>
            <p><?= $this->Number->format($pago->monto) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Fecha Pago') ?></h6>
            <p><?= h($pago->fecha_pago) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Año') ?></h6>
            <?= $this->Text->autoParagraph(h($pago->año)) ?>
        </div>
    </div>
</div>
