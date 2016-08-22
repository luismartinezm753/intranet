<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Video'), ['action' => 'edit', $video->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Video'), ['action' => 'delete', $video->id], ['confirm' => __('Are you sure you want to delete # {0}?', $video->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Videos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Grados'), ['controller' => 'Grados', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grado'), ['controller' => 'Grados', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="videos view large-9 medium-8 columns content">
    <h3><?= h($video->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Grado') ?></th>
            <td><?= $video->has('grado') ? $this->Html->link($video->grado->grado, ['controller' => 'Grados', 'action' => 'view', $video->grado->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($video->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($video->url)); ?>
    </div>
</div>
