

@if (count($errors)>0)
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
@endif


@if (session('success'))

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i>  {{ session('success') }}</h5>

</div>



@endif


@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>

@endif

@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
