

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-transparent">
    <div class="page-header-content">
        <div class="page-title">
            <h1> <span class="text-semibold">{{l.SettingsSliderPage.1}}</span></h1>
        </div>

        
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
		{% include "admin/elements/flash.twig" %}
















<form class="form-horizontal" method="post" action="{{path_for('beside-slider')}}" enctype='multipart/form-data'>
  {!! csrf_field() !!}
   <div class="row">
    <div class="col-md-6">
        <div class="panel panel-flat">
            <div class="panel-heading no-padding-bottom">
                <h3 class="panel-title">{{l.SettingsSliderPage.2}}</h3>
            </div>
            <div class="panel-body">
			<fieldset class="content-group">
                      <legend class="text-bold"></legend>
                       <input type="hidden" name="slidertoprightChanged">
                       <label for="slidertopright" class="btn btn-danger btn-rounded"><i class="icon-image2 position-left"></i> 
                       {{l.SettingsSliderPage.4}} </label>
                       <input name="slidertopright" id="slidertopright" accept="image/jpg, image/jpeg, image/png" style="visibility:hidden;" type="file" />
                       <div  class="preview-slider" id="previewslidertopright"><img src="{{url.slider}}{{'HOME_SLIDER_RIGHT_TOP'|options }}" alt=""></div>
              </fieldset>
            </div>
        </div>
        </div>
            <div class="col-md-6">

        <div class="panel panel-flat">
            <div class="panel-heading no-padding-bottom">
                <h3 class="panel-title">{{l.SettingsSliderPage.3}}</h3>
            </div>
            <div class="panel-body">
            	<fieldset class="content-group">
					<legend class="text-bold"></legend>
                           <input type="hidden" name="sliderbottomrightChanged">
							   <label for="sliderbottomright" class="btn btn-danger btn-rounded"><i class="icon-image2 position-left"></i>{{l.SettingsSliderPage.4}}</label>
							   <input name="sliderbottomright" id="sliderbottomright" accept="image/jpg, image/jpeg, image/png" style="visibility:hidden;" type="file" />
               
            <div class="preview-slider"  id="previewsliderbottomright"><img src="{{url.slider}}{{'HOME_SLIDER_RIGHT_BOTTOM'|options }}" alt=""></div>
                </fieldset>
                
            </div>
        </div>
        
    </div>
    
    </div>
    <div class="row">
    <div class="col-md-12">
    <button type="submit" class="btn btn-block btn-primary">{{l.SettingsSliderPage.5}} <i class="icon-arrow-left13 position-right"></i></button>
</div>
    </div>
</form>

</div>


</div>



