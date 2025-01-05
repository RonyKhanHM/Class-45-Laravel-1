@extends('backend.master')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Product List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Sl</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Category Name</th>
        <th>SubCategory Name</th>
        <th>Buying Price</th>
        <th>Regular Price</th>
        <th>Discount Price</th>
        <th>qty</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
          <td>{{$loop->index+1}}</td>
          <td><img src="{{asset('backend/images/product/'.$product->image)}}" height="100" width="100"></td>
          <td>{{$product->name}}</td>
          <td>{{$product->category->name}}</td>
          <td>{{$product->subCategory->name}}</td>
          <td>{{$product->buying_price}}</td>
          <td>{{$product->regular_price}}</td>
          <td>{{$product->discount_price}}</td>
          <td>{{$product->qty}}</td>
          <td>
            <a href="{{url('/admin/edit-product/'.$product->id)}}" class="btn btn-primary">Edit</a>
            <a href="{{url('/admin/delete-product/'.$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
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