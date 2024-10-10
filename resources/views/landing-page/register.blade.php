@section('before_head')
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/frontend/intlTelInput.css')}}">
@endsection

@extends('landing-page.layouts.headerremove')
<style>
    /* auth pages css start here */
    .login_page_wrapper
    {
        width: 450px;
        padding-top: 40px;
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
        margin-top: 44px !important;
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
    .input-group-append span
    {
        height: 100%;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
    .login-submit
    {
        margin-top: 44px;
        /* margin-bottom: 24px; */
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
        margin-top: 24px !important;
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
    .agreement_checkbox
    {
        font-family: 'Open Sans';
        font-style: normal;
        font-size: 12px;
        line-height: 16px;
        color: #202020;
        display: flex;
        align-items: start;
    }
    .agreement_checkbox label
    {
        margin-left: 5px;
        font-weight: normal;
    }
    .agreement_checkbox a
    {
        color: #40AADB;
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
        <div class="row min-vh-100 g-lg-0">
            <div class="col-12 col-xl-6 col-lg-6 mh-100">
            {{--
                <div class="py-5 h-100 d-flex flex-column justify-content-center">
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
                                    <img src="{{asset('landing-images/general/login.webp ')}}" class="img-fluid" alt="log-in"/>
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                --}}
                <img src="{{ asset('images/frontend/landing-page/register-page.webp')}}" class="img-responsive h-100 w-100" alt="log-in"/>
            </div>
            <div class="col-12 col-xl-6 col-lg-6 mh-100 d-flex justify-content-center align-items-center">
                <div class="login_page_wrapper">
                    <img src="{{ asset('images/logo.png')}}" class="img-responsive" alt="log-in"/>
                    <div class="login_form_container">
                        <p class="form_heading">Créer un compte</p>
                        <p class="form_description">Accédez à votre espace personnel en tout temps.</p>
                    </div>
                    <form id="registerForm" method="POST"  data-toggle="validator">
                        {{csrf_field()}}
                        <div class="row login_form">
                            <div class="col-12 col-xl-6 col-lg-6 ">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('auth.first_name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="{{__('placeholder.first_name')}}" aria-label="firstname"
                                    aria-describedby="basic-addon1" required>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 col-lg-6 ">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('auth.last_name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="{{__('placeholder.last_name')}}" aria-label="lastname" aria-describedby="basic-addon2" required>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div>

                            <!-- <div class="col-12 col-xl-6 col-lg-6">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('landingpage.user_name')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="{{__('placeholder.user_name')}}" aria-label="Username" aria-describedby="basic-addon3" required>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div> -->
                            <div class="col-12 col-xl-6 col-lg-6">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('landingpage.email')}} <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="{{__('placeholder.email')}}" aria-label="Email Address" aria-describedby="basic-addon4" required>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div>

                            <div class="col-12 col-xl-6 col-lg-6">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('auth.contact_number')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="{{__('placeholder.contact_number')}}" aria-label="cnumber"
                                    aria-describedby="basic-addon6" required>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div>

                            <div class="col-12 col-xl-6 col-lg-6">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('landingpage.your')}} {{__('auth.login_password')}} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="{{__('placeholder.login_password')}}" aria-label="Password" aria-describedby="togglePasswordIcon" required>
                                        <!-- <div class="input-group-append"> -->
                                            <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon')">
                                                <i class="fa fa-eye-slash" id="togglePasswordIcon" aria-hidden="true"></i>
                                            </span>
                                        <!-- </div> -->
                                    </div>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 col-lg-6">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('auth.confirm_password')}}<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="{{__('placeholder.login_password')}}" aria-label="Password" aria-describedby="toggleConfirmPasswordIcon" data-match="#password" data-match-error="Password not match" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="togglePassword('password_confirmation', 'toggleConfirmPasswordIcon')">
                                                <i class="fa fa-eye-slash" id="toggleConfirmPasswordIcon" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div>

                            <!-- <div class="col-12 col-xl-12 col-lg-12">
                                <div class="form-group icon-right custom-form-field">
                                    <label>{{__('auth.contact_number')}} <span class="text-danger">*</span></label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="{{__('placeholder.contact_number')}}" aria-label="cnumber"
                                    aria-describedby="basic-addon6" required>
                                    <small class="help-block with-errors text-danger"></small>
                                </div>
                            </div> -->
                            <div class="col-12 col-xl-12 col-lg-12">
                                <div class="form-group icon-right custom-form-field agreement_checkbox">
                                    <input type="checkbox" id="agreement_check" name="agreement_check" required>
                                    <label for="agreement_check">
                                        En cliquant sur le bouton “Créer un compte”, j’accepte <a href="#">les termes</a> and <a href="#">conditions d’utilisation</a> de la plateforme BIEN-ETRE NOIR
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="register" value="user_register">

                            <div class="login-submit">
                                <button class="btn btn-primary w-100 text-capitalize" type="submit">{{__('messages.register')}}</button>
                            </div>


                            <div class="text-center form_footer_text">
                                <label class="m-0 text-capitalize">{{__('auth.already_have_account')}}</label>
                                <a href="{{route('user.login')}}" class="btn-link align-baseline ms-1">
                                    <strong>
                                        {{__('auth.sign_in')}}
                                    </strong>
                                </a>
                            </div>
                            <div class="text-center form_footer_text">
                                <a href="{{route('partner.register')}}" class="btn-link p-0 text-capitalize">
                                    <strong>
                                        {{__('landingpage.handyman_provider_register')}}
                                    </strong>
                                </a>
                            </div>




                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/intlTelInput.js')}}"></script>
<script>

     $(document).ready(function() {
        const input = document.querySelector("#phone_number");
        window.intlTelInput(input, {
            initialCountry: "us",
            utilsScript: "/js/intlTelInputUtils.js",
        }); 


        const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $('#registerForm').submit(function(e) {

            e.preventDefault();

            var formData = $(this).serialize();
        
            $.ajax({
                method: 'post',
                url: baseUrl+'/api/register',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if(response.data){

                         var email = $('input[name="email"]').val(); 
                         var password = $('input[name="password"]').val(); 
 
                        $.ajax({
                            method: 'post',
                            url: baseUrl+'/api/login',
                           data: {
                                   _token: csrfToken,
                                  email: email,
                                  password: password,
                                },
                            dataType: 'json',
                            success: function(response) {
                                if(response.data){
                                    
                                  window.location.href = baseUrl+'/';
            
                                }
                            },
                            error: function(xhr, status, error) {
            
                                 $('#error').removeClass('d-none')
            
                                 $('#error').text(xhr.responseJSON.message)
            
                            }
                        });
                
                    }
                },
                error: function(error) {

                     $('#error').removeClass('d-none')

                     $('#error').text(error.responseJSON.message)

                }
            });
        });
    });

    function togglePassword(passwordInputId, iconId) {
        const passwordInput = document.getElementById(passwordInputId);
        const icon = document.getElementById(iconId);
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        icon.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
    }


</script>
