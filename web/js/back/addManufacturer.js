$(document).ready(function() {
    createMan();
});

function createMan() {
    $(document).on('click', '#add1', function() {
        var params = {
            man: $('#creatmanufacturerform-manufactured').val()
        };
        $.ajax({
            url: '/admin/cart/add-manufactured-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {
                    $('#createcartform-manufacturer').html(data.value);
                    $('#updatecartform-manufacturer').html(data.value);
                    $('#message1').html('Производитель успешно добавлен в список');
                }
            }
        });
    });
}