<?php
    ob_start();
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['cart_submit']))
        {
            $cart->addToCart($_POST['user_id'],$_POST['item_id']);
        }
    }
    $item_id=$_GET['item_id']??1;
    foreach($product->getData() as $item):
        if($item['item_id']==$item_id):
?>

<!--Product -->
<section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                            <img src="<?php echo $item['item_image']??"./assets/apple1.png"?>" alt="Product" class="img-fluid">
                            </div>
                        </div>
                        <div class="form-row pt-4 font-14 font-sri">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Proceed To Buy</button>
                            </div>
                            <div class="col">
                                <form method="post">
                            <input type="hidden" name="user_id" value="1">
                            <input type="hidden" name="item_id" value="<?php echo $item["item_id"]??0?>">
                            <?php
                                if(in_array($item['item_id'],$cart->getCartId($product->getData('cart'))??[]))
                                {
                                    echo '<button ctype="submit"class="btn btn-success form-control" disabled>In The Cart</button>  ';
                                }
                                else
                                {
                                    echo '<button type="submit" name="cart_submit" class="btn btn-warning form-control">Add to Cart</button>';
                                }
                            ?>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="font-musio font-20"><?php echo $item['item_name']??"Item Name"?></h5>
                        <small>By <?php echo $item['item_brand']?? "Apple"?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-12">
                                <span><i class="fas fa-star"></i> </span>
                                <span><i class="fas fa-star"></i> </span>
                                <span><i class="fas fa-star"></i> </span>
                                <span><i class="fas fa-star"></i> </span>
                              </div>
                              <a href="" class="px-2">20,524 Ratings</a>
                        </div>
                        <hr class="m-0">

                        <!-- Product price -->
                            <table class="my-3">
                                <tr class="font-14">
                                    <td>M.R.P</td>
                                    <td><strike>$500</strike></td>
                                </tr>
                                <tr class="font-14">
                                    <td>Deal Price</td>
                                    <td class="font-20 text-danger">$<span><?php echo $item['item_price']??0?></span><small class="text-dark">&nbsp;Inclusive of All Taxes.</small></td>
                                </tr>
                                <tr class="font-14">
                                    <td>You Save:</td>
                                    <td class="font-20 text-danger">$<span><?php echo 500-(int)$item['item_price']??0;?></span></td>
                                </tr>
                            </table>
                        <!-- !Product price -->

                        <!-- Policy -->
                            <div id="policy">
                                <div class="d-flex">
                                    <div class="return text-center mr-5">
                                        <div class="my-3 color-yellow">
                                            <span class="border p-3 rounded-pill font-20">
                                            <i class="fas fa-retweet "></i>
                                            </span>
                                        </div>
                                        <a href="">10 Days <br>Replacement.</a>
                                    </div>

                                    <div class="return text-center mr-5">
                                        <div class="my-3 color-yellow">
                                            <span class="border p-3 rounded-pill font-20">
                                            <i class="fas fa-truck "></i>
                                            </span>
                                        </div>
                                        <a href="">Daily <br>Delivery</a>
                                    </div>

                                    <div class="return text-center mr-5">
                                        <div class="my-3 color-yellow">
                                            <span class="border p-3 rounded-pill font-20">
                                            <i class="fas fa-check-double "></i>
                                            </span>
                                        </div>
                                        <a href="">1 Year <br>Warranty</a>
                                    </div>
                                </div>
                            </div>
                        <!-- !Policy -->
                        <hr>
                        <!-- Order Deatails -->
                        <div id="order-deatils" class="d-flex flex-column text-dark">
                            <small>Delivery by: Mar 29-Apr 1</small>
                            <small>Sold By <a href="">My Electronics</a> (4.5 out of 5| 18,195 ratings)</small>
                            <small><i class="fas fa-map-marked-alt color-yellow"></i>&nbsp;Deliver to Customer - 424201</small>
                        </div>
                        <!-- !Order Deatails -->

                        <div class="row">
                            <div class="col-6">
                                <!-- color -->
                                <div class="color my-3">
                                    <div class="d-flex justify-content-between">
                                    <h6>
                                        Color:
                                    </h6>
                                    <div class="p-2 color-yellow-bg rounded-circle"><button class="btn font-14 "></button></div>
                                    <div class="p-2 color-primary-bg rounded-circle"><button class="btn font-14 "></button></div>
                                    <div class="p-2 color-second-bg rounded-circle"><button class="btn font-14 "></button></div>
                                    </div>
                                </div>
                                <!-- !color -->
                            </div>
                            <div class="col-6">
                                <div class="qty d-flex">
                                    <h6>QTY:</h6>
                                    <div class="px-4 d-flex">
                                        <button class="qty_up border bg-light" data-id="<?php echo $item['item_id']??0?>"><i class="fas fa-angle-up"></i></button>
                                        <input type="number" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1" data-id="<?php echo $item['item_id']??0?>" >
                                        <button data-id="<?php echo $item['item_id']??0?>" class="qty_down border bg-light"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!--! Product-->

<?php
    endif;
    endforeach;
?>