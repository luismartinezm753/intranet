<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evento'), ['action' => 'edit', $evento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evento'), ['action' => 'delete', $evento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Eventos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventos view large-9 medium-8 columns content">
    <h3><?= h($evento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($evento->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Ubicacion') ?></th>
            <td><?= h($evento->ubicacion) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($evento->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Inicio') ?></th>
            <td><?= h($evento->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Termino') ?></th>
            <td><?= h($evento->fecha_termino) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($evento->descripcion)); ?>
    </div>
</div>
