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
                <?= $this->Html->link(__('Ver'), ['action' => 'view', $grado->id]) ?>
                <?php if ($this->request->session()->read('User.isAdmin')==1):?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $grado->id]) ?>
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $grado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grado->id)]) ?>
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
    <?php if ($this->request->session()->read('User.isAdmin')==1):?>
    <?= $this->Html->link(_('Agregar Grado'),['action' => 'add'],['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(_('Ver Alumnos para Examen'),['controller'=>'Users','action' => 'studentsToExam'],['class'=>'btn btn-primary']) ?>
    <?php endif; ?>
</div>
