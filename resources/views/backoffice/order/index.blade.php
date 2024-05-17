@extends('layouts.backoffice.template')


@section('title','Orders')

@section('content')

{{-- <form method="POST" action="{{ route('order.deleteAll') }}">
    @method('DELETE')
    @csrf
    <button type="submit"  class="btn btn-danger delete-all-order-btn" > <i class="fas fa-trash"></i> {{__('message.delete_all')}}</button>
</form> --}}

{{-- <div class=" d-flex justify-content-end  mb-3">
    <a href="{{ route('order.create') }}" class="btn btn-primary text-end"> <i class="fas fa-plus"></i> {{__('message.add_order')}}</a>
</div> --}}
  <div class="card">


    {{-- <div class="card-header">
      <a href="{{route('order.archived')}}">{{__('message.view_archived_orders')}}</a>
    </div> --}}
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="text-center">
          <th>{{__('message.orderId')}}</th>
          <th>{{__('message.ordered_on')}}</th>
          <th>{{__('message.customer')}}</th>
          <th>{{__('message.phone')}}</th>
          <th>{{__('message.items')}}</th>
          <th>{{__('message.amount')}}</th>
          <th>{{__('message.city')}}</th>
          <th>{{__('message.address')}}</th>
          <th>{{__('message.status')}}</th>
        </tr>
        </thead>
        <tbody>
@foreach ($orders as $order)

<tr class="text-center" data-id="{{ $order->id }}">
  <td>{{ $order->id }}</td>
  <td>{{ $order->created_at }}</td>
  <td> {{ $order->full_name }}</td>
  <td> {{ $order->phone }}</td>
  <td> {{ $order->quantity }}</td>
  <td>{{ $order->total_price }} TND</td>
  <td>{{ $order->city }} </td>
  <td>{{ $order->address }} </td>
  <td class="badge bg-{{ $order->status == 'pending' ? 'warning' : 'success' }} p-2 mt-1" >{{ $order->status }} </td>




    {{-- <a href="{{ route('', $order->id) }}" class="btn btn-warning "> <i class="fas fa-edit"></i> {{__('message.edit')}}</a> --}}


  {{-- <td> --}}
    {{-- <div > --}}
        {{-- <form method="POST" action="{{ route('order.destroy', $order->id) }}"> --}}
            {{-- <form method="POST">
            @method('DELETE')
            @csrf --}}
            {{-- <a href="{{ route('order.destroy', $order->id) }}" class="btn btn-danger"> <i class="fas fa-trash"></i> Delete</a> --}}
            {{-- <button type="submit"  class="btn btn-danger delete-order-btn" > <i class="fas fa-trash"></i> {{__('message.delete')}}</button> --}}

        {{-- </form> --}}
    {{-- </div> --}}
  {{-- </td> --}}


</tr>
@endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
