$(function () {
    
    $('tbody').on('click', '.del-btn', function () {
        
        let data = 'id=' + this.id;

        $.ajax({
            type: "get",
            url: "url",
            data: data,
            dataType: "dataType",
            success: function (response) {
                
            }
        });

    });

});