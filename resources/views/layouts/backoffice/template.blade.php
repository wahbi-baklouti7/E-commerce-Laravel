
@include('layouts.backoffice.partials.head')
<body class="hold-transition sidebar-mini">
    @php
    // $isLogin = Request::path() == 'login';
@endphp
<div class="wrapper">
  <!-- Navbar -->
  {{-- @includeUnless($isLogin, 'layouts.backoffice.partials.nav', ['some' => 'data']) --}}
  @include('layouts.backoffice.partials.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

   {{-- @includeUnless($isLogin, 'layouts.backoffice.partials.sidebar') --}}
  @include('layouts.backoffice.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        {{-- Header Content --}}
        @include('layouts.backoffice.partials.header')
      </div><!-- /.container-fluid -->
    </section>

    {{-- {{dd(Request::path())}}
   {{dd(Request::url())}} --}}

    @include('layouts.backoffice.partials.alert')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @yield('content')
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- @includeUnless($isLogin, 'layouts.backoffice.partials.footer') --}}
  @include('layouts.backoffice.partials.footer')


