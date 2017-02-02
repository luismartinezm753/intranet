<div class="users index large-10 medium-9 columns col-md-offset-1">
    <h1>Lista de Usuarios</h1>
    <table cellpadding="0" cellspacing="0" class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('nombre') ?></th>
            <th><?= $this->Paginator->sort('telefono') ?></th>
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
            <td style="white-space: nowrap"><?= h($user->fecha_ing) ?></td>
            <td class="actions">
                <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class'=>'fa fa-search']) ?>
                <?= $this->Html->link(__(''), ['action' => 'edit', $user->id],['class'=>'fa fa-pencil']) ?>
                <?= $this->Form->button('', [
                    'data-toggle' => 'modal',
                    'data-target' => '#ArchiveModal-'.$user->id,
                    'class'=>'fa fa-archive'
                ])?>
            </td>
            <td>
                <div class=" col-sm-offset-2">
                <?php
                echo $this->Modal->create(['id' => 'ArchiveModal-'.$user->id]) ;
                echo $this->Modal->header('Archivar Usuario '.$user->full_name, ['close' => false]) ;
                #echo $this->Modal->body('El usuario no sera considerado como parte de la escuela y no podra acceder a la pagina', ['class' => 'my-body-class']) ;
                echo "<div class='modal-body'>";
                echo "<p> El usuario no sera considerado como parte de la escuela y no podra acceder a la página. </p>";
                echo $this->Form->create($user,['url' => ['action' => 'archiveUser',$user->id],['id'=>$user->id]]);
                echo $this->Form->input('observaciones', ['label'=>'Observaciones']);
                echo $this->Form->input('fecha_egreso',['label'=>'Fecha de Egreso','type'=>'date']);
                echo $this->Form->input('calculate_debt',['label'=>'Calcular deuda automaticamente','type'=>'checkbox']);
                echo $this->Form->input('monto_deuda',['label'=>'Monto Adeudado']);
                echo "</div>";
                echo $this->Modal->footer([
                    $this->Form->button('Archivar', ['class' => 'btn btn-primary']),
                    $this->Form->button('Cancelar', ['data-dismiss' => 'modal','class'=>'btn btn-danger'])
                ]) ;
                echo $this->Form->end();
                echo $this->Modal->end() ;
                ?>
                </div>
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
