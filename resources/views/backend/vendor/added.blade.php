@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ url('/admin/store-vendor') }}" method="POST" enctype="multipart/form-data" class="form-control">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Add New Vendor</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vendor Business Name*</label>
                                <input type="text" name="b_name" value="" class="form-control" required
                                    placeholder="Enter Business Name*">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vendor Owner Name*</label>
                                <input type="text" name="o_name" value="" class="form-control" required
                                    placeholder="Enter Owner Name*">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vendor E-Mail*</label>
                                <input type="text" name="email" value="" class="form-control" required
                                    placeholder="Enter vendor E-Mail*">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vendor Phone*</label>
                                <input type="text" name="phone" value="" class="form-control" required
                                    placeholder="Enter vendor Phone Number*">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vendor Location*</label>
                                <input type="text" name="address" value="" class="form-control" required
                                    placeholder="Enter Vendor Location*">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Vendor Website link*</label>
                                <input type="text" name="website" value="" class="form-control" required
                                    placeholder="Enter with https://*">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group" id="socialmedia_filed">
                                <label>Vendor Social Media*</label>
                                <input type="text" name="social_m[]" id="social" value="" class="form-control"
                                    required placeholder="Enter Social Media Link*">
                            </div>
                            <button type="button" class="btn btn-primary" id="add_social_media">Add More</button>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Vendor Logo</label>
                                <input type="file" accept="image/*" name="logo" class="form-control" required>
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

@push('js')
    <script>
        $(document).ready(function() {
            $("#add_social_media").click(function() {
                $("#socialmedia_filed").append(
                    '<input type="text" name="social_m" id="social" value="" class="form-control" placeholder="Enter Social Media Link">'
                )
            })
        })
    </script>
@endpush
