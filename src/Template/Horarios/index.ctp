<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horarios index large-9 medium-8 columns content">
    <h3><?= __('Horarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('dia1') ?></th>
                <th><?= $this->Paginator->sort('dia2') ?></th>
                <th><?= $this->Paginator->sort('dia3') ?></th>
                <th><?= $this->Paginator->sort('dia4') ?></th>
                <th><?= $this->Paginator->sort('horario_inicio1') ?></th>
                <th><?= $this->Paginator->sort('horario_inicio2') ?></th>
                <th><?= $this->Paginator->sort('horario_inicio3') ?></th>
                <th><?= $this->Paginator->sort('horario_inicio4') ?></th>
                <th><?= $this->Paginator->sort('horario_termino1') ?></th>
                <th><?= $this->Paginator->sort('horario_termino2') ?></th>
                <th><?= $this->Paginator->sort('horario_termino3') ?></th>
                <th><?= $this->Paginator->sort('horario_termino4') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horarios as $horario): ?>
            <tr>
                <td><?= $this->Number->format($horario->id) ?></td>
                <td><?= h($horario->dia1) ?></td>
                <td><?= h($horario->dia2) ?></td>
                <td><?= h($horario->dia3) ?></td>
                <td><?= h($horario->dia4) ?></td>
                <td><?= h($horario->horario_inicio1) ?></td>
                <td><?= h($horario->horario_inicio2) ?></td>
                <td><?= h($horario->horario_inicio3) ?></td>
                <td><?= h($horario->horario_inicio4) ?></td>
                <td><?= h($horario->horario_termino1) ?></td>
                <td><?= h($horario->horario_termino2) ?></td>
                <td><?= h($horario->horario_termino3) ?></td>
                <td><?= h($horario->horario_termino4) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $horario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $horario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $horario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id)]) ?>
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
