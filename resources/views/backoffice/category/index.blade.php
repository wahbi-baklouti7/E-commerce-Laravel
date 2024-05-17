@extends('layouts.backoffice.template')


@section('title','Categories')


@section('content')

<form method="POST" action="{{ route('category.deleteAll') }}">
    @method('DELETE')
    @csrf
    <button type="submit"  class="btn btn-danger delete-all-category-btn" > <i class="fas fa-trash"></i> {{__('message.delete_all')}}</button>
</form>

<div class=" d-flex justify-content-end  mb-3">
    <a href="{{ route('category.create') }}" class="btn btn-primary text-end"> <i class="fas fa-plus"></i> {{__('message.add_category')}}</a>
</div>
  <div class="card">


    <div class="card-header">
      <a href="{{route('category.archived')}}">{{__('message.view_archived_categories')}}</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>{{__('message.name')}}</th>
          <th>{{__('message.image')}}</th>
          <th>{{__('message.created_on')}}</th>
          <th>{{__('message.edit')}}</th>
          <th>{{__('message.delete')}}</th>
        </tr>
        </thead>
        <tbody>
@foreach ($categories as $category)

<tr class="text-center" data-id="{{ $category->id }}">
  <td>{{ $category->name }}</td>
  <td><img src="{{ file_exists(public_path('storage/'.$category->image)) ? asset('storage/'.$category->image):$category->image }}" width="80px" alt="{{ $category->name }}"></td>
  <td>{{ $category->created_at }}</td>
  <td>


    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning "> <i class="fas fa-edit"></i> {{__('message.edit')}}</a>
  </td>

  <td>
    {{-- <div > --}}
        {{-- <form method="POST" action="{{ route('category.destroy', $category->id) }}"> --}}
            {{-- <form method="POST">
            @method('DELETE')
            @csrf --}}
            {{-- <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</a> --}}
            <button type="submit"  class="btn btn-danger delete-category-btn" > <i class="fas fa-trash"></i> {{__('message.delete')}}</button>

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



