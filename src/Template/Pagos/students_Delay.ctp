<div class="users form large-9 medium-9 columns">
    <?= $this->Form->create('Pagos',['context' => ['valitador' => 'dates']]); ?>
        <?php echo $this->Form->input('mes_pago', ['type' => 'month','label'=>'Seleccione un mes']);
        echo $this->Form->input('año_pago', ['label'=>'Seleccione un año','type' => 'year', [
                'minYear' => date('Y')-2,
                'maxYear' => date('Y')+2
            ]]); ?>
    <?= $this->Form->button('Ver',['controller' => 'Pagos', 'action' => 'displayStudentsDelay']); ?>
    <?= $this->Form->end(); ?>
    <div id="prueba"></div>
</div>
