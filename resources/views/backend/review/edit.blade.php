@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{ url('/admin/update-review/' . $review->id) }}" method="POST" enctype="multipart/form-data"
            class="form-control">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Reviews</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Product</label>
                                <select name="product_id" class="form-control select2" style="width: 100%;">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" @if ($product->id == $review->product_id)
                                            selected
                                        @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Review Customer Name*</label>
                                <input type="text" name="name" value="{{ $review->name }}" class="form-control"
                                    required placeholder="Enter Your Name*">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2">
                                        <option value="" selected></option>
                                        <option value="verified" @if ($review->status == 'verified') selected @endif> Verified</option>
                                        <option value="unverified" @if ($review->status == 'unverified') selected @endif>Unverified</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                              <label>Review Rating*</label>
                              <input type="number" name="rating" value="{{ $review->rating }}" class="form-control"
                                  required placeholder="Edit Rating*" max="5" min="1">
                          </div>
                        </div>

                        <div class="col-12 col-sm-12">
                          <div class="form-group">
                              <label>Review Comments</label>
                              <textarea id="summernote" name="comments">{{ $review->comments }}</textarea>
                          </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Review Customer Image</label>
                                <input type="file" accept="image/*" name="image" value="" class="form-control">
                                <img src="{{ asset('backend/images/review/' . $review->image) }}" height="100"
                                    width="100">
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
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
@endpush
