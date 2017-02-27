<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Escuela'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sedes'), ['controller' => 'Sedes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sede'), ['controller' => 'Sedes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="escuelas index large-9 medium-8 columns content">
    <h3><?= __('Escuelas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rut_tributario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estilo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('representante') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pagina_web') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comuna') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pais') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($escuelas as $escuela): ?>
            <tr>
                <td><?= $this->Number->format($escuela->id) ?></td>
                <td><?= h($escuela->name) ?></td>
                <td><?= h($escuela->rut_tributario) ?></td>
                <td><?= h($escuela->estilo) ?></td>
                <td><?= h($escuela->representante) ?></td>
                <td><?= h($escuela->direccion) ?></td>
                <td><?= h($escuela->email) ?></td>
                <td><?= h($escuela->pagina_web) ?></td>
                <td><?= h($escuela->telefono1) ?></td>
                <td><?= h($escuela->telefono2) ?></td>
                <td><?= h($escuela->comuna) ?></td>
                <td><?= h($escuela->pais) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $escuela->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $escuela->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $escuela->id], ['confirm' => __('Are you sure you want to delete # {0}?', $escuela->id)]) ?>
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
