$(document).ready(function() {
    createLink();
    createTag()
});

function createLink() {
    $(document).on('click', '#add3', function() {
        var params = {
            tagId: $('#createlinktagform-tagid').val(),
            cartId: $('#add3').attr('data-id')
        };
        $.ajax({
            url: '/admin/cart/add-link-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {

                    $('#tags').html(data.value);
                    // $('#message2').html('Подкатегория успешно добавлена в список');
                }
            }
        });
    });
}


function createTag() {
    $(document).on('click', '#add4', function() {
        var params = {
            tag: $('#createproducttagform-title').val()
        };
        $.ajax({
            url: '/admin/producttag/add-tag-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {

                    $('#createlinktagform-tagid').html(data.value);
                    $('#message4').html('Tег успешно добавлена в список');
                }
            }
        });
    });
}