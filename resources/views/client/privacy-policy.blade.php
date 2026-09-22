@extends('layouts.client.site', ['page_title' => 'Privacy Policy'])
@section('content')
    <!--wrapper start here-->
    <div class="wrapper">
        <div class="section-title">
            <h2><b>Policy</b> Privacy</h2>
        </div>
        @if ($privacy_policy_header)
        <section class="common-banner-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12"> 
                        <div class="common-banner-content">
                            <p>{{ $privacy_policy_header }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        @endif
        @if ($privacy_policy_body)
        <section class="policy-page cms-page  padding-bottom  padding-top">
            <div class="container">
                <p>{{ $privacy_policy_body }}</p>
            </div>
        </section>
        @endif
    </div>
    <!---wrapper end here-->
@endsection