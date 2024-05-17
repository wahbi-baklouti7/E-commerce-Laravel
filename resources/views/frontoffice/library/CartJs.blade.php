{{-- @section('cartjs') --}}
<script >

    $(document).ready(function(){

       $('.add-to-cart-btn').click(handleAddToCart)
        $('.cart-remove-btn').click(handleRemoveFromCart)
        $('.clear-cart').click(handleClearCart)
        $('.small-cart-remove-btn').click(handleSmallCartRemoveBtn)
        $('.inc').on('click',handleIncrementCartBtn)
        $('.dec').click(handleDecrementCartBtn)

    })


    function handleIncrementCartBtn(){
        const t = $(this).parent()
        const id = t.find('.cart-plus-minus-box').data('cart-item-id')
        // alert(id)
        const price = t.parent().parent().find('.product-price-cart').text().replace("$", "").trim()
        // console.log('price: '+price)
        // console.log(t.find('.cart-plus-minus-box').val())
        // console.log(t.parent().parent().find('.product-subtotal').text())
        const productSubtotal= t.parent().parent().find('.product-subtotal')
        const grandTotalPrice = $('.grand-total-price')
        const totalPrice=$('.total-price')



        const countCart = $('.count-style');
        let boxQuantity = $(this).closest('.cart-plus-minus').find('.cart-plus-minus-box')
        // boxQuantity.val()+=1

        // console.log('total price: '+grandTotalPrice)
        // console.log('productSubtotal: '+productSubtotal.text())
        // console.log('box val: '+boxQuantity.val())
        // const newProductSubtotal = parseInt(productSubtotal.text().replace("$", ""))+ parseInt(price)
        const newProductSubtotal = parseInt(price)*parseInt(boxQuantity.val())
        const newTotalPrice= parseInt(grandTotalPrice.text().replace("$", "")) + newProductSubtotal
        // console.log(boxQuantity.val())
        // console.log('productSubtotal: '+productSubtotal.text())
        // console.log( 'grand tatal'+ grandTotalPrice.text())


        productSubtotal.text("$ "+newProductSubtotal)

        grandTotalPrice.text("$ "+newTotalPrice)

        totalPrice.text("$ "+newTotalPrice)


        $.ajax({
            type:'POST',
            data:{id:id,quantity:boxQuantity.val()},
            // url:`/cart/increment/${id}`,
            url:`/cart/increment`,

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

            },
            success: function (response){
                console.log(response)
            }
        })


        // alert('increment')

    }

    function handleDecrementCartBtn(){
        alert('decrement')
    }


    function handleSmallCartRemoveBtn(){

        const item = $(this).parent().parent()
        const countCart = $('.count-style');
        const shoopingCartTotal = $('.shopping-cart-total .shop-total')
        console.log(item.data('cart-id'))
        const id = item.data('cart-id')

        $.ajax({

        type: "DELETE",
        url:`/cart/removeFromCart/${id}`,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },




    success: function (response) {
// alert("success")
// console.log(response['data'])
    const data= response.data
    const len = response.num
// console.log('data: '+response.data[0])
// console.log("lenght: "+data.length)







    shoopingCartTotal.text("$ "+response.total)
    countCart.text(len)
    item.remove()




    }
    })
    }

    function handleClearCart() {

        const tbody = $('.tbody')
        const productSubtotal= $('.total-price')
        const countCart = $('.count-style');
        $.ajax({
            type: "delete",
            url: '/cart/clearCart',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response)
                tbody.empty()
                tbody.html("<h2>Your cart is currently empty.</h2>")
                productSubtotal.text("$ 0.00")
                countCart.text(0)
                // window.location.reload()
            }
        })
    }

    function handleRemoveFromCart() {

        let id = $(this).data('cart-item-id')
        const tr = $(this).closest('tr')
        const productSubtotal= $('.total-price')
        const grandTotalPrice = $('.grand-total-price')
        const countCart = $('.count-style');
        console.log(productSubtotal.text())
        $.ajax({

            // async:true,
type: "DELETE",
url:`/cart/removeFromCart/${id}`,
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},


// url:'/cart/addToCart/'+id,
// data: {
//     id: id
// },

success: function (response) {
    // alert("success")
    console.log(response['data'])
    const data= response.data
    const len = response.num
    console.log('data: '+response.data[0])
    console.log("lenght: "+data.length)


    countCart.text(len)
    productSubtotal.text("$" +response.total)
    grandTotalPrice.text("$" +response.total)
    tr.detach()

}
})


    }
    function handleAddToCart() {

        let id = $(this).data('product-id')
        let shoopingCart = $('.shopping-cart-content').find('ul');
        const countCart = $('.count-style');

        const matchingItem = shoopingCart.find(`[data-cart-id="${id}"]`)
        const itemExists = $('ul li[data-cart-id="'+id+'"]')
        const shoopingCartTotal = $('.shopping-cart-total .shop-total')







        // console.log(shoopingCart)
        // alert(id)
        $.ajax({

            type: "post",
            url:`/cart/addToCart/${id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },


            success: function (response) {
                // alert("success")
                const newCount= response.num
                const data = response.data
                console.log('total: '+response.total)
                const cartItme= response.data[id]
                const totalPrice = cartItme.price*cartItme.quantity

                if(itemExists.length == 0){
                    const item = `
                <li data-cart-id="${cartItme.id}" class="single-shopping-cart">
                                    <div class="shopping-cart-img">
                                        <a href="#"><img alt="" style="width: 80px"src="{{asset('storage/products/${cartItme.photo}')}}"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h5><a href="#"> {{Str::limit($product['name'], 15)}}</a></h5>
                                        <h6>Qty: ${cartItme.quantity}</h6>
                                        <span>$ ${cartItme.price}</span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </li>
                                `

                                shoopingCart.append(item)
                                countCart.text(newCount)
}else{
    itemExists.find('h6').text('Qty: '+cartItme.quantity)

    itemExists.find('span').text('$ '+totalPrice)

}
shoopingCartTotal.text("$ "+response.total)

            }
        })
    }

</script>
{{-- @endsection --}}
