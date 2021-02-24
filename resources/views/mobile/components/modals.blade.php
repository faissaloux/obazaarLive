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
                <a class="btn btn-warning" href="{{ route('mobile.store.cart.index',['store'  => $store ]) }}"  class="ps-btn">{{ __('View Shopping Cart') }}</a>
                <a class="btn btn-success" href="#" data-toggle="modal" title="{{ __('Continue Shopping') }}" data-target="#addedTocCart" class="ps-btn">{{ __('Continue Shopping') }}</a>
             </center>
          </div>
       </div>
    </div>
 </div>