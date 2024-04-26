
@extends('layouts.backoffice.template')
@section('title','Edit Category')
@section('content')

<form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="card-body">
      <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" value="{{ $category->name }}" placeholder="Enter category name">
      </div>
      {{-- <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div> --}}
      <div class="form-group">
        <label for="inputImage">Image</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" value="{{ $category->image }}" id="inputImage">
            <label  class="custom-file-label" for="inputImage">Choose file</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Upload</span>
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
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
  @endsection
