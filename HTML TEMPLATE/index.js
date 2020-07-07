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

    $qty_up.click(function(e){
        let $input=$(`.qty_input[data-id='${$(this).data("id")}']`);
        console.log($input);
        if($input.val()>=1 && $input.val()<10)
        {
            $input.val(function(index,currValue){
                return ++currValue;
            });
        }
    });

    $qty_down.click(function(e){
        let $input=$(`.qty_input[data-id='${$(this).data("id")}']`);
        if($input.val()>1 && $input.val()<=10)
        {
            $input.val(function(i,oldVal){
                return --oldVal;
            });
        }
    });
});