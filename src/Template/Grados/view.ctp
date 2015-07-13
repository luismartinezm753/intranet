<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Grado'), ['action' => 'edit', $grado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grado'), ['action' => 'delete', $grado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grado->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="grados view large-10 medium-9 columns">
    <h2><?= h($grado->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Grado') ?></h6>
            <p><?= h($grado->grado) ?></p>
            <h6 class="subheader"><?= __('Programa') ?></h6>
            <p><?= h($grado->programa) ?></p>
            <h6 class="subheader"><?= __('Video') ?></h6>
            <p><?= h($grado->video) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($grado->id) ?></p>
            <h6 class="subheader"><?= __('Duracion Mes') ?></h6>
            <p><?= $this->Number->format($grado->duracion_mes) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($grado->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Password') ?></th>
            <th><?= __('Telefono') ?></th>
            <th><?= __('Rol') ?></th>
            <th><?= __('Fecha Ing') ?></th>
            <th><?= __('Grado Id') ?></th>
            <th><?= __('Nombre') ?></th>
            <th><?= __('Apellido') ?></th>
            <th><?= __('Referencia') ?></th>
            <th><?= __('Estado') ?></th>
            <th><?= __('Fecha Ult Acenso') ?></th>
            <th><?= __('Fecha Nac') ?></th>
            <th><?= __('Nombre Apoderado') ?></th>
            <th><?= __('Telefono Apoderado') ?></th>
            <th><?= __('Profesion') ?></th>
            <th><?= __('Nota Salud') ?></th>
            <th><?= __('Llevar A') ?></th>
            <th><?= __('Monto Paga') ?></th>
            <th><?= __('Id User Referencia') ?></th>
            <th><?= __('Observaciones') ?></th>
            <th><?= __('Fecha Cambio Password') ?></th>
            <th><?= __('Foto') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($grado->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->password) ?></td>
            <td><?= h($users->telefono) ?></td>
            <td><?= h($users->rol) ?></td>
            <td><?= h($users->fecha_ing) ?></td>
            <td><?= h($users->grado_id) ?></td>
            <td><?= h($users->nombre) ?></td>
            <td><?= h($users->apellido) ?></td>
            <td><?= h($users->referencia) ?></td>
            <td><?= h($users->estado) ?></td>
            <td><?= h($users->fecha_ult_acenso) ?></td>
            <td><?= h($users->fecha_nac) ?></td>
            <td><?= h($users->nombre_apoderado) ?></td>
            <td><?= h($users->telefono_apoderado) ?></td>
            <td><?= h($users->profesion) ?></td>
            <td><?= h($users->nota_salud) ?></td>
            <td><?= h($users->llevar_a) ?></td>
            <td><?= h($users->monto_paga) ?></td>
            <td><?= h($users->id_user_referencia) ?></td>
            <td><?= h($users->observaciones) ?></td>
            <td><?= h($users->fecha_cambio_password) ?></td>
            <td><?= h($users->foto) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
