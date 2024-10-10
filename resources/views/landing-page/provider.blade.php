@extends('landing-page.layouts.default')

@section('before_head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

<link href="{{ asset('vendor/star-rating/rateit.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- banner -->
<div class="container-fluid banner-container category-page-banner-container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 w-100">
            <div class="w-100 d-flex justify-content-center align-items-center">
                <p class="category-page-banner-paragraph pb-0">
                    {{__('landingpage.find_ideal_solution_for_you_among_many_services_available')}}                        
                </p>
            </div>
        </div>
    </div>
</div>

<!-- <div class="blog-list"> -->
    <div class="container custom-width-container">
        <provider-page link="{{ route('provider.data') }}"></provider-page>
    </div>
<!-- </div> -->
@endsection
