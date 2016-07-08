<div class="col-lg-offset-1 col-lg-8">
    <table class="table table-bordered ">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('grado') ?></th>
            <th><?= $this->Paginator->sort('duracion_mes') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($grados as $grado): ?>
        <tr>
            <td><?= h($grado->grado) ?></td>
            <td><?= $this->Number->format($grado->duracion_mes) ?></td>
            <td class="Acciones">
                <?= $this->Html->link(__('Ver'), ['action' => 'view', $grado->id]) ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $grado->id]) ?>
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $grado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grado->id)]) ?>
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
    <?= $this->Html->link(_('Agregar Grado'),['action' => 'add'],['class'=>'btn btn-primary']) ?>
</div>
