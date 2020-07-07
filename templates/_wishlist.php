<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['delete_wish_submit']))
        {
            $cart->DeleteFrom('wishlist',$_POST['item_id']);
        }
        if(isset($_POST['cart_submit']))
        {
            $cart->SaveFromTo($_POST['item_id'],'wishlist','cart');
        }
    }
 ?>
 <!-- Shopping Cart Section -->
 <section  id="cart" class="py-3">
            <div class="container-fluid w-75 py-4">
            <h5 class="font-musio">Wishlist Items</h5>
                <!-- Shopping Cart items -->
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            foreach($product->getData('wishlist') as $item):
                                $cartitem=$product->getProduct($item['item_id']);
                                $subTotal[]=array_map(function($item){
                        ?>
                        <!-- Cart Item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                            <a href="<?php printf("product.php?item_id=%s",$item['item_id']);?>"><img src="<?php echo $item['item_image']??"./assets/apple1.png"?>" alt="Cart1" class="img-fluid" style="height: 120px;"></a>                          </div>
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
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0?>">
                                        <button type="submit" name="delete_wish_submit" class="btn btn-outline-danger border-rght mr-2">Delete</button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']??0?>">
                                        <button type="submit" name="cart_submit" class="btn btn-danger">Add to Cart</button>
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
                  
                </div>
                <!-- !Shopping Cart items-->
            </div>
        </section>
        <!-- !Shopping Cart Section -->