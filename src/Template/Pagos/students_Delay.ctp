<div class="users form large-9 medium-9 columns">
    <?= $this->Form->create('Users'); ?>
        <!--<?= $url = $this->Url->build(['controller' => 'Users', 'action' => 'studentsToExamAjax', 'ext' => 'json']); ?>-->
        <?php echo $this->Form->input('mes', ['type' => 'month']);
        echo $this->Form->input('año', ['type' => 'year', [
                'minYear' => date('Y')-2,
                'maxYear' => date('Y')+2
            ]]); ?>
    <?= $this->Form->button('Ver',['controller' => 'Users', 'action' => 'displayStudentsToExam']); ?>
    <?= $this->Form->end(); ?>
    <div id="prueba"></div>
</div>
