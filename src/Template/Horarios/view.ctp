<div class="col-md-7 col-md-offset-1">
    <h3><?= h($horario->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Dia1') ?></th>
            <td><?= h($horario->dia1) ?></td>
        </tr>
        <tr>
            <th><?= __('Dia2') ?></th>
            <td><?= h($horario->dia2) ?></td>
        </tr>
        <tr>
            <th><?= __('Dia3') ?></th>
            <td><?= h($horario->dia3) ?></td>
        </tr>
        <tr>
            <th><?= __('Dia4') ?></th>
            <td><?= h($horario->dia4) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Inicio1') ?></th>
            <td><?= h($horario->horario_inicio1) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Inicio2') ?></th>
            <td><?= h($horario->horario_inicio2) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Inicio3') ?></th>
            <td><?= h($horario->horario_inicio3) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Inicio4') ?></th>
            <td><?= h($horario->horario_inicio4) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Termino1') ?></th>
            <td><?= h($horario->horario_termino1) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Termino2') ?></th>
            <td><?= h($horario->horario_termino2) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Termino3') ?></th>
            <td><?= h($horario->horario_termino3) ?></td>
        </tr>
        <tr>
            <th><?= __('Horario Termino4') ?></th>
            <td><?= h($horario->horario_termino4) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clases') ?></h4>
        <?php if (!empty($horario->clases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Sede Id') ?></th>
                <th><?= __('Horario Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Instructor Id') ?></th>
                <th><?= __('Ayudante1 Id') ?></th>
                <th><?= __('Ayudante2 Id') ?></th>
                <th><?= __('Fecha Inicio') ?></th>
                <th><?= __('Fecha Termino') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($horario->clases as $clases): ?>
            <tr>
                <td><?= h($clases->id) ?></td>
                <td><?= h($clases->sede_id) ?></td>
                <td><?= h($clases->horario_id) ?></td>
                <td><?= h($clases->user_id) ?></td>
                <td><?= h($clases->instructor_id) ?></td>
                <td><?= h($clases->ayudante1_id) ?></td>
                <td><?= h($clases->ayudante2_id) ?></td>
                <td><?= h($clases->fecha_inicio) ?></td>
                <td><?= h($clases->fecha_termino) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clases', 'action' => 'view', $clases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clases', 'action' => 'edit', $clases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clases', 'action' => 'delete', $clases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
