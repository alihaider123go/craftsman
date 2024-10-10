

@extends('landing-page.layouts.default')
@section('before_head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<link href="{{ asset('vendor/star-rating/rateit.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="p-0">
    <div class="container-fluid services-custom-container banner-container services-page-banner-container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 w-100">
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <p class="banner-paragraph pb-0">
                        {{__('landingpage.find_ideal_solution_for_you_among_many_services_available')}}                        
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <service-page link="{{ route('service.data', ['id' => $id, 'type' => $type, 'latitude' => $latitude, 'longitude' => $longitude]) }}"></service-page>
            </div>
        </div>
    </div>
</div>

@endsection
