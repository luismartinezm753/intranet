function updateResult(){
          //getting the value of month
    var month1=$('.input.date select[name$="[month]"]').val();
    var day1=$('.input.date select[name$="[day]"]').val();
    var year1=$('.input.date select[name$="[year]"]').val();
    /*$(function() {
        var targeturl = $(this).attr('rel') + '?day=' + day1+'?month='+month1+'?year='+year1;
        $.ajax({
            type: 'get',
            url: targeturl,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            },
            success: function(response) {
                if (response.content) {
                    $('#prueba').html(response.content);
                }
            },
            error: function(e) {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
    });*/
}