@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
         <form action="{{url('/admin/update-credentials')}}" method="POST" enctype="multipart/form-data" class="form-control">
          @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Credentials</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                          <label>Email*</label>
                          <input type="email" name="email" value="{{$authUser->email}}" class="form-control" required
                              placeholder="Enter Email Address*">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                          <label>New Password*</label>
                          <input type="password" name="password" value="" class="form-control" required
                              placeholder="Enter new password*">
                      </div>
                    </div>

                    <div class="col-md-12 mt-3">
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
