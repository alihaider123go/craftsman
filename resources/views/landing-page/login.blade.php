@section('before_head')
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
@endsection

@extends('landing-page.layouts.headerremove')
<style>
    /* auth pages css start here */
    .login_page_wrapper
    {
        width: 450px;
        /* padding-top: 40px; */
    }
    .login_page_wrapper img
    {
        width: 91.17px;
        height: 40px;
    }
    .login_form_container
    {
        margin-top: 64px;
    }
    .form_heading
    {
        font-family: 'Rubik';
        font-style: normal;
        font-weight: 800;
        font-size: 28px;
        line-height: 35px;
        color: #202020;
        margin-bottom: 12px;
    }
    .form_description
    {
        font-family: 'Open Sans';
        font-weight: 400;
        font-size: 14px;
        line-height: 19px;
        color: #454545;
        margin-bottom: 0px;
    }
    .login_form
    {
        margin-top: 44px;
    }
    .login_form label
    {
        font-family: 'Rubik';
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 16px;
        color: #202020;
        margin-bottom: 4px;
    }
    .custom-form-field
    {
        margin-bottom: 16px;
    }

    .login-submit
    {
        margin-top: 44px;
        margin-bottom: 24px;
    }
    .login_form input,
    .login_form input:focus,
    .input-group-text
    {
        box-sizing: border-box;
        background: #FFFFFF !important;
        border: 1px solid #E5E5E5 !important;
        border-radius: 10px;
    }
    .login_form input[type="password"],
    .login_form input[type="password"]:focus
    {
        border-right: none !important;
    }
    .input-group-text
    {
        border-left: none !important;
    }
    .forgot_link_section
    {
        margin-top: 24px;
    }
    .form_footer_text
    {
        margin-top: 24px;
    }
    .forgot_password_text
    {
        font-family: 'Open Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 19px;
        text-decoration-line: underline;
        color: #202020;
    }    
    .form_footer_text label,
    .form_footer_text a
    {
        font-family: 'Open Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 16px;
        text-align: center;
        color: #202020;
    }
    /* auth pages css end here */
</style>
@section('content')
<div>
    <div class="container-fluid px-lg-0 py-lg-0 pb-5">
        <div class="row min-vh-100 max-vh-100 g-lg-0">
            <div class="col-12 col-xl-6 col-lg-6 mh-100">
                {{--
                <div class="py-5 d-flex flex-column justify-content-center h-100">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="text-center">
                                @php
                                $footerSection = App\Models\ForntendSetting::where('key', 'login-register-setting')->first();
                                $sectionData = $footerSection ? json_decode($footerSection->value, true) : null;
                                @endphp
                                @if ($sectionData && isset($sectionData['login_register']) && $sectionData['login_register'] == 1)
                                    <div class="mb-5">
                                        <h3 class="text-capitalize mb-3">
                                            {{ $sectionData['title'] }}
                                        </h3>
                                        <p class="m-0">
                                            {{$sectionData['description']}}        
                                        </p>
                                    </div>
                                    @php
                                        $loginregisterimage = Spatie\MediaLibrary\MediaCollections\Models\Media::where('collection_name', 'login_register_image')->first();
                                    @endphp
                                    @if($loginregisterimage)
                                        <img src="{{ url('storage/' . $loginregisterimage->id . '/' . $loginregisterimage->file_name) }}" alt="video-popup" class="img-fluid w-100 rounded">
                                    @else
                                        <img src="{{asset('landing-images/general/login.webp ')}}" class="img-fluid w-75" alt="log-in"/>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                --}}
                <img src="{{ asset('images/frontend/landing-page/login-page.webp')}}" class="img-responsive w-100" alt="log-in"/>
            </div>
            <div class="col-12 col-xl-6 col-lg-6 mh-100 d-flex justify-content-center align-items-center">
                <div class="login_page_wrapper">
                    <img src="{{ asset('images/logo.png')}}" class="img-responsive" alt="log-in"/>
                    <div class="login_form_container">
                        <p class="form_heading">{{__('auth.sign_in')}}</p>
                        <p class="form_description">{{__('auth.sign_in_description')}}</p>
                        <div class="login_form">
                            <form id="loginForm" data-toggle="validator" method="post">
                                {{csrf_field()}}
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('landingpage.email')}} <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="{{__('placeholder.email')}}" aria-label="Username" aria-describedby="basic-addon1" required>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>

                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('landingpage.your')}} {{__('auth.login_password')}} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control border-right-none" placeholder="{{__('placeholder.login_password')}}" aria-label="Password" aria-describedby="togglePassword" required>
                                        <span class="input-group-text" id="togglePassword">
                                            <i class="fa fa-eye-slash" aria-hidden="true" onclick="togglePassword()"></i>
                                        </span>
                                    </div>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                                
                                <input type="hidden" name="login" value="user_login">
                                <div class="forgot_link_section d-flex flex-sm-row justify-content-between align-items-center">
                                {{-- <p class="login-remember m-0"><label class="m-0"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> {{__('landingpage.remember_me')}}</label>
                                    </p> --}}
                                    <a href="{{route('user.forgot_password')}}" class="forgot_password_text"><i>{{__('auth.forgot_password')}}</i></a>
                                </div>
                                <div class="login-submit">
                                    <button type="submit"  class="btn btn-primary w-100 text-capitalize">{{__('auth.login')}}</button>
                                </div>
                            </form>
                        </div>

                        <div class="text-center form_footer_text">
                            <label class="m-0"> {{__('auth.dont_have_account')}}</label>
                            <a href="{{route('user.register')}}" class="ms-1 align-baseline">
                                <strong>
                                    {{__('auth.signup')}}
                                </strong>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

<!-- 
            <div class="col-12 col-xl-6 col-lg-6 border border-primary mh-100 d-flex justify-content-center">
                <div class="py-5 px-3 bg-light d-flex flex-column justify-content-center h-100">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="authontication-forms">
                                <div class="text-center mb-5">
                                    <h4 class="text-capitalize">{{__('auth.sign_in')}}</h4>
                                </div>
                                <div class="iq-login-form ">
                                    <div class="alert alert-danger d-none" role="alert"  id="error">
 
                                    </div>
                                    <form id="loginForm" data-toggle="validator" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('landingpage.email')}} <span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="{{__('placeholder.email')}}"
                                                aria-label="Username" aria-describedby="basic-addon1" required>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>
                                        

                                        <div class="form-group icon-right mb-5 custom-form-field">
                                        <label>{{__('landingpage.your')}} {{__('auth.login_password')}} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="{{__('placeholder.login_password')}}"
                                                       aria-label="Password" aria-describedby="togglePassword" required>
                                                <span class="input-group-text" id="togglePassword">
                                                    <i class="fa fa-eye-slash" aria-hidden="true" onclick="togglePassword()"></i>
                                                </span>
                                            </div>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>
                                       

                                        <input type="hidden" name="login" value="user_login">

                                         <div class="d-flex flex-sm-row justify-content-between align-items-center mb-4">
                                            <p class="login-remember m-0"><label class="m-0"><input name="rememberme"
                                                        type="checkbox" id="rememberme" value="forever"> {{__('landingpage.remember_me')}}</label>
                                            </p>
                                            <a href="{{route('user.forgot_password')}}" class="btn-link p-0 text-capitalize"><i>{{__('auth.forgot_password')}}</i></a>
                                         </div>
                                        
                                        <div class="login-submit">
                                            <button type="submit"  class="btn btn-primary w-100 text-capitalize">{{__('auth.login')}}</button>
                                        </div>
                                    </form>


                                    <div class="text-center my-4 text-signup">
                                        <label class="m-0 text-capitalize"> {{__('auth.dont_have_account')}}</label>
                                        <a href="{{route('user.register')}}" class="ms-1 btn-link align-baseline text-capitalize">{{__('auth.signup')}}</a>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{route('partner.register')}}" class="btn-link p-0 text-capitalize">{{__('landingpage.handyman_provider_register')}}</a>
                                    </div>

                                    <div class="mt-5">
                                        <h6 class="mb-3 text-capitalize text-center">{{__('landingpage.demo_accounts')}}</h6>
                                        <div class="px-5 py-3 bg-primary">
                                            <ul class="iq-social-list-text d-flex align-items-center justify-content-center flex-wrap m-0 list-inline">
                                                <li class="me-3 pe-3">
                                                    <a href="{{ route('auth.login', ['email' => 'admin@admin.com', 'password' => '12345678']) }}" class="text-capitalize text-white">{{__('landingpage.admin')}}</a>
                                                </li>
                                                <li class="me-3 pe-3">
                                                    <a href="{{ route('auth.login', ['email' => 'demo@provider.com', 'password' => '12345678']) }}" class="text-capitalize text-white">{{__('messages.provider')}}</a>
                                                </li>
                                                <li class="me-3 pe-3">
                                                    <a href="{{ route('auth.login', ['email' => 'demo@handyman.com', 'password' => '12345678']) }}" class="text-capitalize text-white">{{__('messages.handyman')}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('auth.login', ['email' => 'demo@user.com', 'password' => '12345678']) }}" class="text-capitalize text-white">{{__('landingpage.user')}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>


    $(document).ready(function() {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
        $('#loginForm').submit(function(e) {

            e.preventDefault();

            var formData = $(this).serialize();
            const urlParams = new URLSearchParams(window.location.search);
            const serviceId = urlParams.get('service_id');
            const Favservice = urlParams.get('favorite_service');
        
            $.ajax({
                method: 'post',
                url: baseUrl+'/api/login',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if(response.data){
                       if(serviceId !=null){
                        window.location.href = baseUrl + '/book-service?id=' + serviceId;
                       }else if(Favservice != null){
                        window.location.href = baseUrl + '/service-detail/' + Favservice;
                       }else{
                        window.location.href = baseUrl+'/home';
                       }

                    }
                },
                error: function(xhr, status, error) {

                     $('#error').removeClass('d-none')

                     $('#error').text(xhr.responseJSON.message)

                }
            });
        });
    });


    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const icon = document.querySelector('#togglePassword i');

        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Change the eye icon based on the password visibility
        icon.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
    }
</script>
