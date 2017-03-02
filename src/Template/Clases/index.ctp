<div class="col-lg-offset-1 col-lg-11">
    <h3><?= __('Clases') ?></h3>
    <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('sede_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('instructor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ayudante1_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ayudante2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clases as $clase): ?>
            <tr>
                <td><?= $clase->has('sede') ? $this->Html->link($clase->sede->nombre, ['controller' => 'Sedes', 'action' => 'view', $clase->sede->id]) : '' ?></td>
                <td><?= $clase->has('horario') ? $this->Html->link($clase->horario->name, ['controller' => 'Horarios', 'action' => 'view', $clase->horario->id]) : '' ?></td>
                <td><?= $clase->has('user1') ? $this->Html->link($clase->user1->full_name, ['controller' => 'Users', 'action' => 'view', $clase->user1->id]) : '' ?></td>
                <td><?= $clase->has('user2') ? $this->Html->link($clase->user2->full_name, ['controller' => 'Users', 'action' => 'view', $clase->user2->id]) : '' ?></td>
                <td><?= $clase->has('user3') ? $this->Html->link($clase->user3->full_name, ['controller' => 'Users', 'action' => 'view', $clase->user3->id]) : '' ?></td>
                <td><?= h($clase->fecha_inicio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $clase->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $clase->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $clase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clase->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')]) ?></p>
        <?= $this->Html->link(_('Agregar Clase'),['action' => 'add'],['class'=>'btn btn-primary']) ?>
    </div>
</div>
