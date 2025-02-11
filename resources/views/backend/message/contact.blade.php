@extends('backend.master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Contact Message List</h3>
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
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($messages as $message)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$message->created_at}}</td>
          <td>{{$message->name}}</td>
          <td>{{$message->phone}}</td>
          <td>{{$message->email}}</td>
          <td>{{$message->subject}}</td>
          <td>{{$message->message}}</td>
          <td>
            <a href="{{url('/admin/delete-contact-message/'.$message->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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