function export_to_excel(payments){
    $.ajax({
        type:"POST",
        url:"<?php echo Router::url(array('controller'=>'Pagos','action'=>'exportToExcel'));?>",
        data: payments,
        success: function(tab){
            alert('success');
        },
        error: function (error) {
            alert(error);
        }
    });
}