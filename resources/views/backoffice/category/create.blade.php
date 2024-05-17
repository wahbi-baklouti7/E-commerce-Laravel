@extends('layouts.backoffice.template')

@section('title','Add Category')


@section('content')
{{-- @if (count($errors)>0)
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Errors!</h5>
    <ul
        class=""
    >
        @foreach ($errors->all() as $error)
        <li class="nav-item">
            <p>{{ $error }}</p>
        </li>
        @endforeach
    </ul>

</div>
@endif --}}

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"> {{__('message.add_category')}} </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
      @csrf
        <div class="card-body">
        <div class="form-group">
          <label for="name">{{__('message.name')}}</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="Enter category name">
        </div>
        {{-- <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div> --}}
        <div class="form-group">
          <label for="inputImage">{{__('message.image')}}</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="inputImage">
              <label  class="custom-file-label" for="inputImage">{{__('message.choose_file')}}</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text"> {{__('message.upload')}} </span>
            </div>
          </div>
        </div>
        {{-- <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{__('message.add')}}</button>
      </div>
    </form>
  </div>
@endsection
