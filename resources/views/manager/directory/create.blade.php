@extends('manager/layout')

    @section('title')
        {{ __('create directory') }}
    @endsection


@section('content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>{{ __('create directory') }}</span></h1>
            </div>

            <div class="heading-elements">

            </div>
        </div>

    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        @include('manager/elements/form-messages')
        
        <form class="form-horizontal" action="{{ route('manager.directory.store') }}" method='POST' action="" autocomplete="off" enctype="multipart/form-data" >
            {!! csrf_field() !!}

            <div class="col-md-12">
                <div class="panel panel-flat col-md-12">
                    <div class="panel-body">

                        <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                        <fieldset class="content-group">
                            <h1>{{ __('directory info') }}</h1>
                            <hr>
                            <br>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('name') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf " value="{{ old('directoryname') }}" name="directoryname" placeholder="{{ __('name') }}" value="">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('url') }}</label>
                                <div class="hidden">
                                    {{ __('example :  ') }} {{ route('base') }}
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf" value="{{ old('url') }}" name="url" placeholder="{{ __('url') }}" value="">
                                        <span class="input-group-addon"><i class="icon-link"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('thumbnail') }}</label>
                                <div class="col-lg-10">

                                    <div class="input-group">
                                        <input type="file" class="form-control rf"  name="thumbnail" placeholder="{{ __('thumbnail') }}">
                                        <span class="input-group-addon"><i class="icon-blog"></i></span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                    {{ __('create new directory') }}
                    <i class="icon-arrow-left13 position-right"></i>
                </button>
            </div>

        </form>

    </div>
</div>
@endsection