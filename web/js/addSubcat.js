
let buttons = document.querySelectorAll(".catalog-left button");

buttons.forEach(el => {
    el.addEventListener("click", () => {
        let params = {
            category_Id: el.id
        };
        $.ajax({
            url: '/site/get-subcategory-ajax',
            method: 'post',
            data: params,
            success: function(data) {
                if (data.success == true) {
                    // console.log(data);
                    $('#subcat1').html(data.value);
                    // $('#message2').html('Подкатегория успешно добавлена в список');
                }
            }
        });


    })
})


// $(document).ready(function() {
//     getSubcategory();
// });
//
// function getSubcategory() {
//     $(document).on('click', '#add3', function() {
//         var params = {
//             tagId: $('#createlinktagform-tagid').val(),
//             cartId: $('#add3').attr('data-id')
//         };
//         $.ajax({
//             url: '/admin/cart/add-link-ajax',
//             method: 'post',
//             data: params,
//             success: function(data) {
//                 if (data.success == true) {
//
//                     $('#tags').html(data.value);
//                     // $('#message2').html('Подкатегория успешно добавлена в список');
//                 }
//             }
//         });
//     });
// }