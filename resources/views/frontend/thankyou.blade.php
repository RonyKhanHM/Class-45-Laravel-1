@extends('frontend.master')

@section('content')
<div class="thank-you-wrapper" style="position: relative;">
  <div class="js-container" style="height: 100vh;"></div>
  <div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);text-align: center;max-width: 750px;">
      <div class="checkmark-circle">
          <div class="background"></div>
          <div class="checkmark draw"></div>
      </div>
      <h3 class="py-3">Order Number : {{$invoiceId}}</h3>
      <p class="thank-you-message">
        Your order has been successfully processed. Our customer support team will shortly reach out via phone to confirm and verify your order details.
      </p>
      <a href="{{url('/')}}" class="thank-you-btn-inner">Go To Home</a>
  </div>
</div>
@endsection