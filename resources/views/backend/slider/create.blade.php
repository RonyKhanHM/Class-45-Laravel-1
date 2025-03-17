@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ url('/admin/store-sliders') }}" method="POST" enctype="multipart/form-data" class="form-control">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add New Sliders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Slider Title*</label>
                                <input type="text" name="title" value="" class="form-control" required
                                    placeholder="Enter slider title*">
                            </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                              <label>Slider Description*</label>
                              <input type="text" name="description" value="" class="form-control" required
                                  placeholder="Enter slider description*">
                          </div>
                      </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Slider Image</label>
                                <input type="file" accept="image/*" name="image" value="" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="submit" class="form-control btn btn-success">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
