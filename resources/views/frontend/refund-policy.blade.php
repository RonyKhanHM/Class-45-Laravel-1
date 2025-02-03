@extends('frontend.master')

@section('content')
<section class="privacy-policy-section">
  <div class="privacy-policy-heading-wrapper">
      <div class="section-heading-outer">
          <h4 class="section-heading-inner">
              Refund Policy
          </h4>
      </div>
  </div>
  <div class="container">
      <div class="privacy-policy-content">
          <div class="contant-des">
            {!!$policy->refund_policy!!}
          </div>
      </div>
  </div>
</section>
@endsection