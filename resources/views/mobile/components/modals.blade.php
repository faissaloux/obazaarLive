<!-- Unauth Modal -->
<div class="modal" id="modalUnauth" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-body">
             <h5 class="modaltitle">{{ __('You have to login') }}</h5>
             <center>
                <a class="btn btn-warning" href="{{ route('mobile.login-view') }}" class="ps-btn">{{ __('Login') }}</a>
             </center>
          </div>
       </div>
    </div>
 </div>
 
 <!--  ProductAdded Modal -->
 <div class="modal" id="addedTocCart" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-body">
             <h5 class="modaltitle">{{ __('item.added.cart.modal') }}</h5>
             <center>
                <a class="btn btn-warning ps-btn" href="{{ route('mobile.store.cart.index',['store' => \Session::get('store'), 'store_category' => \Session::get('store_category') ]) }}">{{ __('View Shopping Cart') }}</a>
                <a class="btn btn-success ps-btn" href="#" data-toggle="modal" title="{{ __('Continue Shopping') }}" data-target="#addedTocCart">{{ __('Continue Shopping') }}</a>
             </center>
          </div>
       </div>
    </div>
 </div>
 
 <!--  WishlistAdded Modal -->
 <div class="modal" id="modalwishlist" tabindex="-1" role="dialog" >
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h5 class="modaltitle">{{ __('wishlist.added') }}</h5>
            <center>
               <a class="btn btn-warning ps-btn" href="{{ route('mobile.store.wishlist.grid',['store' => \Session::get('store'), 'store_category' => \Session::get('store_category') ]) }}">{{ __('My Wishlist') }}</a>
               <a class="btn btn-success ps-btn" href="#" data-toggle="modal" title="{{ __('Continue Shopping') }}" data-target="#modalwishlist">{{ __('Continue Shopping') }}</a>
            </center>
         </div>
      </div>
   </div>
</div>