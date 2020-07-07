 <?php
    ob_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['delete_submit']))
        {
            $cart->DeleteFrom('cart',$_POST['item_id']);
        }

        if(isset($_POST['wishlist_submit']))
        {
            $cart->SaveFromTo($_POST['item_id']);
        }
    }
 ?>
 <!-- Shopping Cart Section -->
 <section  id="cart" class="py-3">
            <div class="container-fluid w-75 py-4">
                <!-- Shopping Cart items -->
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            foreach($product->getData('cart') as $item):
                                $cartitem=$product->getProduct($item['item_id']);
                                $subTotal[]=array_map(function($item){
                        ?>
                        <h5 class="font-musio">Cart Items</h5>
                        <!-- Cart Item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <a href="<?php printf("product.php?item_id=%s",$item['item_id']);?>"><img src="<?php echo $item['item_image']??"./assets/apple1.png"?>" alt="Cart1" class="img-fluid" style="height: 120px;"></a>
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-20"><?php echo $item['item_name']??"Name"?></h5>
                                <small>by <?php echo $item['item_brand']??"Brand"?></small>
                                <div class="d-flex">
                                    <div class="rating text-warning font-12">
                                        <span><i class="fas fa-star"></i> </span>
                                        <span><i class="fas fa-star"></i> </span>
                                        <span><i class="fas fa-star"></i> </span>
                                        <span><i class="fas fa-star"></i> </span>
                                      </div>
                                      <a href="" class="px-2 font-14">20,234 ratings</a>
                                </div>

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">
                                    <div class="w-25 d-flex">
                                        <button class="qty_up border bg-light rounded-left" data-id="<?php echo $item['item_id']?? 0?>" ><i class="fas fa-angle-up"></i></button>
                                        <input type="number" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1" data-id="<?php echo $item['item_id']?? 0?>" >
                                        <button data-id="<?php echo $item['item_id']?? 0?>" class="qty_down border bg-light rounded-right"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0?>">
                                        <button type="submit" name="delete_submit"class="btn btn-outline-danger border-rght mx-2">Delete</button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0?>">
                                        <button type="submit" name="wishlist_submit"class="btn btn-danger">Add to WhishList</button>
                                    </form>
                                    
                                </div>
                                <!-- !product qty -->
                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="text-danger">
                                    $<span class="product_price" data-id="<?php echo $item['item_id']??0?>"><?php echo $item['item_price']??"0"?></span>
                                </div>
                            </div>
                        </div>
                        <!-- !C!art Item -->
                        <?php 
                            return $item['item_price'];
                                },$cartitem);
                            endforeach;
                            // print_r($subTotal);
                        ?>
                        
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