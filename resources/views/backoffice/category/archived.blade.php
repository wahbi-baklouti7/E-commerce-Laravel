
@extends('layouts.backoffice.template')
@section('title','Archived Category')
@section('content')
{{-- <div class="card-header">
    <h3 class="card-title">DataTable with default features</h3>
    <a href="{{route('category.archived')}}">View archived categories</a>
  </div> --}}
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Created On</th>
        <th>Deleted On</th>
        <th>Resotre</th>
        <th>Delete Forever</th>
      </tr>
      </thead>
      <tbody>
@foreach ($archivedCategories as $category)

<tr class="text-center">
<td>{{ $category->name }}</td>
<td><img src="{{ asset('storage/'.$category->image) }}" width="80px" alt="{{ $category->name }}"></td>
<td>{{ $category->created_at }}</td>
<td>{{ $category->deleted_at }}</td>

<td>
  {{-- <div class="text-center"> --}}

<form method="POST" action={{ route('category.restore', $category->id) }}>
    @csrf
    <button type="submit"  class="btn btn-warning "> <i class="fas fa-undo" ></i>  Resotre</button>
</form>
{{-- </div> --}}
</td>

<td>
  {{-- <div > --}}
      <form method="POST" action={{route('category.forceDelete', $category->id)}}>
          @method('DELETE')
          @csrf
          {{-- <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</a> --}}
          <button type="submit"  class="btn btn-danger"> <i class="fas fa-trash"></i> Delete Forever</button>

      </form>
  {{-- </div> --}}
</td>


</tr>
@endforeach
      </tbody>
    </table>
  </div>
@endsection
