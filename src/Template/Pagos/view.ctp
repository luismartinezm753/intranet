<div class="pagos view col-lg-offset-1">
    <h2>Pago de <?= h($pago->mes) ?> del <?= h($pago->año) ?></h2>
    <div class="col-lg-7">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th class="subheader"><?= __('Usuario') ?></th>
                    <td><?= $pago->has('user') ? $this->Html->link($pago->user->fullName, ['controller' => 'Users', 'action' => 'view', $pago->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Mes') ?></th>
                    <td><?= h($pago->mes) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Año') ?></th>
                    <td><?= $this->Text->autoParagraph(h($pago->año)) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Forma Pago') ?></th>
                    <td><?= h($pago->forma_pago) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Monto') ?></th>
                    <td><?= $this->Number->format($pago->monto) ?></td>
                </tr>
                <tr>
                    <th class="subheader"><?= __('Fecha Pago') ?></th>
                    <td><?= h($pago->fecha_pago) ?></td>
                </tr>
                <?php if (!$this->AuthUser->hasRole('estudiante')):?>
                    <tr>
                        <th class="subheader"><?= __('Observacion') ?></th>
                        <td><?= h($pago->observacion) ?></td>
                    </tr>
                <?php endif;?>
            </tbody>
        </table>
        <?= $this->AuthUser->postLink('Editar', ['action' => 'edit', $pago->id],['class'=>'btn btn-primary']) ?>
    </div>
</div>
