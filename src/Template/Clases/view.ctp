<div class="col-md-7 col-md-offset-1">
    <h3><?= h($clase->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sede') ?></th>
            <td><?= $clase->has('sede') ? $this->Html->link($clase->sede->id, ['controller' => 'Sedes', 'action' => 'view', $clase->sede->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Horario') ?></th>
            <td><?= $clase->has('horario') ? $this->Html->link($clase->horario->id, ['controller' => 'Horarios', 'action' => 'view', $clase->horario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $clase->has('user') ? $this->Html->link($clase->user->full_name, ['controller' => 'Users', 'action' => 'view', $clase->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clase->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Instructor Id') ?></th>
            <td><?= $this->Number->format($clase->instructor_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ayudante1 Id') ?></th>
            <td><?= $this->Number->format($clase->ayudante1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($clase->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Termino') ?></th>
            <td><?= h($clase->fecha_termino) ?></td>
        </tr>
    </table>
</div>
