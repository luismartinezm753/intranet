<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sede'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Escuelas'), ['controller' => 'Escuelas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Escuela'), ['controller' => 'Escuelas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sedes index large-9 medium-8 columns content">
    <h3><?= __('Sedes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('direccion') ?></th>
                <th><?= $this->Paginator->sort('telefono') ?></th>
                <th><?= $this->Paginator->sort('director') ?></th>
                <th><?= $this->Paginator->sort('comuna') ?></th>
                <th><?= $this->Paginator->sort('ciudad') ?></th>
                <th><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th><?= $this->Paginator->sort('monto_arriendo') ?></th>
                <th><?= $this->Paginator->sort('nombre_arrendador') ?></th>
                <th><?= $this->Paginator->sort('mail_arrendador') ?></th>
                <th><?= $this->Paginator->sort('telefono_arrendador') ?></th>
                <th><?= $this->Paginator->sort('logo') ?></th>
                <th><?= $this->Paginator->sort('escuela_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sedes as $sede): ?>
            <tr>
                <td><?= $this->Number->format($sede->id) ?></td>
                <td><?= h($sede->nombre) ?></td>
                <td><?= h($sede->direccion) ?></td>
                <td><?= h($sede->telefono) ?></td>
                <td><?= h($sede->director) ?></td>
                <td><?= h($sede->comuna) ?></td>
                <td><?= h($sede->ciudad) ?></td>
                <td><?= h($sede->fecha_inicio) ?></td>
                <td><?= $this->Number->format($sede->monto_arriendo) ?></td>
                <td><?= h($sede->nombre_arrendador) ?></td>
                <td><?= h($sede->mail_arrendador) ?></td>
                <td><?= h($sede->telefono_arrendador) ?></td>
                <td><?= h($sede->logo) ?></td>
                <td><?= $sede->has('escuela') ? $this->Html->link($sede->escuela->name, ['controller' => 'Escuelas', 'action' => 'view', $sede->escuela->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sede->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sede->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sede->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sede->id)]) ?>
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
