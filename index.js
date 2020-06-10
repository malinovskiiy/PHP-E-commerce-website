$(document).ready(function(){

    // Init banner owl carousel
    $('#banner-area .owl-carousel').owlCarousel({
        dots: true,
        items: 1
    });

    // Top sale owl carousel
    $('#top-sale .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // isotope init
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    $(".button-group").on("click", "button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue})

    });

    // new phones owl carousel
    $('#new-phones .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    // Blog carousel

    $('#blog .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        center: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            1000: {
                items: 3
            },
        }
    });

    // Quantity
    let $qty_up = $('.qty .qty-up');
    let $qty_down = $('.qty .qty-down');
    let $deal_price = $('#deal-price');
   

    // Click on Quantity up btn
    $qty_up.click(function(e){
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

        // Change product price using ajax call
        $.ajax({
            url: './templates/ajax.php', 
            type: 'post',
            data: {
                itemid: $(this).data("id")
            },
            success: function(result){
                let object = JSON.parse(result);
                let item_price = object[0]['item_price'];
                
                
                if($input.val() >= 1 && $input.val() < 9){
                    $input.val(function(i, oldval){
                        return ++oldval;
                    });
                

                // increase price of the product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                // set subtotal price
                let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
                }

            }
        }); // Closing ajax

        
    });

    // Click on Quantity up btn
    $qty_down.click(function(e){
        let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

        // Change product price using ajax call
        $.ajax({
            url: './templates/ajax.php', 
            type: 'post',
            data: {
                itemid: $(this).data("id")
            },
            success: function(result){
                let object = JSON.parse(result);
                let item_price = object[0]['item_price'];
                
                
                if($input.val() > 1 && $input.val() <= 9){
                    $input.val(function(i, oldval){
                        return --oldval;
                    });
                

                // increase price of the product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                // set subtotal price
                let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
                }

            }
        }); // Closing ajax

        
    });
});