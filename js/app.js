$(function() {
    $("#list-user").click(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "list-user-rest.php",
            type: "post",
            dataType:'json',
            success: function(data){
               alert(data.responseText);
            }
        });
    });
}, jQuery);