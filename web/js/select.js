$(document).ready(function() {
    select();
    
});

function select() {
    $(document).on('change', '#select', function() {
    	var num = $('#select').val();
        console.log(num);

        

        });
    }
