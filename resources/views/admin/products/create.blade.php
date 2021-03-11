 @extends('admin/layout') @section('title') {{ __('Products Create ') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <form class="form-horizontal" method='POST' action="{{ route('admin.products.store') }}" enctype="multipart/form-data">

            {!! csrf_field() !!}
            <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
            <div class="col-md-9">




                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">{{ __('create new product') }}</h6>
                                   
                                </div>

                                @php
                                    $langs = \System::$LANGS_NAME;
                                @endphp

                                
  

                                <div class="panel-body">
                                    <div class="tabbable tab-content-bordered">
                                        <ul class="nav nav-tabs nav-tabs-highlight">
                                            @foreach($langs as $key  => $lang)
                                               <li @if ($loop->first) class="active" @endif >
                                                <a href="#bordered-{{ $key }}" data-toggle="tab">{{ $lang }}</a></li>
                                            @endforeach
                                          
                                        </ul>

                                        <div class="tab-content">
                                        	

                                            @foreach($langs as $key  => $lang)
                                            <div class="tab-pane has-padding @if ($loop->first) active @endif "  id="bordered-{{ $key }}">
                                            <div class="form-group">
                                                <label class="control-label col-lg-2">{{ __('product name') }}</label>
                                                <div class="col-lg-10">
                                                    <input type="text" class="form-control rf" name="title_{{ $key }}" value="{{ old('title') }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-lg-2">{{ __('description') }}</label>
                                                <div class="col-lg-10">
                                                    <textarea rows="5" id="posteditor_{{ $key }}" name="description_{{ $key }}" class="form-control">{{ old('description') }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                             @endforeach
                                          


                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                       















                <div class="panel panel-flat">
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('stock') }}</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control rf" name="quantity" value="{{ old('quantity') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('sku') }}</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control rf" name="sku" value="{{ old('sku') }}">
                                </div>
                            </div>
                           
                        </fieldset>
                    </div>
                </div>


                <div class="panel panel-flat">
                    <div class="panel-body ">
                        <fieldset class="content-group">
                            <legend class="text-bold">{{ __('price') }}</legend>
                             <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('regular price') }}</label>
                                <div class="col-lg-10">
                                    <input type="text"  pattern="^\d*(\.\d{0,2})?$" class="form-control rf" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('discount price') }}</label>
                                <div class="col-lg-10">
                                    <input type="text"   pattern="^\d*(\.\d{0,2})?$" class="form-control rf" name="discount" value="{{ old('discount') }}">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>



                <div class="panel panel-flat">
                    <div class="panel-body ">
                        <fieldset class="content-group">
                            <legend class="text-bold">{{ __('shipping') }}</legend>
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('weight') }} (KG)</label>
                                <div class="col-lg-10">
                                    <input type="number" class="form-control rf" name="weight" value="{{ old('weight') }}">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('Dimensions') }} (cm) </label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            
                                            <input type="number" class="form-control rf" size="6" placeholder="{{ __('Length') }}" name="length" value="{{ old('length') }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control rf" size="6" placeholder="{{ __('width') }}" name="width" value="{{ old('width') }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control rf" size="6" placeholder="{{ __('height') }}" name="height" value="{{ old('height') }}">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>










                <div class="panel panel-flat">
                    <div class="panel-head">

                    </div>
                    <div class="panel-body ">
                        <fieldset class="content-group">
                            <legend class="text-bold">{{ __('product videos ( youtube links only )') }} </legend>

                            <a href="javascript:;" id="AddMoreProductVideos" style="margin-top: 5px;">{{ __('+ add videos') }}</a>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="col-md-3">

                <button type="submit" class="btn btn-block btn-primary">
                    {{ __('create new product') }}
                    <i class="icon-arrow-left13 position-right"></i>
                </button>
                <br>

                <br>

                <!-- chose thumbnail -->
                <div class="panel panel-white">
                    <div class="panel-heading ">
                        {{ __('feautred image') }}
                    </div>
                    <div class="panel-body">
                        
                        <label  for='uploadThumbnail'></label>
                        <div id="MediaThumbnail">
                            <img src="https://i.imgur.com/ZseyDxi.jpg" id="profile-photo-preview">
                        </div>

                        
                <input type="hidden" id="profile-photo" name="ProductThumbnail" >

                    <span onclick="filemanager.selectFile('profile-photo')" class="btn btn-danger btn-rounded"> <i class="icon-image2 position-left"></i>  {{ __('select thumbnail') }}</span>
                    </div>
                </div>





                  <!-- chose thumbnail -->
                  <div class="panel panel-white">
                    <div class="panel-heading ">                        
                        {{ __('gallery') }}
                    </div>
                    <div class="panel-body">
                        <label  for='uploadThumbnail'></label>
                        <div id="productGallery">
                            
                        </div>

                        <input type="hidden" id="profile-photo" >

                        <span class="btn btn-danger btn-rounded" onclick="filemanager.bulkSelectFile('myBulkSelectCallback')">{{ __('Choose images') }}</span>
                    </div>
                </div>












                <!-- product categories -->
                <div class="panel panel-white div_rtl">
                    <div class="panel-heading">
                        <h6 class="panel-title"> {{ __('product category') }} </h6>
                    </div>
                    <div class="panel-body">
                        <select class="form-control" name="category" style="width:100%;">
                            <option value=""></option>
                            @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- product categories -->

            </div>
        </form>
    </div>
</div>
@endsection