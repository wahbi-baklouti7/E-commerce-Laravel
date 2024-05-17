@extends('layouts.backoffice.template')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{__('message.add_product')}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
      @csrf
        <div class="card-body">
            <div class="row">
        <div class="form-group col-md-4">
          <label for="name">{{__('message.name')}}</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="Enter category name">
        </div>
        <div class="form-group col-md-4">
            <label for="price">{{__('message.price')}}</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="Enter category name">
          </div>

          <div class="form-group col-md-4">
            <label>{{__('message.category')}}</label>
            <select name="category_id" class="form-control">
              <option>-- Choissessez une categorie --</option>
              @foreach ($categories as $category)
                <option value={{$category->id}} > {{$category->name}} </option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="description">{{__('message.description')}}</label>
            <input name="description" type="text" class="form-control" id="description" placeholder="Enter category name">
          </div>

        {{-- <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div> --}}
        <div class="form-group">
          <label for="photo">{{__('message.image')}}</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="photo" class="custom-file-input" id="inputImage">
              <label  class="custom-file-label" for="inputImage"> {{__('message.choose_file')}} </label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text"> {{__('message.upload')}} </span>
            </div>
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
