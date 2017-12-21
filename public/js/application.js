$(document).ready(function () {
    $('#test').on('click', function () {
        alert('hello');
    });
    
    $('#search').autocomplete({
        source: "/categorysearch",
        // minLength:2,
        select:function(key, value){ 
            // if ($data== -1) {
            //     $(this).val('');
            // }
            console.log(value);
            // alert(value.item.id);
         }
    });
});
