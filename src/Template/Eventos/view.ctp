<div class="col-md-offset-1">
    <h2><?= h($evento->nombre) ?></h2>
    <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Información General</strong></div>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($evento->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Inicio') ?></th>
                    <td><?= h($evento->fecha_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Termino') ?></th>
                    <td><?= h($evento->fecha_termino) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descripción') ?></th>
                    <td><?= h($evento->descripcion) ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>Ubicación</strong></div>
        </div>
    </div>
</div>
