<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Pago'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="pagos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('mes') ?></th>
            <th><?= $this->Paginator->sort('monto') ?></th>
            <th><?= $this->Paginator->sort('observacion') ?></th>
            <th><?= $this->Paginator->sort('fecha_pago') ?></th>
            <th><?= $this->Paginator->sort('forma_pago') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pagos as $pago): ?>
        <tr>
            <td><?= $this->Number->format($pago->id) ?></td>
            <td>
                <?= $pago->has('user') ? $this->Html->link($pago->user->id, ['controller' => 'Users', 'action' => 'view', $pago->user->id]) : '' ?>
            </td>
            <td><?= h($pago->mes) ?></td>
            <td><?= $this->Number->format($pago->monto) ?></td>
            <td><?= h($pago->observacion) ?></td>
            <td><?= h($pago->fecha_pago) ?></td>
            <td><?= h($pago->forma_pago) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $pago->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pago->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
