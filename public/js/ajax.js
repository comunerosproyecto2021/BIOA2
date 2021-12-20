function setAjax(url, data={}, funcion="") {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: url,
        method: "post",
        data: data,
        success: function (result) {
            
            if(funcion!="") {
                eval( funcion + "("+ JSON.stringify(result) + ")" );
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.error(xhr.responseJSON);
         
        }
    });
}
