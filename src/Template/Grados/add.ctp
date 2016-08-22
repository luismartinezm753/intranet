<div class="grados form col-md-offset-1 col-lg-7">
    <?= $this->Form->create($grado, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Agregar Grado') ?></legend>
        <?php
            $count=0;
            echo $this->Form->input('grado');
            echo $this->Form->file('programa',['label'=>'Programa del Grado']);
            echo '<div id="field-wrapper">';
            echo $this->Form->input('video.0.url',['type'=>'text','label'=>'Ingrese URL del Video']);
            echo '</div>';
            echo $this->Form->button(__(''),['type'=>'button','class'=>'btn btn-primary fa fa-plus-circle','onclick'=>'add_video()']);
            echo $this->Form->input('duracion_mes',['label'=>'Duración en Meses']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar'),['class'=>'btn btn-primary']) ?>
    <?= $this->Html->link(__('Cancelar'), ['action' => 'index'],['class'=>'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
    var count= <?php echo json_encode($count); ?>;
    count++;
    function add_video() {
        $('#field-wrapper').append("<div id='link-"+count+"'><input id='video-"+count+"-url' type='text' name='video["+count+"][url]' class='form-control'><a class='video-close' href='javascript:remove_video("+count+")'><i style='color: red;' class='fa fa-close'></i></a><br></div>");
        count++;
    }
    function remove_video(id) {
        $('#link-'+id).remove();
    }
</script>
