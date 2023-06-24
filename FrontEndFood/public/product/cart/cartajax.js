

function addTocart(event)
{
    event.preventDefault();
    let urlShoppingCart = $(this).data('url');
    var cart = $('.fa-shopping-cart');
    var image = $(this).parent().find("img");
  
 
          
    $.ajax({
        type: 'GET',
        url: urlShoppingCart,
        success: function (data) {
           
            if (data.code == 200) {
                image.clone().appendTo('body').offset({
               
                })
                
            }

        },
        error: function () {

        }
    });
  

          

    

}
$(function(){
    $('.add-to-cart').on('click', addTocart);
})


function cartUpdate(event) { 
    event.preventDefault();
    let urlUpdateCart = $('.update_cart_url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity').val();
    $.ajax({
        type:"GET",
        url: urlUpdateCart,
        data:{id: id,quantity: quantity},
        success: function(data){
            if(data.code === 200)
            {
                $('.cart_Waraper').html(data.cart_components);
                Swal.fire({
                    icon: 'success',
                    title: 'Update'
                  });
            }
        },
        error: function(data){

        }
    });


}
function deleteCart(event)
{
    event.preventDefault();
    let urlDeleteCart = $('.cart_info').data('url');
    let id = $(this).data('id');
    
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlDeleteCart,
                data:{id: id},
                success: function (data) {
                    if (data.code == 200) {
                        $('.cart_Waraper').html(data.cart_components);
                        id.parent().parent().remove();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }

                },
                error: function () {

                }
            });


        }
    })
}
$(function () 
{
    $(document).on('click', '.cart_update', cartUpdate);
    $(document).on('click', '.cart_delete1', deleteCart);
})