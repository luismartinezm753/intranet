<div class="col-lg-offset-1">
    <h2><?= __('Cinturón '.h($grado->grado))?></h2>
    <div class="col-lg-7 panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Información</strong></div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th><?= __('Programa') ?></th>
                        <td><?= $this->Html->link('Descargar Programa', ['controller' => 'Grados', 'action' => 'downloadFile', $grado->id]) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Duracion en Meses') ?></th>
                        <td><?= $this->Number->format($grado->duracion_mes) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php if(!empty($grado->videos)):?>
            <div class="panel panel-primary">
            <div class="panel-heading"><strong>Videos</strong></div>
                <?php foreach ($grado->videos as $video):?>
                    <div class="panel-body"><iframe class="embed-responsive-item" width="420" height="315" src=<?= $video->url ?> frameborder="0" allowfullscreen></iframe></div>
                <?php endforeach;?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if( isset($is_admin) && $is_admin == 1 ): ?>
<div class="col-md-offset-1 col-lg-10">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Alumnos en el grado') ?></h4>
    <?php if (!empty($grado->users)): ?>
    <table class="table table-bordered table-responsive">
        <tr>
            <th class="bg-primary"><?= __('Username') ?></th>
            <th class="bg-primary"><?= __('Email') ?></th>
            <th class="bg-primary"><?= __('Nombre') ?></th>
            <th class="bg-primary"><?= __('Fecha Ult Acenso') ?></th>
            <th class="bg-primary"><?= __('Fecha Nac') ?></th>
            <th class="bg-primary"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($grado->users as $users): ?>
        <tr>
            <td><?= h($users->username) ?></td>
            <td><?= h($users->email) ?></td>
            <td><?= h($users->full_name) ?></td>
            <td><?= h($users->fecha_ult_acenso) ?></td>
            <td><?= h($users->fecha_nac) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('Ver'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                <?= $this->Form->postLink(__('Borrar'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<?php endif; ?>