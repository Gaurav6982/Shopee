
 <!-- Shopping Cart Section -->
 <section  id="cart" class="py-3">
            <div class="container-fluid w-75 py-4">
                <!-- Shopping Cart items -->
                <h5 class="font-musio">Cart Items</h5>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row text-center border-top">
                            <div class="col-md-12">
                                <h3  style="padding-top:20px ;" class="font-sri">Empty-Cart</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Subtotal section -->
                    
                    <div class="col-sm-3">
                        <div class="subtotal border text-center p-4mt-2">
                            <h6 class="text-dark font-12 p-2"><i class="fas fa-check"></i>Your Order is Eligible for Free Delivery</h6>
                            <div class="border-top py-4">
                                <h5 class="font-14">SubTotal (<?php echo isset($subTotal)?count($subTotal):0;?> Items)&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal)?$cart->getSum($subTotal):0;?></span></span></h5>
                                <button class="btn btn-warning">Proceed To Buy</button>
                            </div>
                        </div>
                    </div>
                    <!-- !Subtotal section -->
                </div>
                <!-- !Shopping Cart items-->
            </div>
        </section>
        <!-- !Shopping Cart Section -->