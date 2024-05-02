@extends('layouts.backoffice.template')


@section('title','Categories')


@section('content')



<div class=" d-flex justify-content-end  mb-3">
    <a href="{{ route('category.create') }}" class="btn btn-primary text-end"> <i class="fas fa-plus"></i> Add Category</a>
</div>
  <div class="card">


    <div class="card-header">
      <a href="{{route('category.archived')}}">View archived categories</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Image</th>
          <th>Created On</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        </thead>
        <tbody>
@foreach ($categories as $category)

<tr class="text-center" data-id="{{ $category->id }}">
  <td>{{ $category->name }}</td>
  {{-- <td>{{ $category->wahbi }}</td> --}}
  <td><img src="{{ asset('storage/'.$category->image) }}" width="80px" alt="{{ $category->name }}"></td>
  <td>{{ $category->created_at }}</td>
  <td>
    {{-- <div class="text-center"> --}}


    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning "> <i class="fas fa-edit"></i> Edit</a>
{{-- </div> --}}
  </td>

  <td>
    {{-- <div > --}}
        {{-- <form method="POST" action="{{ route('category.destroy', $category->id) }}"> --}}
            {{-- <form method="POST">
            @method('DELETE')
            @csrf --}}
            {{-- <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</a> --}}
            <button type="submit"  class="btn btn-danger delete-category-btn" > <i class="fas fa-trash"></i> Delete</button>

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



