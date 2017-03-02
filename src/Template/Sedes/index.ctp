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
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comuna') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ciudad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto_arriendo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre_arrendador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mail_arrendador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono_arrendador') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('escuela_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('director_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sedes as $sede): ?>
            <tr>
                <td><?= $this->Number->format($sede->id) ?></td>
                <td><?= h($sede->nombre) ?></td>
                <td><?= h($sede->direccion) ?></td>
                <td><?= h($sede->telefono) ?></td>
                <td><?= h($sede->comuna) ?></td>
                <td><?= h($sede->ciudad) ?></td>
                <td><?= h($sede->fecha_inicio) ?></td>
                <td><?= $this->Number->format($sede->monto_arriendo) ?></td>
                <td><?= h($sede->nombre_arrendador) ?></td>
                <td><?= h($sede->mail_arrendador) ?></td>
                <td><?= h($sede->telefono_arrendador) ?></td>
                <td><?= h($sede->logo) ?></td>
                <td><?= $sede->has('escuela') ? $this->Html->link($sede->escuela->name, ['controller' => 'Escuelas', 'action' => 'view', $sede->escuela->id]) : '' ?></td>
                <td><?= $this->Number->format($sede->director_id) ?></td>
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
