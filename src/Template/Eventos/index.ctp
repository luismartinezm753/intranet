<div class="col-lg-8 col-lg-offset-1">
    <h3><?= __('Eventos') ?></h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th><?= $this->Paginator->sort('fecha_termino') ?></th>
                <th><?= $this->Paginator->sort('ubicacion') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventos as $evento): ?>
            <tr>
                <td><?= h($evento->nombre) ?></td>
                <td><?= h($evento->fecha_inicio) ?></td>
                <td><?= h($evento->fecha_termino) ?></td>
                <td><?= h($evento->FullAddress) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $evento->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $evento->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $evento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evento->id)]) ?>
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
        <?= $this->Html->link(_('Agregar Evento'),['action' => 'add'],['class'=>'btn btn-primary']) ?>
    </div>
</div>
