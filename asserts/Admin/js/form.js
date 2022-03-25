jQuery(document).ready(function ($)  {
    $( "#form-submit" ).click(function(event) {
        event.preventDefault();
        var value = $("form").serializeArray();

        $.ajax({
            url: se_form_submit.ajax_url,
            type: "post",
            dataType: "json",
            data: value,
            success: function (value){
                if(value.status == true){
                    document.getElementById('response_msg').innerHTML = value.message;

                };
            }
        });
    });
});