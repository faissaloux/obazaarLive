@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('wishlist') }}
@endsection

@section('content')


<main class="main">

            <div class="ps-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="icon-home"></i></a></li>
                        <li>{{ __('account') }}</li>
                        <li>{{ __('wishlist') }}</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                        @include(\System::$ACTIVE_THEME_PATH.'.account.elements.sidebar')
                        <div class="col-lg-8">
                            <div class="ps-section__right">
                                <div class="ps-section--account-setting">
                                    @if($wishlist->count() != 0)
                                     <div class="ps-section__header">
                                        <h3>{{ __('Wishlist') }}</h3>
                                     </div>
                                  @endif
                                    <div class="ps-section__content">
                                        @if($wishlist->count() != 0)
                                     <div class="table-responsive">
                                         <table class="table ps-table--whishlist">
                                             
                                             <tbody>
                                                @foreach($wishlist as $product)
                                                 <tr>
                                                 <td><a href="{{ route('account.wishlist.remove', [ 'id' => $product->id  ]) }}"><i class="icon-cross"></i></a></td>
                                                     <td>
                                                         <div class="ps-product--cart">
                                                             <div class="ps-product__thumbnail"><a href="#">{!! $product->product->presentThumbnail() !!}</a></div>
                                                             <div class="ps-product__content"><a href="#">{{$product->product->name }}</a></div>
                                                         </div>
                                                     </td>
                                                     <td class="price">{{ System::currency() }} {{ $product->product->presentPrice() }}</td>
                                                 </tr>
                                                 @endforeach
                                             </tbody>
                                             <tbody>
                                                 <tr class="wishclearall">
                                                    <th colspan="4">
                                                        <a class="ps-btn" href="{{ route('account.wishlist_clear') }}">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                            {{ __('clear wishlist') }}
                                                        </a>
                                                    </th>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>
                                     @else
                                        <div class="ps-table--invoices">
                                             <div class="row text-center">
                                                  <div class="empty-order">
                                                      <i class="icon-heart"></i>
                                                      <p>{{ __('You have no favorites') }}</p>
                                                      <a class="ps-btn" href="/">{{ __('Continue Shopping') }}</a>
                                                  </div>
                                             </div>
                                          </div>
                                     @endif

                                 </div>
                                </div>
                            </div>
                         </div>
                </div>
            </div>

            <div class="mb-5"></div>
        </main>



@endsection
