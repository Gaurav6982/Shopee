<?php
  $product_shuffle=$product->getByLimit('product',5);
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    if(isset($_POST['new_phone_submit']))
    {
      $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
  }
?>
<!-- New Phones -->
<section id="newPhone">
          <div class="container py-4">
            <h2 class="font-musio">New Phone</h2>
            <hr>

            <!-- Owl Carousel -->
            <div class="owl-carousel owl-theme">
              <?php foreach($product_shuffle as $item){?>
                <div class="item py-2">
                  <div class="product font-sri">
                    <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"><img src="<?php echo $item['item_image'] ?? './assets/top1.png'?>" alt="Image1" class="img-fluid"></a>
                    <div class="text-center">
                      <h6><?php echo $item['item_name'] ?? "Product Name"?></h6>
                      <div class="rating text-warning font-12">
                        <span><i class="fas fa-star"></i> </span>
                        <span><i class="fas fa-star"></i> </span>
                        <span><i class="fas fa-star"></i> </span>
                        <span><i class="fas fa-star"></i> </span>
                      </div>
                      <div class="price py-2">
                        <span>$<?php echo $item['item_price'] ?? 0?></span>
                      </div>
                      <form method="post">
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']?>">
                        <?php
                          if(in_array($item['item_id'],$cart->getCartId($product->getData('cart'))??[] ))
                          {
                            echo '<button type="submit" class="btn btn-success font-12" disabled>In The Cart</button>  ';
                          }
                          else
                          {
                            echo '<button type="submit" name="new_phone_submit"class="btn btn-warning font-12">Add to Cart</button>  ';
                          }
                        ?>  
                      </form>
                    </div>
                  </div>
                </div>
              <?php }?>
            </div>
            <!-- End Owl Carousel -->
          </div>
        </section>

        <!-- !New Phones -->