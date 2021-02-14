$(document).ready(function() {
    createSubCat();
});

function createSubCat() {
    $(document).on('click', '#add2', function() {
        var params = {
            subCat: $('#addSubCat').val(),
            cat: $('#cat').val()
        };
        $.ajax({
            url: '/admin/cart/add-subcategory-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {
                    $('#updatecartform-subcategory_id').html(data.value);
                    $('#createcartform-subcategory_id').html(data.value);
                    $('#message2').html('Подкатегория успешно добавлена в список');
                }
            }
        });
    });
}