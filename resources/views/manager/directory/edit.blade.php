@extends('manager/layout')

@section('title')
    {{ __('Directory Edit') }}
@endsection
@section('content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>{{ __('Directory Edit') }}</span></h1>
            </div>

            <div class="heading-elements">

            </div>
        </div>

    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <div class="col-md-8">
            <div class="panel panel-flat col-md-12">
                <div class="panel-body">

                    <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('manager.directory.update',['id'=>$content->id]) }}" method='POST' action="" autocomplete="off">
                        {!! csrf_field() !!}
                        <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                        <fieldset class="content-group">
                            <legend class="text-bold">{{ __('* ALL FIELDS ARE REQUIRED , PLEASE FILL THEM ALL ') }}</legend>
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('name') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf " name="directoryname" placeholder="{{ __('name') }}" value="{{ $content->name }}">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('Slug') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf " name="url" placeholder="{{ __('Slug') }}" value="{{ $content->slug }}">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('thumbnail') }}</label>
                                <div class="col-lg-10">

                                    <div class="input-group">
                                        <input type="file" class="form-control rf" name="thumbnail" placeholder="{{ __('thumbnail') }}">
                                        <span class="input-group-addon"><i class="icon-blog"></i></span>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save Changes') }}
                                <i class="icon-arrow-left13 position-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <div class="col-md-4">
        @if($content->image)
             <div class="panel panel-flat" > 
                <div class="panel-heading"> {{ __('Preview the directory Image') }}</div>
                <div class="panel-body">
                <div class="slider-image">
                   {!! $content->presentThumbnail() !!}
                </div>
                </div>
            </div>
        @endif
    </div>
    </div>
</div>
@endsection