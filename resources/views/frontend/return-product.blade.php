@extends('frontend.master')

@section('content')
<section class="return-process-section">
  <div class="container">
      <div class="row">
          <div class="col-md-10 m-auto">
              <form action="{{url('/return-product-request/store')}}" method="POST" class="return-process-form form-group" enctype="multipart/form-data">
                  @csrf
                <div class="text-center">
                      <h3 class="return-process-form-title">Product Return Process</h3>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="input-item-wrapper">
                              <label for="name">Name*</label>
                              <input type="text" name="c_name" value="" placeholder="Enater Your Name*" class="form-control" required />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="input-item-wrapper">
                              <label for="phone">Phone*</label>
                              <input type="text" name="c_phone" value="" placeholder="Enter Your Phone*" class="form-control" required />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="input-item-wrapper">
                              <label for="address">Address*</label>
                              <input type="text" name="address" value="" placeholder="Enter Your Address*" class="form-control" required />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="input-item-wrapper">
                              <label for="order_id">Order Id*</label>
                              <input type="text" name="order_id" value="" placeholder="Order Id*" class="form-control" required />
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-item-wrapper">
                              <label for="issue">Define issues*</label>
                              <textarea name="issue" cols="50" rows="5" class="form-control" required></textarea>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-item-wrapper">
                              <label for="images">Image</label>
                              <input type="file" id="images" name="image" accept="image/*" class="form-control" />
                          </div>
                      </div>
                  </div>
                  <div class="return-process-btn-outer">
                      <button type="submit" id="productReturnProcess" class="return-process-btn-inner">
                          Submit
                      </button>
                  </div>
              </form>                
          </div>
      </div>
  </div>
</section> 
@endsection