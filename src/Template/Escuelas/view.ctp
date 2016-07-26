<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Escuela'), ['action' => 'edit', $escuela->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Escuela'), ['action' => 'delete', $escuela->id], ['confirm' => __('Are you sure you want to delete # {0}?', $escuela->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Escuelas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Escuela'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sedes'), ['controller' => 'Sedes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sede'), ['controller' => 'Sedes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="escuelas view large-9 medium-8 columns content">
    <h3><?= h($escuela->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($escuela->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Rut Tributario') ?></th>
            <td><?= h($escuela->rut_tributario) ?></td>
        </tr>
        <tr>
            <th><?= __('Estilo') ?></th>
            <td><?= h($escuela->estilo) ?></td>
        </tr>
        <tr>
            <th><?= __('Representante') ?></th>
            <td><?= h($escuela->representante) ?></td>
        </tr>
        <tr>
            <th><?= __('Direccion') ?></th>
            <td><?= h($escuela->direccion) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($escuela->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Pagina Web') ?></th>
            <td><?= h($escuela->pagina_web) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefono1') ?></th>
            <td><?= h($escuela->telefono1) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefono2') ?></th>
            <td><?= h($escuela->telefono2) ?></td>
        </tr>
        <tr>
            <th><?= __('Comuna') ?></th>
            <td><?= h($escuela->comuna) ?></td>
        </tr>
        <tr>
            <th><?= __('Pais') ?></th>
            <td><?= h($escuela->pais) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($escuela->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sedes') ?></h4>
        <?php if (!empty($escuela->sedes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Direccion') ?></th>
                <th><?= __('Telefono') ?></th>
                <th><?= __('Director') ?></th>
                <th><?= __('Comuna') ?></th>
                <th><?= __('Ciudad') ?></th>
                <th><?= __('Fecha Inicio') ?></th>
                <th><?= __('Monto Arriendo') ?></th>
                <th><?= __('Nombre Arrendador') ?></th>
                <th><?= __('Mail Arrendador') ?></th>
                <th><?= __('Telefono Arrendador') ?></th>
                <th><?= __('Logo') ?></th>
                <th><?= __('Escuela Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($escuela->sedes as $sedes): ?>
            <tr>
                <td><?= h($sedes->id) ?></td>
                <td><?= h($sedes->nombre) ?></td>
                <td><?= h($sedes->direccion) ?></td>
                <td><?= h($sedes->telefono) ?></td>
                <td><?= h($sedes->director) ?></td>
                <td><?= h($sedes->comuna) ?></td>
                <td><?= h($sedes->ciudad) ?></td>
                <td><?= h($sedes->fecha_inicio) ?></td>
                <td><?= h($sedes->monto_arriendo) ?></td>
                <td><?= h($sedes->nombre_arrendador) ?></td>
                <td><?= h($sedes->mail_arrendador) ?></td>
                <td><?= h($sedes->telefono_arrendador) ?></td>
                <td><?= h($sedes->logo) ?></td>
                <td><?= h($sedes->escuela_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sedes', 'action' => 'view', $sedes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sedes', 'action' => 'edit', $sedes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sedes', 'action' => 'delete', $sedes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sedes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
