@extends('layouts.backoffice.template')


@section('title','Products')


@section('content')



        <form method="POST" action="{{ route('product.deleteAll') }}">
            @method('DELETE')
            @csrf
            <button type="submit"  class="btn btn-danger delete-all-product-btn" > <i class="fas fa-trash"></i> {{__('message.delete_all')}}</button>
        </form>
<div class=" d-flex justify-content-end  mb-3">
    <a href="{{ route('product.create') }}" class="btn btn-primary text-end"> <i class="fas fa-plus"></i> {{__('message.add_product')}}</a>
</div>
  <div class="card">


    <div class="card-header">
      <a href="{{route('category.archived')}}">{{__('message.view_archived_products')}}</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>{{__('message.name')}}</th>
          <th>{{__('message.image')}}</th>
          <th>{{__('message.description')}}</th>
          <th>{{__('message.category')}}</th>
          <th>{{__('message.price')}}</th>
          <th>{{__('message.created_on')}}</th>
          <th>{{__('message.edit')}}</th>
          <th>{{__('message.delete')}}</th>
        </tr>
        </thead>
        <tbody>
@foreach ($products as $product)
<tr class="text-center" data-id="{{ $product->id }}">
  <td>{{ $product->name }}</td>
  {{-- <td>{{ $product->wahbi }}</td> --}}
  <td><img src="{{ file_exists(public_path('storage/products/'.$product->photo)) ?  asset('storage/products/'.$product->photo)   : $product->photo }}" width="80px" alt="{{ $product->name }}"></td>
  <td>{{ Str::limit($product->description,20) }}</td>
  <td>{{ $product->category->name ?? "test" }}</td>
  <td>{{ $product->price }}</td>
  <td>{{ $product->created_at }}</td>
  <td>
    {{-- <div class="text-center"> --}}


    <a href={{ route('product.edit', $product->id) }} class="btn btn-warning "> <i class="fas fa-edit"></i> {{__('message.edit')}}</a>
{{-- </div> --}}
  </td>

  <td>
    {{-- <div > --}}
        {{-- <form method="POST" action="{{ route('product.destroy', $product->id) }}">
            <form method="POST">
            @method('DELETE')
            @csrf --}}
            {{-- <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</a> --}}
            <button type="button"  class="btn btn-danger delete-product-btn" > <i class="fas fa-trash"></i> {{__('message.delete')}}</button>

        {{-- </form> --}}
    {{-- </div> --}}
  </td>


</tr>
@endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>


@endsection





