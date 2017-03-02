<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sede'), ['action' => 'edit', $sede->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sede'), ['action' => 'delete', $sede->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sede->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sedes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sede'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Escuelas'), ['controller' => 'Escuelas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Escuela'), ['controller' => 'Escuelas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clases'), ['controller' => 'Clases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Clase'), ['controller' => 'Clases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sedes view large-9 medium-8 columns content">
    <h3><?= h($sede->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($sede->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($sede->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($sede->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comuna') ?></th>
            <td><?= h($sede->comuna) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ciudad') ?></th>
            <td><?= h($sede->ciudad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Arrendador') ?></th>
            <td><?= h($sede->nombre_arrendador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail Arrendador') ?></th>
            <td><?= h($sede->mail_arrendador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono Arrendador') ?></th>
            <td><?= h($sede->telefono_arrendador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($sede->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Escuela') ?></th>
            <td><?= $sede->has('escuela') ? $this->Html->link($sede->escuela->name, ['controller' => 'Escuelas', 'action' => 'view', $sede->escuela->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sede->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto Arriendo') ?></th>
            <td><?= $this->Number->format($sede->monto_arriendo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Director Id') ?></th>
            <td><?= $this->Number->format($sede->director_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($sede->fecha_inicio) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clases') ?></h4>
        <?php if (!empty($sede->clases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sede Id') ?></th>
                <th scope="col"><?= __('Horario Id') ?></th>
                <th scope="col"><?= __('Instructor Id') ?></th>
                <th scope="col"><?= __('Ayudante1 Id') ?></th>
                <th scope="col"><?= __('Ayudante2 Id') ?></th>
                <th scope="col"><?= __('Fecha Inicio') ?></th>
                <th scope="col"><?= __('Fecha Termino') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sede->clases as $clases): ?>
            <tr>
                <td><?= h($clases->id) ?></td>
                <td><?= h($clases->sede_id) ?></td>
                <td><?= h($clases->horario_id) ?></td>
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
