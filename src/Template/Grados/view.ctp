<div class="actions columns large-2 medium-3">
    <h3><?= __('Acciones') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Nuevo pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
        <?php if( isset($is_admin) && $is_admin == 1 ) { ?>
        <li><?= $this->Html->link(__('Editar Grado'), ['action' => 'edit', $grado->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Grado'), ['action' => 'delete', $grado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grado->id)]) ?> </li>
        <li><?= $this->Html->link(__('Lista de Grados'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Grado'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Lista Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Usuario'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <?php } ?>
    </ul>
</div>
<div class="grados view large-10 medium-9 columns">
    <h2><?= h($grado->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Grado') ?></h6>
            <p><?= h($grado->grado) ?></p>
            <h6 class="subheader"><?= __('Programa') ?></h6>
            <p><?= $this->Html->link('Descargar Programa', ['controller' => 'Grados', 'action' => 'downloadFile', $grado->id]) ?></p>
            <h6 class="subheader"><?= __('Video') ?></h6>
            <iframe width="420" height="315" src=<?= $grado->video ?> frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Duracion en Meses') ?></h6>
            <p><?= $this->Number->format($grado->duracion_mes) ?></p>
        </div>
    </div>
</div>
<?php if( isset($is_admin) && $is_admin == 1 ): ?>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Usuarios') ?></h4>
    <?php if (!empty($grado->users)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Username') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Nombre') ?></th>
            <th><?= __('Fecha Ult Acenso') ?></th>
            <th><?= __('Fecha Nac') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($grado->users as $users): ?>
        <tr>
            <td><?= h($users->id) ?></td>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->nombre) ?></td>
            <td><?= h($users->fecha_ult_acenso) ?></td>
            <td><?= h($users->fecha_nac) ?></td>

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
<?php endif; ?>