@if(!System::ismobile())
<div class="ps-cart__items">
   <input type="hidden" id="cartcount" value="<?php  echo  ShoppingCart::count(false);?>">
   <?php  if(!empty(ShoppingCart::all())): foreach(ShoppingCart::all() as $product):  ?>
   <div class="ps-product--cart-mobile">
      <div class="ps-product__thumbnail">
         <a href="<?php  route('shop.product',['id' => $product['id'] , 'store' => $store, 'store_category' => $store_category ])  ?>">
         <img src="<?php  echo $product['thumbnail']  ?>" alt="product" />
         </a>
      </div>
      <div class="ps-product__content lhsabbdyaltele">
         <a class="ps-product__remove"
            href="<?php echo route('cart.remove', ['id' => $product->rawId() , 'store' => $store, 'store_category' => $store_category ])   ?>">
         <i class="icon-cross"></i>
         </a>
         <a href="<?php echo route('shop.product',['id' => $product['id'] , 'store' => $store, 'store_category' => $store_category ])  ?>">
         <?php echo $product['name'];  ?>
         </a>
         <p><strong> {{ __('Sold by') }} </strong> {{ $store }}</p>
         <small class="product-col-tele-<?php echo $product['id']  ?>"> <span
            class="prdqty"><?php echo $product['qty']  ?></span> x €<?php echo  $product['price']  ?> <input
            type="hidden" class="preis" value="<?php  echo  $product['total']  ?>"> </small>
      </div>
      <div class="form-group--number zaydnaks updowntintele">
         <button class="up">+</button>
         <button class="down">-</button>
         <input class="quantity-ajax form-control instantQuantity" data-product-id='<?php echo $product['id'];?>'
            data-price='<?php echo $product['price'];  ?>' data-product="<?php echo $product->rawId();  ?>"
            type="text" value="<?php echo $product['qty']  ?>">
      </div>
   </div>
   <?php  endforeach;  ?>
   <?php  endif;  ?>
</div>
<div class="ps-cart__footer ps-cart__footer2 ">
   <h3 class="jahnama">
      {{ __('Total') }}<strong><?php echo $symbol  ?><?php  echo  ShoppingCart::total()  ?></strong>
   </h3>
   <figure>
      <a class="ps-btn" href="<?php echo route('cart', ['store' => $store, 'store_category' => $store_category ])  ?>"
         style="background-color: rgb(195, 20, 50);"> <?php echo trans('View Cart')  ?></a>
      <a class="ps-btn" href="<?php echo route('checkout', ['store' => $store, 'store_category' => $store_category ])  ?>"
         style="background-color: rgb(195, 20, 50);"><?php echo trans('Checkout')  ?></a>
   </figure>
</div>


@else


@foreach(ShoppingCart::all() as $product)
<div class="ps-product--cart-mobile">
   <div class="tachbkat align-self-center">
      <div class="removit align-self-center">
      <a class="ps-product__remove" href="<?php echo route('cart.remove', ['id' => $product->rawId() , 'store' => $store, 'store_category' => $store_category ])   ?>"><i class="icon-cross"></i></a>
   </div>
   <div class="ps-product__thumbnail"><a href="<?php echo route('shop.product',['id' => $product['id'] , 'store' => $store, 'store_category' => $store_category ])  ?>"><img src="{{ $product['thumbnail'] }}" alt=""></a></div>
   <div class="ps-product__content lhsabbdyaltele"><a href="<?php echo route('shop.product',['id' => $product['id'] , 'store' => $store, 'store_category' => $store_category ])  ?>">{{ $product['name'] }}</a><br>
      <small class="product-col-tele-<?php echo $product['id']  ?>"> <span class="prdqty"><?php echo $product['qty']  ?></span> x €<?php echo  $product['price']  ?> <input type="hidden" class="preis" value="<?php  echo  $product['total']  ?>"> </small>
   </div>
   <div class="form-group--number zaydnaks updowntintele align-self-center">
      <button class="up fix-pos">+</button>
      <button class="down fix-pos">-</button>
      <input class="quantity-ajax form-control instantQuantity"  data-product-id='<?php echo $product['id']  ?>' data-price='<?php echo $product['price'];  ?>' data-product="<?php echo $product->rawId();  ?>" type="text" value="<?php echo $product['qty']  ?>">
   </div>
   </div>
</div>
@endforeach
<div class="ps-cart__footer ajax">
   <h3>{{ __('Total') }}<strong>€ <span class="TotalPriceM" data-price="<?php  echo  ShoppingCart::total()  ?>"> </span> </strong></h3>
   <figure><a class="ps-btn" href="<?php echo route('checkout', ['store' => $store, 'store_category' => $store_category ])  ?>">{{ __('Checkout') }}</a></figure>
</div>


<style>
@media (max-width: 600px) and (min-width: 0px) {
   .ps-cart__footer.origin {
    display: none;
   }
   .ps-cart__footer.ajax {
    position: absolute;
    bottom: 0;
    width: 100%;
   }
   span.TotalPriceM::after {
    content: attr(data-price);
   }
}
</style>
@endif