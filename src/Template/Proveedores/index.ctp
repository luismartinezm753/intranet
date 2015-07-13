<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Proveedore'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="proveedores index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('telefono') ?></th>
            <th><?= $this->Paginator->sort('direccion') ?></th>
            <th><?= $this->Paginator->sort('pagina_web') ?></th>
            <th><?= $this->Paginator->sort('ciudad') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($proveedores as $proveedore): ?>
        <tr>
            <td><?= $this->Number->format($proveedore->id) ?></td>
            <td><?= h($proveedore->nombre) ?></td>
            <td><?= h($proveedore->email) ?></td>
            <td><?= h($proveedore->telefono) ?></td>
            <td><?= h($proveedore->direccion) ?></td>
            <td><?= h($proveedore->pagina_web) ?></td>
            <td><?= h($proveedore->ciudad) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $proveedore->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proveedore->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proveedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proveedore->id)]) ?>
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
