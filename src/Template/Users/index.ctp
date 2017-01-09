<div class="users index large-10 medium-9 columns col-md-offset-1">
    <h1>Lista de Usuarios</h1>
    <table cellpadding="0" cellspacing="0" class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('telefono') ?></th>
            <th><?= $this->Paginator->sort('rol') ?></th>
            <th><?= $this->Paginator->sort('fecha de ingreso') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->full_name) ?></td>
            <td><?= h($user->telefono) ?></td>
            <td><?= h($user->rol) ?></td>
            <td style="white-space: nowrap"><?= h($user->fecha_ing) ?></td>
            <td class="actions">
                <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class'=>'fa fa-search']) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $user->id],['class'=>'fa fa-pencil']) ?>
                <?= $this->Html->link(__(''),['action'=>'archiveUser',$user->id],['class'=>'fa fa-archive']) ?>
                <?= $this->Form->postLink(__(''), ['action' => 'delete', $user->id], ['class'=>'fa fa-trash'],['confirm' => __('¿Está seguro que desea eliminar al usuario {0}?', $user->full_name)]) ?>
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
    <?= $this->Html->link(_('Agregar Usuario'),['action' => 'add'],['class'=>'btn btn-primary']) ?>
    <?php if(abs($archived-1)==0){ ?>
        <?= $this->Html->link(_('Ver Usuarios Inactivos'),['action' => 'index',abs($archived-1)],['class'=>'btn btn-primary']) ?>
    <?php }else{ ?>
        <?= $this->Html->link(_('Ver Usuarios Activos'),['action' => 'index',abs($archived-1)],['class'=>'btn btn-primary']) ?>
    <?php } ?>
</div>
