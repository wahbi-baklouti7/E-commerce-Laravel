
{{-- @extends('layouts.backoffice.template') --}}
{{-- @section('title','Login') --}}
{{-- @section('content') --}}


@include('layouts.backoffice.partials.head')

<div class="col-md-6 mx-auto my-5">
    <!-- jquery validation -->
    @include('layouts.backoffice.partials.alert')

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Login</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST" action="{{route('auth.login')}}" id="quickForm" novalidate="novalidate">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            @error('email')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    </div>
  {{-- @endsection --}}

  @include('layouts.backoffice.partials.footer')
