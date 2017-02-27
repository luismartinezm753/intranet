<div class="pagos form col-lg-offset-2 col-lg-7">
    <h2>Agregar Multiples Pagos</h2>
    <?= $this->Form->create(false) ?>
    <?php foreach ($pagos_user as $user_pago):
            echo '<br><strong>'.$user_pago['users']['nombre'].' '.$user_pago['users']['apellido'].'</strong>';
            echo $this->Form->checkbox('selected['.$user_pago['users']['id'].']',['id'=>'select-'.$user_pago['users']['id'],'hiddenField' => false,'onclick'=>'display_add_form('.$user_pago['users']['id'].')']).'<br>';
            echo '<div style="display: none;" id= form-'.$user_pago['users']['id'].'>';
            echo $this->Form->input('users['.$user_pago['users']['id'].']user_id]', ['type' => 'hidden','value' => $user_pago['users']['id'],'id'=>'user-'.$user_pago['users']['id']]);
            echo $this->Form->input('users['.$user_pago['users']['id'].'][mes]', ['type' => 'month','default'=>$user_pago['max_month'],'id'=>'month-'.$user_pago['users']['id'],'label'=>'Mes']);
            echo $this->Form->input('users['.$user_pago['users']['id'].'][monto]',['default' => $user_pago['users']['monto_paga'],'id'=>'monto-'.$user_pago['users']['id'],'label'=>'Monto']);
            if (isset($user_pago['pagos']['año'])){
                echo $this->Form->input('users['.$user_pago['users']['id'].'][año]', ['type' => 'year', [
                    'minYear' => date('Y')-2,
                    'maxYear' => date('Y')+2
                ],'value'=> $user_pago['pagos']['año'],'id'=>'year-'.$user_pago['users']['id'],'label'=>'Año']);
            }else{
                echo $this->Form->input('users['.$user_pago['users']['id'].'][año]', ['type' => 'year', [
                    'minYear' => date('Y')-2,
                    'maxYear' => date('Y')+2
                ],'value'=> date('Y'),'id'=>'year-'.$user_pago['users']['id'],'label'=>'Año']);
            }
            echo $this->Form->input('users['.$user_pago['users']['id'].'][forma_pago]', ['options'=>['Efectivo'=>'Efectivo','Transferencia'=>'Transferencia','Cheque'=>'Cheque'],'id'=>'pago-'.$user_pago['users']['id'],'label'=>'Forma de Pago']);
            echo $this->Form->button('Cancelar',['type'=>'button','onclick'=>'hide_add_form('.$user_pago['users']['id'].')','class'=>'btn btn-danger','id'=>'cancel-'.$user_pago['users']['id']]);
            echo '</div>';
        endforeach;
        echo $this->Form->button(__('Agregar Pagos'),['class'=>'btn btn-primary']);
        echo $this->Html->link(__('Cancelar'),['action'=>'index'],['class'=>'btn btn-danger']);
        echo $this->Form->end(); ?>
</div>
<script>
    function display_add_form(id){
        $("#form-"+ id).show('fast');
        $("#select-"+ id).hide();
    }
    function hide_add_form(id) {
        $('#select-'+id).removeAttr('checked');
        $('#select-'+id).prop('checked', false);
        $("#form-"+ id).hide('fast');
        $("#select-"+ id).show();
    }
</script>