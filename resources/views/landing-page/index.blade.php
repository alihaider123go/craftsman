@extends('landing-page.layouts.default')


@section('content')

    @php
        if(!empty(auth()->user()) && auth()->user()->hasRole('user')){
           $auth_user_id=auth()->user()->id;
           $favourite = App\Models\UserFavouriteService::where('user_id',$auth_user_id)->get();
        }
        else{
           $auth_user_id=null;
           $favourite=null;
        }
    @endphp

@section('before_head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

@endsection

        <!-- Banner -->
    <div class="pb-0 mx-auto bg-light banner-main-wrapper">
        <div class="container banner-container">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                    @php
                        $section1 = App\Models\ForntendSetting::where('key', 'section_1')->first();
                        $sectionData = $section1 ? json_decode($section1->value, true) : null;
                        $settings = App\Models\Setting::where('type', 'service-configurations')->where('key','service-configurations')->first();
                        $serviceconfig = $settings ? json_decode($settings->value) : null;
                        $postjobservice = $serviceconfig->post_services;
                    @endphp
                    @if ($sectionData && isset($sectionData['section_1']) && $sectionData['section_1'] == 1)
                     <div>
                        <h2 class="mx-auto banner-heading">
                            {{__('landingpage.a_professional_at_your_request')}}
                        </h2>
                        <p class="iq-title-desc line-count-3 text-body mt-3 mb-0 banner-paragraph">
                            {{__('landingpage.are_you_looking_for_a_professional_who_really_understands_you')}}
                            <br/>
                            {{__('landingpage.you_are_in_the_right_place')}}
                        </p>
                        <div class="banner-buttons">
                            <a
                                href="/service-list"
                                class="banner-pink-button"
                            >
                                {{__('landingpage.search_for_a_service')}}
                            </a>
                            <a
                                href="/provider-list"
                                class="banner-transparent-button"
                            >
                                {{__('landingpage.find_a_provider')}}
                            </a>

                        </div> 
                    </div>
                    <img src="{{asset('images/frontend/banner-image-new.webp')}}" class="banner-image img-fluid" style="margin-top:119px" >    
                    @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    

    <div class="contianer-fluid bg-white stats">
        <div class="container custom-width-container">
            <div class="stats-section-container">
                <div class="stats-section-one d-flex stats-single-section">
                    <h2 class="count">+140</h2>
                    <div class="ms-2 w-100">
                        <p class="stats-heading">{{__('landingpage.services')}}</p>
                        <p class="stats-sub-heading">{{__('landingpage.present')}}</p>
                    </div>
                </div>
                <div class="stats-section-two d-flex stats-single-section">
                    <h2 class="count">+120</h2>
                    <div class="ms-2 w-100">
                        <p class="stats-heading">{{__('landingpage.providers')}}</p>
                        <p class="stats-sub-heading">{{__('landingpage.present_on_the_platform')}}</p>
                    </div>
                </div>
                <div class="stats-section-three d-flex stats-single-section">
                    <h2 class="count">+120</h2>
                    <div class="ms-2 w-100">
                        <p class="stats-heading">{{__('landingpage.municipalities')}}</p>
                        <p class="stats-sub-heading">{{__('landingpage.supported')}}</p>
                    </div>
                </div>
                <div class="stats-section-four d-flex stats-single-section">
                    <h2 class="count">+95%</h2>
                    <div class="ms-2 w-100">
                        <p class="stats-heading">{{__('landingpage.satisfaction')}}</p>
                        <p class="stats-sub-heading">{{__('landingpage.client')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- professionals near me -->
    <div class="container professional-near-me-container custom-width-container">
        <professionals-near-me-slider :user_id="{{json_encode($auth_user_id)}}" :featured="true"/>
            <!-- <service-slider-section :user_id="{{json_encode($auth_user_id)}}" count-ref="professionnels-near-me-count" :favourite="{{json_encode($favourite)}}" :type="'cleaning'"/> -->
    </div>

    <!-- Categories -->
    @php
        $section2 = App\Models\ForntendSetting::where('key', 'section_2')->first();
        $sectionData = $section2 ? json_decode($section2->value, true) : null;
    @endphp
    @if ($sectionData && isset($sectionData['section_2']) && $sectionData['section_2'] == 1)
        <div class="container custom-width-container categories-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="iq-title-box text-center">
                        <h3 class="font-weight-bolder">
                        {{__('landingpage.find_the_specialists_suited_to_your_situation')}}
                        </h3>
                        <p class="iq-title-desc line-count-3 text-body mt-1 mb-0">
                            {{__('landingpage.make_a_selection_according_to_your_criteria_and_find_the_specialist_who_best_meets_your_needs')}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="tabs-section">
                <ul class="nav nav-tabs ms-auto me-auto " id="myTab" role="tablist" style="background: #e3e2e2; padding:5px;border-radius:50px;width:297px; ">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#par-group-tab-pane" type="button" role="tab" aria-controls="par-group-tab-pane" aria-selected="true">{{__('landingpage.by_group')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="parspécialité-tab" data-bs-toggle="tab" data-bs-target="#parspécialité-tab-pane" type="button" role="tab" aria-controls="parspécialité-tab-pane" aria-selected="false">{{__('landingpage.by_specialty')}}</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="par-group-tab-pane" role="tabpanel" aria-labelledby="par-group-tab" tabindex="0">
                        <category-slider-section />
                    </div>
                    <div class="tab-pane fade" id="parspécialité-tab-pane" role="tabpanel" aria-labelledby="parspécialité-tab" tabindex="0">
                        <category-list></category-list>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- /Categories -->

    @if($auth_user_id)
        <!-- Recently Viewed Service -->
        @php
            $section8 = App\Models\ForntendSetting::where('key', 'section_8')->first();
            $sectionData = $section8 ? json_decode($section8->value, true) : null;
        @endphp
        @if ($sectionData && isset($sectionData['section_8']) && $sectionData['section_8'] == 1)
            @php
                $recentlyViewed = session()->get('recently_viewed:' . $auth_user_id, []);
                session(['recently_viewed:' . $auth_user_id => $recentlyViewed]);
            @endphp
            @if (!empty($recentlyViewed))
                <div class="section-padding sections-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-none"></div>
                            <div class="col-lg-8 col-md-12">
                                <div class="iq-title-box text-center center">
                                    <h3 class="text-capitalize line-count-1">{{ $sectionData['title'] }}
                                        <span class="highlighted-text">
                      <span class="highlighted-text-swipe"></span>
                      <span class="highlighted-image">
                         <svg xmlns="http://www.w3.org/2000/svg" width="130" height="11" viewBox="0 0 130 11"
                              fill="none">
                            <path d="M2 9C2.5625 8.76081 66.125 -2.95948 128 4.4554" stroke="currentColor"
                                  stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                         </svg>
                      </span>
                   </span>
                                    </h3>
                                    <p class="iq-title-desc line-count-3 text-body mt-3 mb-0">{{ $sectionData['description'] }}</p>

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-none"></div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <service-slider-section :user_id="{{json_encode($auth_user_id)}}"
                                                        :favourite="{{json_encode($favourite)}}"
                                                        :type="'recently_view'"/>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @endif
    <!-- Provider -->

    {{--Section 7--}}
    <div class="container custom-width-container">
        <div class="section-padding ps-0 pe-0">
            <div class="row align-items-center homepage-provider-section">
                <div class="col-lg-6 order-1 mt-lg-0 mt-5 ps-xl-5 px-5">
                    <div class="heading">
                        <div class="h4 font-weight-bolder section-7-heading">
                            {{__('landingpage.Whatever_your_need_an_expert_is_available_here_to_help_you')}}
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="text-dark font-weight-bold font-size-16 line-height-100 section-7-sub-heading d-flex align-items-center">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4735 7.07544L12.3094 9.80568L13.2734 13.8887C13.3266 14.1104 13.3129 14.3428 13.234 14.5567C13.1552 14.7706 13.0147 14.9563 12.8304 15.0903C12.646 15.2244 12.4261 15.3008 12.1983 15.31C11.9706 15.3191 11.7452 15.2606 11.5507 15.1417L7.99996 12.9564L4.44707 15.1417C4.2526 15.2599 4.02751 15.3179 3.80015 15.3084C3.57278 15.2989 3.3533 15.2224 3.16935 15.0884C2.98539 14.9545 2.84519 14.7691 2.76639 14.5556C2.68759 14.3421 2.67372 14.1101 2.72652 13.8887L3.69402 9.80568L0.529956 7.07544C0.3579 6.92674 0.233466 6.73064 0.172194 6.51164C0.110922 6.29264 0.115527 6.06044 0.185436 5.84404C0.255344 5.62764 0.387456 5.43663 0.565273 5.29487C0.743091 5.1531 0.958733 5.06687 1.18527 5.04693L5.33371 4.71224L6.93402 0.839429C7.02064 0.628363 7.16807 0.447822 7.35756 0.32076C7.54705 0.193698 7.77005 0.125854 7.9982 0.125854C8.22635 0.125854 8.44934 0.193698 8.63884 0.32076C8.82833 0.447822 8.97576 0.628363 9.06238 0.839429L10.662 4.71224L14.8104 5.04693C15.0374 5.06613 15.2537 5.15188 15.4321 5.29345C15.6106 5.43502 15.7433 5.6261 15.8137 5.84276C15.884 6.05943 15.8889 6.29203 15.8276 6.51143C15.7663 6.73083 15.6417 6.92728 15.4693 7.07615L15.4735 7.07544Z" fill="black"/>
                            </svg>
                            <p class="mb-0 ms-2">{{__('landingpage.quality_assistance')}}</p>
                        </div>
                        <div class="text-dark font-weight-lighter font-size-16 line-height-150 section-7-description">
                            {{__('landingpage.bienetre_noir_offers_you_a_list_of_the_best_specialists_in_their_respective_expertise')}}
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="text-dark font-weight-bold font-size-16 line-height-100 section-7-sub-heading d-flex align-items-center">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4735 7.07544L12.3094 9.80568L13.2734 13.8887C13.3266 14.1104 13.3129 14.3428 13.234 14.5567C13.1552 14.7706 13.0147 14.9563 12.8304 15.0903C12.646 15.2244 12.4261 15.3008 12.1983 15.31C11.9706 15.3191 11.7452 15.2606 11.5507 15.1417L7.99996 12.9564L4.44707 15.1417C4.2526 15.2599 4.02751 15.3179 3.80015 15.3084C3.57278 15.2989 3.3533 15.2224 3.16935 15.0884C2.98539 14.9545 2.84519 14.7691 2.76639 14.5556C2.68759 14.3421 2.67372 14.1101 2.72652 13.8887L3.69402 9.80568L0.529956 7.07544C0.3579 6.92674 0.233466 6.73064 0.172194 6.51164C0.110922 6.29264 0.115527 6.06044 0.185436 5.84404C0.255344 5.62764 0.387456 5.43663 0.565273 5.29487C0.743091 5.1531 0.958733 5.06687 1.18527 5.04693L5.33371 4.71224L6.93402 0.839429C7.02064 0.628363 7.16807 0.447822 7.35756 0.32076C7.54705 0.193698 7.77005 0.125854 7.9982 0.125854C8.22635 0.125854 8.44934 0.193698 8.63884 0.32076C8.82833 0.447822 8.97576 0.628363 9.06238 0.839429L10.662 4.71224L14.8104 5.04693C15.0374 5.06613 15.2537 5.15188 15.4321 5.29345C15.6106 5.43502 15.7433 5.6261 15.8137 5.84276C15.884 6.05943 15.8889 6.29203 15.8276 6.51143C15.7663 6.73083 15.6417 6.92728 15.4693 7.07615L15.4735 7.07544Z" fill="black"/>
                            </svg>
                            <p class="mb-0 ms-2">
                                {{__('landingpage.a_local_service')}}
                            </p>
                        </div>
                        <div class="text-dark font-weight-lighter font-size-16 line-height-150 section-7-description">
                            {{__('landingpage.by_telephone_video_or_in_person_bienetre_noir_offers_you_the_specialists_closest_to_you')}}
                        </div>
                    </div>
                    <div>
                        <div class="text-dark font-weight-bold font-size-16 line-height-100 section-7-sub-heading d-flex align-items-center">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4735 7.07544L12.3094 9.80568L13.2734 13.8887C13.3266 14.1104 13.3129 14.3428 13.234 14.5567C13.1552 14.7706 13.0147 14.9563 12.8304 15.0903C12.646 15.2244 12.4261 15.3008 12.1983 15.31C11.9706 15.3191 11.7452 15.2606 11.5507 15.1417L7.99996 12.9564L4.44707 15.1417C4.2526 15.2599 4.02751 15.3179 3.80015 15.3084C3.57278 15.2989 3.3533 15.2224 3.16935 15.0884C2.98539 14.9545 2.84519 14.7691 2.76639 14.5556C2.68759 14.3421 2.67372 14.1101 2.72652 13.8887L3.69402 9.80568L0.529956 7.07544C0.3579 6.92674 0.233466 6.73064 0.172194 6.51164C0.110922 6.29264 0.115527 6.06044 0.185436 5.84404C0.255344 5.62764 0.387456 5.43663 0.565273 5.29487C0.743091 5.1531 0.958733 5.06687 1.18527 5.04693L5.33371 4.71224L6.93402 0.839429C7.02064 0.628363 7.16807 0.447822 7.35756 0.32076C7.54705 0.193698 7.77005 0.125854 7.9982 0.125854C8.22635 0.125854 8.44934 0.193698 8.63884 0.32076C8.82833 0.447822 8.97576 0.628363 9.06238 0.839429L10.662 4.71224L14.8104 5.04693C15.0374 5.06613 15.2537 5.15188 15.4321 5.29345C15.6106 5.43502 15.7433 5.6261 15.8137 5.84276C15.884 6.05943 15.8889 6.29203 15.8276 6.51143C15.7663 6.73083 15.6417 6.92728 15.4693 7.07615L15.4735 7.07544Z" fill="black"/>
                            </svg>
                            <p class="mb-0 ms-2">
                                {{__('landingpage.multidisciplinarity')}}
                            </p>
                        </div>
                        <div class="text-dark font-weight-lighter font-size-16 line-height-150 section-7-description">
                            {{__('landingpage.no_more_shopping_in_multiple_places_to_find_the_resources_you_need_Just_one_click_is_enough')}}
                        </div>
                    </div>
                    <button class="section-7-button  mt-5">
                        <a href="/service-list" class="text-white">
                            {{__('landingpage.find_a_service')}}
                        </a>
                    </button>
                </div>
                <div class="col-lg-6 order-0  order-lg-2 pe-xl-5 position-relative px-5">
                    <img src="{{url('images/frontend/section-7-image-new.webp')}}" class="img-fluid w-100 rounded">
                </div>
            </div>
        </div>
    </div>

    {{--Section 5--}}
    <div class="section-5-bg-color">
        <div class="container custom-width-container">
            <div class="row ">
                <div class="col-lg-6 pe-xl-5">
                    <img src="{{ url('images/frontend/section-5-image.webp') }}" class="img-fluid w-100 h-100 rounded">
                </div>
                <div class="col-lg-6 mt-lg-0 ps-xl-5 px-5 pe-5">
                    <div class="bg-white section-5-right-top-box">
                        <div class="heading">
                            <div class="h4 font-weight-bolder mb-2 section-5-heading">
                                {{__('landingpage.promote_your_services_and_reach_more_people')}}
                            </div>
                            <p class="line-height-150 section-5-description">
                               {{__('landingpage.amplify_your_impact_and_enable_more_people_to_live_better_lives_by_doing_what_you_love_to_do_giving_happiness')}}
                            </p>
                            <p class="line-height-150 section-5-description mb-0">
                               {{__('landingpage.join_us_create_an_account_and_offer_your_services_to_people_who_need_them')}}
                            </p>
                            <!-- <a
                                href="{{ route('user.register') }}"
                                class="btn btn-dark btn-registering px-5 mt-4 section-5-btn"
                            >
                                Je m'inscris
                            </a> -->
                        </div>
                    </div>


                    <div class="bg-white section-5-right-bottom-box">
                        <div class="heading">
                        <img src="{{url('images/frontend/images-group.webp')}}" style="width:114px;height:34px;margin-bottom: 24px;">
                            <div class=" font-weight-bolder">
                                <h6 class="section-5-right-bottom-box-heading">{{__('landingpage.join_a_great_community')}}</h6>
                            </div>
                            <p class="section-5-right-bottom-box-sub-heading mb-0">
                                {{__('landingpage.by_joining_together_we_unlock_the_potential_of_the_Black_community_by_providing_solutions_that_address_our_unique_challenges')}}
                            </p>
                            <a
                                href="{{ route('user.register') }}"
                                class="btn btn-dark section-5-button"
                            >
                            {{__('landingpage.i_create_an_account')}}
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- faq -->
    <div class="container faq-container bg-white custom-width-container">
        <div class="row">
            <div class="col-12 col-md-4">
                <p class="faq-heading">
                    FAQ
                </p>
                <p class="faq-description">
                    {{__('landingpage.we_have_answers_to_your_questions')}}
                    <br />
                    {{__('landingpage.if_you_have_any_further_questions_please_do_not_hesitate_to_contact_us')}}
                </p>
                 <a
                    href="#"
                    class="btn btn-dark section-5-button"
                >
                {{__('landingpage.contact_us')}}
                </a>
            </div>
            <div class="col-12 col-md-2"></div>
            <div class="col-12 col-md-6">
                <faq-section></faq-section>
            </div>
        </div>
    </div>





@endsection

@section('bottom_script')

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            var $sliders = jQuery(document).find('.iq-team-slider');
            if ($sliders.length > 0) {
                $sliders.each(function () {
                    let slider = jQuery(this);
                    var navNext = (slider.data('navnext')) ? "#" + slider.data('navnext') : "";
                    var navPrev = (slider.data('navprev')) ? "#" + slider.data('navprev') : "";
                    var pagination = (slider.data('pagination')) ? "#" + slider.data('pagination') : "";
                    var sliderAutoplay = slider.data('autoplay');
                    if (sliderAutoplay) {
                        sliderAutoplay = {
                            delay: slider.data('autoplay')
                        };
                    } else {
                        sliderAutoplay = false;
                    }
                    var iqonicPagination = {
                        el: pagination,
                        clickable: true,
                        dynamicBullets: true,
                    };
                    var swSpace = {
                        1200: 30,
                        1500: 30
                    };
                    var breakpoint = {
                        0: {
                            slidesPerView: 1,
                            centeredSlides: false,
                            virtualTranslate: false
                        },
                        576: {
                            slidesPerView: 1,
                            centeredSlides: false,
                            virtualTranslate: false
                        },
                        768: {
                            slidesPerView: 2,
                            centeredSlides: false,
                            virtualTranslate: false
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: swSpace["1200"],
                        },
                        1500: {
                            slidesPerView: 3,
                            spaceBetween: swSpace["1500"],
                        },
                    };
                    var sw_config = {
                        loop: true,
                        speed: 1000,
                        loopedSlides: 3,
                        spaceBetween: 30,
                        slidesPerView: 3,
                        centeredSlides: false,
                        autoplay: true,
                        virtualTranslate: false,
                        navigation: {
                            nextEl: navNext,
                            prevEl: navPrev
                        },
                        on: {
                            slideChangeTransitionStart: function () {
                                var currentElement = jQuery(this.el);
                                var lastBullet = currentElement.find(".swiper-pagination-bullet:last");
                                if (this.slides.length - (this.loopedSlides + 1) === this.activeIndex) {
                                    lastBullet.addClass("js_prefix-disable-bullate");
                                } else {
                                    lastBullet.removeClass("js_prefix-disable-bullate");
                                }
                                if (jQuery(window).width() > 1199) {
                                    var innerTranslate = -(160 + swSpace[this.currentBreakpoint]) * (this.activeIndex);
                                    currentElement.find(".swiper-wrapper").css({
                                        "transform": "translate3d(" + innerTranslate + "px, 0, 0)"
                                    });
                                    currentElement.find('.swiper-slide:not(.swiper-slide-active)').css({
                                        width: "160px"
                                    });
                                    currentElement.find('.swiper-slide.swiper-slide-active').css({
                                        width: "476px"
                                    });
                                }
                            },
                            resize: function () {
                                var currentElement = jQuery(this.el);
                                if (jQuery(window).width() > 1199) {
                                    if (currentElement.data("loop")) {
                                        var innerTranslate = -(160 + swSpace[this.currentBreakpoint]) * this.loopedSlides;
                                        currentElement.find(".swiper-wrapper").css({
                                            "transform": "translate3d(" + innerTranslate + "px, 0, 0)"
                                        });
                                    }
                                    currentElement.find('.swiper-slide:not(.swiper-slide-active)').css({
                                        width: "160px"
                                    });
                                    currentElement.find('.swiper-slide.swiper-slide-active').css({
                                        width: "476px"
                                    });
                                }
                            },
                            init: function () {
                                var currentElement = jQuery(this.el);
                                currentElement.find('.swiper-slide').css({
                                    'max-width': 'auto'
                                });
                            }
                        },
                        pagination: (slider.data('pagination')) ? iqonicPagination : "",
                        breakpoints: breakpoint,
                    };
                    var swiper = new Swiper(slider[0], sw_config);
                });
                jQuery(document).trigger('after_slider_init');
            }

            function updateProfessionalsNearMeCount(data){
                alert(data)
            }
        });

    </script>
@endsection
