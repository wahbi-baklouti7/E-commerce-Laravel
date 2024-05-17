
@extends('layouts.backoffice.template')


@section('title','Dashboard')

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6 ">
          <!-- small box -->
          <div class="small-box bg-gradient-danger ps-4  pt-3">
            <div class="inner row">
                <div class="col-8">
              <h3> {{$totalOfEarnings}} <span class="fs-2" >DT</span> </h3>

              <p class="fs-4">Total Earnings</p>
            </div>
              <div class=" col-4">  <i class="fas fa-money-bill fa-3x" ></i> </div>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box text-white bg-gradient-warning  ps-4 pt-3">
              <div class="inner row">
                  <div class="col-8">
                <h3>{{$numOfCustomers}}</h3>

                <p class="fs-4">Users</p>
              </div>
                <div class=" col-4"> <i class="fa-solid fa-user-group fa-3x"></i> </div>
              </div>
              
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-success ps-4 pt-3">
              <div class="inner row">
                  <div class=" col-8">
                <h3>{{$numOfOrders}}</h3>

                <p class="fs-4">Orders</p>
              </div>
                <div class=" col-4">  <i class="fas fa-shopping-bag fa-3x" ></i> </div>
              </div>

            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-info ps-4 pt-3">
              <div class="inner row">
                  <div class="bg-warnign col-8">
                <h3> {{$numOfProducts}} </h3>

                <p class="fs-4">Products</p>
              </div>
                <div class=" col-4"><i class="fa-solid fa-box fa-3x"></i> </div>
              </div>

            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-primary ps-4 pt-3">
              <div class="inner row">
                  <div class="bg-warnign col-8">
                <h3> {{$numOfCategories}} </h3>

                <p class="fs-4">Categoreis</p>
              </div>
                <div class=" col-4">  <i class="fa-solid fa-list fa-3x"></i></div>
              </div>

            </div>
          </div>



        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      {{-- <div class="row"> --}}
        <!-- Left col -->

        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

        <!-- right col -->
      {{-- </div> --}}
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
