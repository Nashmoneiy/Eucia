$(document).ready(function (e) {
   

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    function loadCart() {
        $.ajax({
            method : "GET",
            url : url_name,
            success : function (response) {
                $('.cart-count').html(response.count);
            }

        })
        
    }
    loadCart();


    
    function loadWishlist() {
        $.ajax({
            method : "GET",
            url : "/shop/ecommerce/public/load-wishlist-data",
            success : function (response) {
                $('.wishlist-count').html(response.count);
            }
        })
    }

    loadWishlist();
    
})