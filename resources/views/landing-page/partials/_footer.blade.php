<footer class="footer footer-container">
    @php
    $settings = App\Models\Setting::whereIn('type', ['general-setting', 'social-media', 'site-setup'])
        ->whereIn('key', ['general-setting', 'social-media', 'site-setup'])
        ->get()
        ->keyBy('type');
    $generalsetting = json_decode($settings['general-setting']->value);
    $socialmedia = json_decode($settings['social-media']->value);
    $appsetting = json_decode($settings['site-setup']->value);
        $copyright_text = $appsetting->site_copyright;
        $position = strpos($copyright_text, 'by');
        if ($position !== false) {
            $first_part = substr($copyright_text, 0, $position + 2);
            $second_part = substr($copyright_text, $position + 2);
        } else {
            $first_part = $copyright_text;
            $second_part = '';
        }
    @endphp
    <div class="container custom-width-container">
        <div class="row footer-newsletter-section">
            <div class="col-md-12 col-lg-4">
                <p class="newsletter-heading text-start text-md-center text-lg-start">
                    Souscris à notre newsletter pour ne rien manquer
                </p>
                <p class="newsletter-description text-start text-md-center text-lg-start">
                    Recevez régulièrement du contenu de qualité pour vous accompagner au quotidien
                </p>
            </div>
            <div class="col-md-12 col-lg-2"></div>
            <div class="col-12 col-sm-12 col-md-8 offset-md-2 offset-lg-0 col-lg-6">
                <div class="d-flex flex-wrap justify-content-start justify-content-md-center align-items-center justify-content-lg-end">
                    <input type="email" name="email" class="newsletter-input form-control w-100" placeholder="exemple@gmail.com">
                    <button class="mt-2 mt-sm-0 w-100 w-80 btn btn-primary newsletter-submit-button d-flex justify-content-center align-items-center">
                        Envoyer le mail
                    </button>
                </div>
            </div>
        </div>
        <div class="row footer-links-section">
            <div class="col-12 col-md-4">
                @include('landing-page.components.widgets.logo')
                <p class="mb-0 readmore-text">
                    {{ $generalsetting->site_description }}
                </p>
                <a href="javascript:void(0);" class="readmore-btn mb-3">
                    <strong>
                        {{__('landingpage.read_more')}}
                    </strong>
                </a>
            </div>
            <div class="col-12 col-md-2"></div>
            <div class="col-12 mt-5 mt-md-0 col-md-6 links-container ">
                <div class="row d-flex flex-wrap justify-content-between">
                    <div class="col-6 col-sm-3">
                        <ul class="list-unstyled text-left text-sm-left">
                            <li> <span class="links-heading"> Entreprise </span> </li>
                            <li> <a href="#" class="links-text"> A propos </a> </li>
                            <li> <a href="#" class="links-text"> Contact </a> </li>
                            <li> <a href="#" class="links-text"> FAQ </a> </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3">
                        <ul class="list-unstyled text-left text-sm-left">
                            <li> <span class="links-heading"> Ressources </span> </li>
                            <li> <a href="#" class="links-text"> Formations </a> </li>
                            <li> <a href="#" class="links-text"> Evènements </a> </li>
                            <li> <a href="#" class="links-text"> Tutoriels </a> </li>
                            <li> <a href="#" class="links-text"> Blog </a> </li>
                            <li> <a href="#" class="links-text"> Support </a> </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3">
                        <ul class="list-unstyled text-left text-sm-left">
                            <li> <span class="links-heading"> Autres </span> </li>
                            <li> <a href="#" class="links-text"> A propos </a> </li>
                            <li> <a href="#" class="links-text"> Contact </a> </li>
                            <li> <a href="#" class="links-text"> FAQ </a> </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3">
                        <ul class="list-unstyled text-left text-sm-left">
                            <li><span class="links-heading"> Social </span> </li>
                            <li><a href="#" target="_blank" class="links-text"> Tiktok </a> </li>
                            <li><a href="{{ $socialmedia->youtube_url }}" target="_blank" class="links-text">{{__('landingpage.youtube')}}</a> </li>
                            <li><a href="{{ $socialmedia->facebook_url }}" target="_blank" class="links-text">{{__('landingpage.facebook')}}</a> </li>
                            <li><a href="{{ $socialmedia->instagram_url }}" target="_blank" class="links-text">{{__('landingpage.instagram')}}</a> </li>
                            <li><a href="{{ $socialmedia->twitter_url }}" target="_blank" class="links-text">{{__('landingpage.twitter')}}</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-contact-section">
            <div class="col-12 col-md-4 contact-left-section my-2">
                <p class="contact-heading mb-0">
                    Entrons en contact
                </p>
                <p class="contact-description mb-0">
                    Nous sommes disponibles avec ces coordonnées
                </p>
            </div>
            <div class="col-12 col-md-1"></div>
            <div class="col-12 col-md-7 d-flex justify-content-between flex-wrap">
                <div class="phone-section d-flex align-items-center  my-2">
                    <div class="icon-section d-flex">
                        <img src="{{asset('images/footer/phone.png')}}" />
                    </div>
                    <div class="contact-details-container">
                        <p class="contact-label mb-0">{{__('landingpage.helpline_number')}}</p>
                        <p class="contact-info mb-0">
                            <a href="tel:{{$generalsetting->helpline_number}}">{{$generalsetting->helpline_number}}</a>
                        </p>
                    </div>
                </div>
                <div class="email-section d-flex align-items-center  my-2">
                    <div class="icon-section d-flex">
                        <img src="{{asset('images/footer/email.png')}}" />
                    </div>
                    <div class="contact-details-container">
                        <p class="contact-label mb-0">{{__('landingpage.business_inquries')}}</p>
                        <p class="contact-info mb-0">
                            <a href="mailto: {{ $generalsetting->inquriy_email }}">{{ $generalsetting->inquriy_email }}</a>
                        </p>
                    </div>
                </div>
                <div class="location-section d-flex align-items-center  my-2">
                    <div class="icon-section d-flex">
                        <img src="{{asset('images/footer/location.png')}}" />
                    </div>
                    <div class="contact-details-container">
                        <p class="contact-label mb-0">Localisation</p>
                        <p class="contact-info mb-0"> Montréal, Canada</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-copyright-section">
            <div class="col-12 col-md-5 mb-2">
                <p class="mb-0 copyright-text-link text-center text-lg-start">
                    Bien-être noir 2023
                </p>
            </div>
            <div class="col-12 col-md-4 mb-2">
                <p class="mb-0 copyright-text-link text-center text-lg-start">
                    Tous droits réservés
                </p>
            </div>
            <div class="col-12 col-md-3 mb-2">
                <p class="mb-0 copyright-text-link text-center text-lg-end">
                    <a target="_blank" href="{{ route('user.term_conditions') }}">Conditions d’utilisation</a>
                    <a target="_blank" href="{{ route('user.privacy_policy') }}">Confidentialité</a>
                </p>
            </div>
        </div>
    </div>
</footer>
@include('partials._scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    $('#submit_btn').on('click', function () {
       const email = $('#email').val();
       if (!email.trim()) {
        Swal.fire({
            title: 'Error',
            text: 'Please enter an email address',
            icon: 'error',
            iconColor: '#5F60B9'
        });
        return;
    }
        if (!validateEmail(email)) {
            Swal.fire({
                title: 'Error',
                text: 'Invalid email address',
                icon: 'error',
                iconColor: '#5F60B9'
            });
            return;
        }
       $.ajax({
            url: '/user-subscribe',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                email: email,
            },
            success: function (response) {
               Swal.fire({
               title: 'Done',
               text: response.message,
               icon: 'success',
               iconColor: '#5F60B9'
               }).then((result) => {
                  if (result.isConfirmed) {
                     document.getElementById('email').value = '';
                     window.location.reload();
                  }
               });
            },
            error: function (error) {
                Swal.fire({
                title: 'Error',
                text: 'Something Went Wrong!',
                icon: 'error',
                iconColor: '#5F60B9'
                }).then((result) => {
                });
                console.error('Error:', error);
            }
        });
    });
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    document.addEventListener("DOMContentLoaded", function() {
        var description = document.querySelector('.readmore-text');
        var readmoreBtn = document.querySelector('.readmore-btn');
        if (description.offsetHeight < description.scrollHeight) {
            readmoreBtn.style.display = 'block';
        } else {
            readmoreBtn.style.display = 'none';
        }
    });
</script>
