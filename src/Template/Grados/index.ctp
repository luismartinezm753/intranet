<div class="col-lg-offset-1 col-lg-8">
    <legend><?= __('Lista de Grados') ?></legend>
    <table class="table table-bordered table-striped ">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('grado') ?></th>
            <th><?= $this->Paginator->sort('duracion_mes') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($grados as $grado): ?>
        <tr>
            <td><?= h($grado->grado) ?></td>
            <td><?= $this->Number->format($grado->duracion_mes) ?></td>
            <td class="Acciones">
                <?= $this->Html->link(__(''), ['action' => 'view', $grado->id],['class'=>'fa fa-search']) ?>
                <?php if ($this->AuthUser->hasRole('instructor') || $this->AuthUser->hasRole('director')):?>
                    <?= $this->Html->link(__(''), ['action' => 'edit', $grado->id],['class'=>'fa fa-pencil']) ?>
                    <?= $this->Form->postLink(__(''), ['action' => 'delete', $grado->id], ['class'=>'fa fa-trash'],['confirm' => __('¿Está seguro que desea eliminar al usuario {0}?', $grado->nombre)]) ?>
                <?php endif; ?>
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
    <?php if ($this->AuthUser->hasRole('instructor') || $this->AuthUser->hasRole('director')):?>
    <?= $this->Html->link(_('Agregar Grado'),['action' => 'add'],['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(_('Ver Alumnos para Examen'),['controller'=>'Users','action' => 'studentsToExam'],['class'=>'btn btn-primary']) ?>
    <?php endif; ?>
</div>
