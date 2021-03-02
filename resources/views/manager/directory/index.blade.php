@extends('manager/layout')

@section('title')
{{ __('Directory') }} 
@endsection
@section('content')
  
         
<!-- Main content -->

<!-- Page header -->
<div class="content-wrapper">
<div class="page-header page-header-default ">
<div class="page-header-content">

<div class="page-title">
<h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>
{{ __('directory') }}
</span></h1>
</div>


<div class="heading-elements div_btn">
    <a href="{{ route('manager.directory.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b>
        <i class="icon-plus3"></i></b>{{ __('create directory') }}
    </a>
</div>


</div>
        <div class="breadcrumb-line">
<ul class="breadcrumb">
    <li><a href="" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
    <li class="active" title="{{ __('Directories') }}" >{{ __('Directories') }}</li>
</ul>
<ul class="breadcrumb-elements not-collapsible  ">
</ul>

</div>
</div>
<!-- /page header -->




<!-- Content area -->		

<div class="content">
<!-- empty state -->
 @if ($stores_categories->isEmpty())
<div class="empty_state text-center">
    <i class="icon-library2 empty_state_icon"></i>
    <h4>{{ __("it looks like you didn't Add any stores yet") }}</h4>
    <a href="{{ route('manager.directory.create') }}" class="btn bg-blue btn-labeled heading-btn showUploader2"><b>
        <i class="icon-plus3"></i></b>
        {{ __('Add new Directory') }}
    </a>
</div>
@endif
<!-- empty state -->



 @if (!$stores_categories->isEmpty())

<div class="panel panel-flat table-panel table-responsive ">
    <table class="table " >
        <thead>
            <tr>
                <th ><i class=" icon-blog"></i><b>{{ __('Thumbnail') }}</b></th>
                <th ><i class=" icon-user"></i><b>{{ __('Name') }}</b></th>
                <th ><i class=" icon-link"></i><b>{{ __('Slug') }}</b></th>
                <th class="text-center" ><i class=" icon-pencil4"></i><b>{{ __('edit') }}</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores_categories as $category)
                <tr>
                    <td data-label="{{ __('logo') }}">
                        <div class="product-image-list"> 
                            {!! $category->presentThumbnail() !!}
                        </div>
                    </td>
                    <td data-label="{{ __('Name') }}">{{ $category->name }}</td>
                    <td data-label="{{ __('Slug') }}">{{ $category->slug }}</td>
                
                    <td data-labe="{{ __('edit') }}" class="text-center">
                        <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm"  href="{{ route('manager.directory.edit',['id' => $category->id]) }}">edit</a>
                        <ul class="icons-list hidden-xs">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="{{ route('manager.directory.edit',['id' => $category->id]) }}" class="text-primary-600">
                                            <i class="icon-pencil7 position-left"></i>{{ __('Directory Edit') }} 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('manager.directory.delete', ['id' => $category->id]) }}" class="text-danger-600">
                                            <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
<div><center>{{ $stores_categories->links()  }}</center></div>
    </div>
</div>
</div>
</div>
</div>
@endsection
            
