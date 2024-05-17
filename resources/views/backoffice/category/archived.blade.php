
@extends('layouts.backoffice.template')
@section('title','Archived Category')
@section('content')
{{-- <div class="card-header">
    <h3 class="card-title">DataTable with default features</h3>
    <a href="{{route('category.archived')}}">View archived categories</a>
  </div> --}}
  <div class="  d-flex justify-content-around  mb-3 w-25">
  <form method="POST" action={{ route('category.restoreAll') }}>
    @csrf
    <button type="submit"  class="btn btn-warning "> <i class="fas fa-undo" ></i>  {{__('message.restore_all')}}</button>
</form>
<form method="POST" action="{{route('category.deleteAllTrashed')}}">
    @csrf
    @method('DELETE')
    <button type="submit"  class="btn btn-danger delete-all-category-btn" > <i class="fas fa-trash"></i> {{__('message.delete_all')}}</button>
</form>
</div>

  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>{{__('message.name')}}</th>
        <th>{{__('message.image')}}</th>
        <th>{{__('message.created_on')}}</th>
        <th>{{__('message.deleted_on')}}</th>
        <th>{{__('message.restore')}}</th>
        <th>{{__('message.delete_forever')}}</th>
      </tr>
      </thead>
      <tbody>
@foreach ($archivedCategories as $category)

<tr class="text-center">
<td>{{ $category->name }}</td>
<td><img src="{{ file_exists(public_path('storage/'.$category->image)) ? asset('storage/'.$category->image):$category->image }}" width="80px" alt="{{ $category->name }}"></td>
<td>{{ $category->created_at }}</td>
<td>{{ $category->deleted_at }}</td>

<td>
  {{-- <div class="text-center"> --}}

<form method="POST" action={{ route('category.restore', $category->id) }}>
    @csrf
    <button type="submit"  class="btn btn-warning "> <i class="fas fa-undo" ></i>  {{__('message.restore')}}</button>
</form>
{{-- </div> --}}
</td>

<td>
  {{-- <div > --}}
      <form method="POST" action={{route('category.forceDelete', $category->id)}}>
          @method('DELETE')
          @csrf
          {{-- <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</a> --}}
          <button type="submit"  class="btn btn-danger"> <i class="fas fa-trash"></i> {{__('message.delete_forever')}} </button>

      </form>
  {{-- </div> --}}
</td>


</tr>
@endforeach
      </tbody>
    </table>
  </div>
@endsection
