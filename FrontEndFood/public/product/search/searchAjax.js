function searchKey(event){
    event.preventDefault();
    var urlSearch = $(this).data('url');
    var check = $('#inputSearch').val();
    $.ajax({
        type: "GET",
        url: urlSearch,
        success: function (result) {
            if(check == '')
            {
                Swal.fire(
                    'error',
                    'Asking your enter key',
                    'thanks'
                )
            }
        }
    });

}



$(function(){
    $('#searchKey').on('click', searchKey);
   
});

