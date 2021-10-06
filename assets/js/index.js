function addtocart(prodId,prName)
{ 
$.ajax({
        url: "cart.php",
        type: "post",
        data: {'productId':prodId,'productName':prName} ,
        success: function (response) {

           alert('Added to cart');
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
} 