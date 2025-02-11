@extends('backend.master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">All Order List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Sl</th>
        <th>Date</th>
        <th>Invoice Number</th>
        <th>Product</th>
        <th>Customer Info</th>
        <th>Courier Name</th>
        <th>Current Status</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>

        @foreach ($orders as $order)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$order->created_at}}</td>
          <td>{{$order->invoiceId}}</td>
          <td>
            @foreach ($order->orderDetails as $details)
              <img src="{{asset('backend/images/product/'.$details->product->image)}}" height="100" width="100">
              {{$details->qty}} X {{$details->product->name}} <br> <br>
            @endforeach
          </td>
          <td>
            Name: {{$order->c_name}} <br>
            Phone: {{$order->c_phone}} <br>
            Address: {{$order->address}} <br>
            Price: {{$order->price}} <br>
          </td>
          <td>
            <span class="badge badge-danger">{{ucfirst($order->courier_name)}}</span>
          </td>
          <td>
            <span class="badge badge-primary">{{ucfirst($order->status)}}</span>
          </td>
          <td>
            <a href="{{url('/admin/order/status/'.$order->id.'/canceled')}}" class="btn btn-danger">Cancel</a>
            <a href="{{url('/admin/order/status/'.$order->id.'/confirmed')}}" class="btn btn-success">Confirm</a>
            <a href="{{url('/admin/order/status/'.$order->id.'/delivared')}}" class="btn btn-info">Delivared</a>
          </td>
          <td>
            <a href="{{url('/admin/order/edit/'.$order->id)}}" class="btn btn-primary">Edit</a>
            {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
@endsection

@push('js')
  <!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush