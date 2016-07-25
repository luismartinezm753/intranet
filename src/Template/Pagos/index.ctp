<div class="pagos index col-lg-offset-1 col-lg-10">
    <h2>Pagos Registrados</h2>
    <table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Usuario') ?></th>
            <th><?= $this->Paginator->sort('mes') ?></th>
            <th><?= $this->Paginator->sort('año') ?></th>
            <th><?= $this->Paginator->sort('monto') ?></th>
            <th><?= $this->Paginator->sort('fecha_pago') ?></th>
            <th><?= $this->Paginator->sort('forma_pago') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pagos as $pago): ?>
        <tr>
            <td>
                <?= $pago->has('user') ? $this->Html->link($pago->user->nombre, ['controller' => 'Users', 'action' => 'view', $pago->user->id]) : '' ?>
            </td>
            <td><?= h($pago->mes) ?></td>
            <td><?= h($pago->año)?></td>
            <td><?= $this->Number->format($pago->monto) ?></td>
            <td><?= h($pago->fecha_pago) ?></td>
            <td><?= h($pago->forma_pago) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['action' => 'view', $pago->id]) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pago->id]) ?>
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?= $this->Html->link(_('Agregar Pago'),['action' => 'add'],['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(_('Ver Morosidades'),['action' => 'studentsDelay'],['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(_('Agregar Multiples Pagos'),['action' => 'addMulti'],['class'=>'btn btn-primary']) ?>
</div>
