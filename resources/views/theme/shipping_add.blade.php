@extends(\System::$ACTIVE_THEME_PATH.'/layout') 
@section('title') 
    {{ __('Add shipping ') }}
@endsection 

@section('content')

<main class="main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home',['store' => $store, 'store_category' => $store_category ]) }}"><i class="icon-home"></i></a></li>
                <li>{{ __('shipping') }}</li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @include(\System::$ACTIVE_THEME_PATH.'/elements.sidebar')
            <div class="col-lg-8">
                <h2>{{ __('Add new adress') }}  </h2>

                <form action="{{ route('shipping.add',['store' => $store, 'store_category' => $store_category ]) }}" method='post'>
                    @csrf
                    <div class="form-group required-field">
                        <label>{{ __('Full Name ') }}</label>
                        <input type="text" class="form-control" name="given_name" required/>
                    </div>

                    <div class="form-group required-field">
                    	<div class="row">
                    		<div class="col-md-6">
                    		<label>{{ __('Street Address') }} </label>
                        	<input type="text" class="form-control" name="street" required/>
                    	</div>
                    	<div class="col-md-6">
                    		<label>{{ __('house number') }} </label>
                        	<input type="text" class="form-control" name="housenumber" required/>
                    	</div>
                    	</div>
                        
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('City') }} </label>
                        <input type="text" class="form-control" name="city" required/>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('Country') }}</label>
                                <input type="text" class="form-control" name="country_code" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ __('State/Province') }}</label>
                                <input type="text" class="form-control" name="state" required/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group required-field">
                                <label>{{ __('Zip/Postal Code ') }}</label>
                                <input type="text" class="form-control" name="postal_code" required/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group required-field">
                        <label>{{ __('Phone Number') }} </label>
                        <div class="form-control-tooltip">
                            <input type="tel" class="form-control" name="phone" required/>
                        </div>
                    </div>
                    <div class="checkout-steps-action">
                        <input class="ps-btn" type="submit" value="{{ __('Save Changes') }}"/>
                    </div>
                </form>

            </div>

            
        </div>
    </div>

</main>

@endsection