$(document).ready(function() {
    search();
});

function search() {
    $(document).on('click', '#search-submit', function() {
        var params = {
            key: $('#textsearch').val()

        };
        console.log(params);

        $.ajax({
            url: '/site/search-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {
                    $('#addResult').html(data.value);
                    // $('#updatecartform-manufacturer').html(data.value);
                    // $('#message1').html('Производитель успешно добавлен в список');
                }
            }
        });
    });
}