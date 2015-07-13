<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Desvinculacione'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="desvinculaciones index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('fecha_egreso') ?></th>
            <th><?= $this->Paginator->sort('motivo') ?></th>
            <th><?= $this->Paginator->sort('descripcion') ?></th>
            <th><?= $this->Paginator->sort('monto_deuda') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($desvinculaciones as $desvinculacione): ?>
        <tr>
            <td><?= $this->Number->format($desvinculacione->id) ?></td>
            <td>
                <?= $desvinculacione->has('user') ? $this->Html->link($desvinculacione->user->id, ['controller' => 'Users', 'action' => 'view', $desvinculacione->user->id]) : '' ?>
            </td>
            <td><?= h($desvinculacione->fecha_egreso) ?></td>
            <td><?= $this->Number->format($desvinculacione->motivo) ?></td>
            <td><?= h($desvinculacione->descripcion) ?></td>
            <td><?= $this->Number->format($desvinculacione->monto_deuda) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $desvinculacione->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $desvinculacione->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $desvinculacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desvinculacione->id)]) ?>
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
