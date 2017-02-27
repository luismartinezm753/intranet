<div class="pagos index col-lg-offset-1 col-lg-9">
    <h2>Pagos Registrados</h2>
    <div class="form-group">
        <input type="text" id="searchInput" placeholder="Filtrar" title="Type in a name" class="form-control">
    </div>
    <table class="table table-bordered table-striped" id="pagosTable">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('Usuario') ?></th>
            <th><?= $this->Paginator->sort('mes') ?></th>
            <th><?= $this->Paginator->sort('año') ?></th>
            <th><?= $this->Paginator->sort('monto') ?></th>
            <th><?= $this->Paginator->sort('monto_esperado') ?></th>
            <th><?= $this->Paginator->sort('fecha_pago') ?></th>
            <th><?= $this->Paginator->sort('forma_pago') ?></th>
            <th class="actions"><?= __('Acciones') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pagos as $pago): ?>
        <tr>
            <td>
                <?= $pago->has('user') ? $this->Html->link($pago->user->full_name, ['controller' => 'Users', 'action' => 'view', $pago->user->id]) : '' ?>
            </td>
            <td><?= h($pago->mes) ?></td>
            <td><?= h($pago->año)?></td>
            <td><?= $this->Number->format($pago->monto) ?></td>
            <td><?= $this->Number->format($pago->user->monto_paga) ?></td>
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
    <strong>Ingresos Totales: </strong><div id="total_incomes"><?= $this->Number->format($total_incomes)?></div>
    <strong>Ingresos esperados: </strong><div id="total_expected"> <?= $this->Number->format($total_expected)?></div>
    <strong>Diferencia</strong>
    <?php if($total_incomes-$total_expected<0):?>
        <div id="difference" style="color: red"><?=$this->Number->format($total_incomes-$total_expected)?></div>
    <?php else:?>
        <div id="difference""><?=$this->Number->format($total_incomes-$total_expected)?></div>
    <?php endif; ?>
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
<script>
    function update_values() {
        var total_incomes = 0;
        var total_expected = 0
        $("tr:visible", "#pagosTable").each(function(i, obj) {
           total_incomes= total_incomes+Number($(obj).find('td').eq(3).text().replace(',',''));
           total_expected= total_expected+Number($(obj).find('td').eq(4).text().replace(',',''));
        });
        $('#difference').text(total_incomes-total_expected);
        $('#total_incomes').text(total_incomes);
        $('#total_expected').text(total_expected);
    }
    var $rows = $('#pagosTable tr');
    $('#searchInput').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
        update_values()
    });
</script>