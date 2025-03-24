@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
         <form action="{{url('/admin/update-vendor/'.$vendor->id)}}" method="POST" enctype="multipart/form-data" class="form-control">
          @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Vendor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Vendor Business Name*</label>
                          <input type="text" name="b_name" value="{{ $vendor->b_name }}" class="form-control"
                              required placeholder="Enter Company Name*">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Vendor Owner Name*</label>
                          <input type="text" name="o_name" value="{{ $vendor->o_name }}" class="form-control"
                              required placeholder="Enter Company Owner Name*">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Vendor Email*</label>
                          <input type="text" name="email" value="{{ $vendor->email }}" class="form-control"
                              required placeholder="Enter Email Address*">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Vendor Phone*</label>
                          <input type="text" name="phone" value="{{ $vendor->phone }}" class="form-control"
                              required placeholder="Enter Business Phone*">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Vendor Business Loacation*</label>
                          <input type="text" name="address" value="{{ $vendor->address }}" class="form-control"
                              required placeholder="Enter Business Location*">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Vendor Website Link*</label>
                          <input type="text" name="website" value="{{ $vendor->website }}" class="form-control"
                              required placeholder="Enter with https://*">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group" id="socialmedia_filds">
                          <label>Vendor Social Media Link*</label>
                            <input type="text" name="social_m[]" value="{{ $vendor->social_m }}" id="social" class="form-control"
                            required placeholder="Enter vendor Name*">
                      </div>
                      <button type="button" class="btn btn-primary" id="add_social_media">Add More</button>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Vendor Logo</label>
                            <input type="file" accept="image/*" name="logo" value="" class="form-control">
                            <img src="{{asset('backend/images/vendorlogo/'.$vendor->logo)}}" height="100">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Update" class="form-control btn btn-success">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
            $("#add_social_media").click(function() {
                $("#socialmedia_filds").append(
                    '<input type="text" name="social_m[]" id="social" value="" class="form-control"placeholder="Enter color (optional)">'
                )
            })
        })
  </script>
@endpush