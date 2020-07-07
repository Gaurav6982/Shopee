$('document').ready(function(){
    $("#banner-area .owl-carousel").owlCarousel({
        dots:true,
        items:1,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
        },
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
    });

    //top sale carousel
    $("#topSale .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
    $("#newPhone .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
    //isotope filter
    var $grid=$(".grid").isotope({
        itemSelector:'.grid-item',
        layoutMode:'fitRows'
    });
    $(".button-group").on("click","button",function(){
        var filterValue=$(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    });

    let $qty_up=$(".qty .qty_up");
    let $qty_down=$(".qty .qty_down");
    let $deal_price=$('#deal-price');
    $qty_up.click(function(e){
        // console.log("Hello");
        let $input=$(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price=$(`.product_price[data-id='${$(this).data("id")}']`);
        $.ajax({url:'templates/ajax.php',type:"post",data:{itemid:$(this).data("id")},success:function(result){
           let obj=JSON.parse(result);
        //    console.log(obj);
           let item_price=obj[0]['item_price'];
            // console.log(item_price);
           if($input.val()>=1 && $input.val()<10)
            {
            $input.val(function(index,currValue){
                return ++currValue;
            });
            //increase price
            $price.text(parseInt(item_price*$input.val()).toFixed(2));
            let subtotal=parseInt($deal_price.text())+parseInt(item_price);
            $deal_price.text(subtotal.toFixed(2));
            }
            
        }});//closing ajax

        
        
    });

    $qty_down.click(function(e){
        let $input=$(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price=$(`.product_price[data-id='${$(this).data("id")}']`);
        $.ajax({url:'templates/ajax.php',type:"post",data:{itemid:$(this).data("id")},success:function(result){
           let obj=JSON.parse(result);
        //    console.log(obj);
           let item_price=obj[0]['item_price'];
            // console.log(item_price);
           if($input.val()>1 && $input.val()<=10)
            {
            $input.val(function(index,currValue){
                return --currValue;
            });
            //increase price
            $price.text(parseInt(item_price*$input.val()).toFixed(2));
            let subtotal=parseInt($deal_price.text())-parseInt(item_price);
            $deal_price.text(subtotal.toFixed(2));
            }
            
        }});//closing ajax

        
    });
});