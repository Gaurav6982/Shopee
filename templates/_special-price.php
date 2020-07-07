<?php
  $brand=array_map(function($item){return $item['item_brand'];},$product_shuffle);
  $unique_brand=array_unique($brand);
  sort($unique_brand);

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    if(isset($_POST['special_price_submit']))
    {
      $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
  }
  $in_cart=$cart->getCartId($product->getData('cart'));
?>
<!-- Special Price -->
<section id="special-price">
          <div class="container">
            <h4 class="font-sri font-20">Special Price</h4>
            <div id="filters" class="button-group text-right">
              <button class="btn is-checked" data-filter="*">All Brand</button>
              <?php
                array_map(function($brand){
                  printf('<button class="btn" data-filter=".%s">%s</button>',$brand,$brand);
                },$unique_brand);
                
              ?>
            </div>

            <div class="grid">
              <?php array_map(function($item) use($in_cart){?>
                <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"?>">
                  <div class="item py-2" style="width: 200px;">
                    <div class="product font-sri">
                      <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"><img src="<?php echo $item['item_image']?>" alt="Image" class="img-fluid"></a>
                      <div class="text-center">
                        <h6><?php echo $item['item_name'] ?? "Unknown"?></h6>
                        <div class="rating text-warning font-12">
                          <span><i class="fas fa-star"></i> </span>
                          <span><i class="fas fa-star"></i> </span>
                          <span><i class="fas fa-star"></i> </span>
                          <span><i class="fas fa-star"></i> </span>
                        </div>
                        <div class="price py-2">
                          <span><?php echo $item['item_price'] ?? 0?></span>
                        </div>
                        <form method="post">
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']?>">
                        <?php
                          if(in_array($item['item_id'],$in_cart??[]))
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
                </div>
              <?php },$product_shuffle);?>
            </div>
          </div>
        </section>
        <!-- End Special PRice -->