

@extends('landing-page.layouts.default')

@section('content')
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @php
                $serviceData = json_decode($service->content(), true);
                @endphp
                <!-- Tab panes -->
                <related-service-page :service="{{ json_encode($serviceData['related_service']) }}"></related-service-page>
            </div>
        </div>
    </div>
</div>

@endsection
