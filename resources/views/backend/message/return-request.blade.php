@extends('backend.master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Return Request List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Sl</th>
        <th>Date</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Order ID</th>
        <th>Issue</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($returnReq as $return)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$return->created_at}}</td>
          <td>{{$return->c_name}}</td>
          <td>{{$return->c_phone}}</td>
          <td>{{$return->address}}</td>
          <td>{{$return->order_id}}</td>
          <td>{{$return->issue}}</td>
          <td>
            <img src="{{asset('backend/images/return/'.$return->image)}}" height="100" width="100">
          </td>
          <td>
            <a href="{{url('/admin/delete-return-req-message/'.$return->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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