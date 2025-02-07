@extends('backend.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Order</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ url('/admin/order/update/' . $order->id) }}" method="POST" enctype="multipart/form-data"
                class="form-control">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Order Details Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="col-md-12">
                                    <div class="from-group">
                                        <label>Invoice Number</label>
                                        <input type="text" name="invoiceId" value="{{ $order->invoiceId }}"
                                            class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="from-group">
                                        <label>Customer Name</label>
                                        <input type="text" name="c_name" value="{{ $order->c_name }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="from-group">
                                        <label>Customer Phone</label>
                                        <input type="text" name="c_phone" value="{{ $order->c_phone }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="from-group">
                                        <label>Customer Address</label>
                                        <textarea name="address" class="form-control" required>{{ $order->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="from-group">
                                        <label>Delivary Charge</label>
                                        <input type="text" name="area" value="{{ $order->area }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="from-group">
                                        <label>Select Courier</label>
                                        <select name="courier_name" class="form-control">
                                            <option value="steadfast" @if ($order->courier_name == "steadfast")
                                                selected
                                            @endif >Steadfast</option>
                                            <option value="redx" @if ($order->courier_name == "redx")
                                              selected 
                                              @endif >REDX</option>
                                            <option value="others" @if ($order->courier_name == "others")
                                              selected
                                          @endif >Others</option>
                                        </select> <br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                @foreach ($order->orderDetails as $details)
                                    <img src="{{ asset('backend/images/product/' . $details->product->image) }}"
                                        height="100" width="100">
                                    {{ $details->qty }} X {{ $details->product->name }} <br> <br>
                                @endforeach
                                <div class="col-md-12">
                                  <div class="from-group">
                                      <label>Price</label>
                                      <input type="text" name="price" value="{{ $order->price }}"
                                          class="form-control" required>
                                  </div>
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
        <!-- /.card-body -->
    </div>
@endsection
