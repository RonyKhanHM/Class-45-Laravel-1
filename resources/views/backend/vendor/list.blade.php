@extends('backend.master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Vendor List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Sl</th>
        <th>Vendor Logo</th>
        <th>Vendor Business Name</th>
        {{-- <th>Vendor Owner Name</th> --}}
        <th>Vendor Contact</th>
        {{-- <th>Vendor Phone Number</th>
        <th>Vendor Location</th> --}}
        <th>Vendor Website</th>
        <th>Vendor Social Media</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($vendors as $vendor)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td><img src="{{asset('backend/images/vendorlogo/'.$vendor->logo)}}" height="100"></td>
          <td>{{$vendor->b_name}}</td>
          <td>
            Owner Name: {{$vendor->o_name}} <br>
            Email: {{$vendor->email}} <br>
            Phone: {{$vendor->phone}} <br>
            Location: {{$vendor->address}} <br>
          </td>
          <td><a href="{{$vendor->website}}">{{$vendor->website}}</a></td>
          <td>{{$vendor->social_m}}</td>
          <td>
            <a href="{{url('/admin/edit-vendor/'.$vendor->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{url('/admin/delete-vendor/'.$vendor->id)}}" class="btn btn-danger">Delete</a>
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