window.onpopstate = function(e){
    if(e.state){
        document.getElementById("content-hidden").innerHTML = e.state.html;
        document.title = e.state.pageTitle;
    }
};
$.urlParam = function (name, url) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(url);
    if (results === null) {
        return null;
    }
    else {
        return results[1] || 0;
    }
};


$.ajaxMenuRequest = function (data) {
    $(".content-hidden").hide();
    NProgress.start();

    $.ajax({
        url: "ajax_router.php",
        data: data,
        type: "get",
        dataType: "html",
        success: function (view) {
            $(".content-hidden").text("").html(view).fadeIn();
            NProgress.done();
            window.history.pushState({"html": view.html, "pageTitle": 'site'}, "", "index.php");

        }
    });
};


