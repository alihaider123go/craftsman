@extends('landing-page.layouts.default')

@section('before_head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

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

<!-- category with status -->

<div class="container status-category-section custom-width-container">
    <div class="row">
        <div class="col-12">
            <p class="mb-0">
                <span class="category-heading-title-small"> Catégorie </span>
                <br />
                <span class="category-heading-title"> En fonction du statut </span>
            </p>
        </div>
        <div class="col-12">
            <category-slider-section />
        </div>
    </div>
</div>

<div class="container status-category-section custom-width-container">
<div class="row">
        <div class="col-12">
            <p class="mb-0">
                <span class="category-heading-title-small"> Catégorie </span>
                <br />
                <span class="category-heading-title"> En fonction des spécialités </span>
            </p>
        </div>
        <div class="col-12">
        <category-page link="{{ route('category.data') }}"></category-page>
        </div>
    </div>
</div>
@endsection
