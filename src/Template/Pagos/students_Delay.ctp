<div class="col-lg-offset-1 col-lg-7">
    <h3>Ver Alumnos Morosos</h3>
    <?= $this->Form->create('Pagos',['context' => ['valitador' => 'dates']]); ?>
        <?php echo $this->Form->input('mes_pago', ['type' => 'month','label'=>'Seleccione un mes']);
        echo $this->Form->input('año_pago', ['label'=>'Seleccione un año','type' => 'year', [
                'minYear' => date('Y')-2,
                'maxYear' => date('Y')+2
            ]]); ?>
    <?= $this->Form->button(__('Ver'),['controller' => 'Pagos', 'action' => 'displayStudentsDelay'],['class'=>'btn btn-primary']); ?>
    <?= $this->Form->end(); ?>
</div>
