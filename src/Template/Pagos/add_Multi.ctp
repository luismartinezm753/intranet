<div class="pagos form col-lg-offset-2 col-lg-7">
    <?= $this->Form->create(false) ?>
    <?php foreach ($users as $user):
            echo '<br><strong>'.$user->full_name.'</strong>';
            echo $this->Form->checkbox('users['.$user->id.'][selected]',['id'=>'select-'.$user->id,'onclick'=>'display_add_form('.$user->id.')']).'<br>';
            echo '<div style="display: none;" id= form-'.$user->id.'>';
            echo $this->Form->input('users['.$user->id.']user_id]', ['type' => 'hidden','value' => $user->id,'id'=>'user-'.$user->id]);
            echo $this->Form->input('users['.$user->id.'][mes]', ['type' => 'month','selected'=>'0','id'=>'month-'.$user->id,'label'=>'Mes']);
            echo $this->Form->input('users['.$user->id.'][monto]',['default' => $user->monto_paga,'id'=>'monto-'.$user->id,'label'=>'Monto']);
            echo $this->Form->input('users['.$user->id.'][año]', ['type' => 'year', [
                'minYear' => date('Y')-2,
                'maxYear' => date('Y')+2
            ],'value'=> date('Y'),'id'=>'year-'.$user->id,'label'=>'Año']);
            echo $this->Form->input('users['.$user->id.'][forma_pago]', ['options'=>['Efectivo'=>'Efectivo','Transferencia'=>'Transferencia','Cheque'=>'Cheque'],'id'=>'pago-'.$user->id,'label'=>'Forma de Pago']);
            echo $this->Form->button('Cancelar',['type'=>'button','onclick'=>'hide_add_form('.$user->id.')','class'=>'btn btn-danger','id'=>'cancel-'.$user->id]);
            echo '</div>';
        endforeach;
        echo $this->Form->button(__('Agregar Pagos'),['class'=>'btn btn-primary']);
        echo $this->Form->end(); ?>
</div>
<script>
    function display_add_form(id){
        $("#form-"+ id).show('fast');
        $("#select-"+ id).hide();
    }
    function hide_add_form(id) {
        $("#form-"+ id).hide('fast');
        $("#select-"+ id).show();
    }
</script>