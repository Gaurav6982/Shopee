<?php
  $product_shuffle=$product->getData();
  // print_r($product_shuffle);

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    if(isset($_POST['top_sale_submit']))
    {
      $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
  }
?>
<!-- top SaleSection -->
<section id="topSale">
          <div class="container py-4">
            <h2 class="font-musio">Top Sale</h2>
            <hr>

            <!-- Owl Carousel -->
            <div class="owl-carousel owl-theme">
            <?php foreach($product_shuffle as $item){?>  
                <div class="item py-2">
                  <div class="product font-sri">
                    <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"><img src="<?php echo $item['item_image']??"./assets/top1.png" ?>" alt="Image1" class="img-fluid"></a>
                    <div class="text-center">
                      <h6><?php echo $item['item_name'] ?? "Unknown"?></h6>
                      <div class="rating text-warning font-12">
                        <span><i class="fas fa-star"></i> </span>
                        <span><i class="fas fa-star"></i> </span>
                        <span><i class="fas fa-star"></i> </span>
                        <span><i class="fas fa-star"></i> </span>
                      </div>
                      <div class="price py-2">
                        <span>$<?php echo $item['item_price'] ?? '0'?></span>
                      </div>
                      <form method="post">
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']?>">
                        <?php
                          if(in_array($item['item_id'],$cart->getCartId($product->getData('cart'))??[]))
                          {
                            echo '<button type="submit" name="top_sale_submit"class="btn btn-success font-12" disabled>In The Cart</button>  ';
                          }
                          else
                          {
                            echo '<button type="submit" name="top_sale_submit"class="btn btn-warning font-12">Add to Cart</button>  ';
                          }
                        ?>
                        
                        
                      </form>
                      
                    </div>
                  </div>
                </div>
                <?php }?>
            </div>
              
              <!-- End of Foreach -->
            <!-- End Owl Carousel -->
          </div>
        </section>
    <!-- !Top Sale Section -->