<div class="service-box-card" data-service-id="{{ $data->id }}">
   <div class="iq-image position-relative">
      @if($data->visit_type == 'ONLINE')
         <span class="online-service"></span>
      @endif
      <a href="{{ route('service.detail', $data->id) }}" class="service-img">
         <img src="{{ getSingleMedia($data,'service_attachment', null) }}" alt="service"
         class="service-img w-100 object-cover img-fluid"> 
      </a>

      {{--
      @if(auth()->check() && auth()->user()->hasRole('user'))
         @if($favouriteService->isEmpty())
            <form method="POST" id="favoriteForm">
               @csrf

               <input type="hidden" name="service_id" class="service_id" value="{{ $data->id }}" data-service-id="{{ $data->id }}">
               @if(!empty(auth()->user()))
                  <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
               @endif
               <button type="button" class="btn-link serv-whishlist text-primary save_fav">
                  <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                     <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
               </button>
            </form>
         @else
            <form method="POST" id="favoriteForm">
               @csrf

               <input type="hidden" name="service_id" class="service_id" value="{{ $data->id }}" data-service-id="{{ $data->id }}">
               @if(!empty(auth()->user()))
                  <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
               @endif
               <button type="button" class="btn-link serv-whishlist text-primary delete_fav">
                  <svg width="12" height="13" viewBox="0 0 12 13" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </button>
            </form>
         @endif
      @else
         <form method="GET" id="favoriteForm" action="{{ route('user.login') }}">
            @csrf
            <button type="submit" class="btn-link serv-whishlist text-primary">
               <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
            </button>
         </form>
      @endif
      --}}

   </div>
   <div class="service-detail-container">
      <a href="{{ route('service.detail', $data->id) }}" class="service-heading mt-4 d-block p-0">
         <h5 class="service-heading service-title font-size-18 line-count-2">{{ $data->name }}</h5>
      </a>
      <ul class="price-content">
         @if(!empty($data->duration))
            @php
               $durationParts = explode(':', $data->duration);
               $hours = intval($durationParts[0]);
               $minutes = intval($durationParts[1]);
            @endphp
            <li class="duration-text">
               <span>{{__('messages.duration')}}</span>
               @if($hours > 0)
                  {{ $hours }} hrs @if($minutes > 0) {{ $minutes }} min @endif
               @else
                  {{ $minutes }} min
               @endif
            </li>
         @endif
         @if($data->price==0)
            <li class="price-text">Free</li>
            @else
            <li class="price-text">{{ getPriceFormat($data->price) }}</li>
         @endif
      </ul>
      <div>
         <div class="d-flex align-items-center service-user-detail">
            <img src="{{ getSingleMedia($data->providers,'profile_image', null) }}" alt="service" class="img-fluid object-cover avatar-24 user-avatar">
            <a href="{{ route('provider.detail', ($data->providers)->id) }}">
               <span class="service-user-name">{{ ($data->providers)->display_name }}</span>
            </a>
         </div>
         <div class="d-flex align-items-center">
            @if($totalRating > 0)
            <span class="service-avg-rating">
               {{ round($totalRating, 1) }}&nbsp;
            </span>
            <span class="rateit-demo bigstars" data-rateit-value="{{ round($totalRating, 1) }}"></span>
            <h6 class="service-reviews">
               @if($totalReviews>1)
               <a href="{{ route('rating.all', ['service_id' => $data->id]) }}" class="text-body ms-1">({{$totalReviews }} {{__('messages.reviews')}})</a>
            </h6>
               @else
               <a href="{{ route('rating.all', ['service_id' => $data->id]) }}" class="text-body ms-1">({{$totalReviews }} {{__('messages.review')}})</a>
            </h6>
               @endif
            @endif
         </div>
      </div>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('vendor/star-rating/jquery.rateit.js') }}"></script>
<script>
$('.rateit-demo').rateit({
   readonly:true,
   min: 0,
   max: 5,
   step: 0.5,
   mode:'font',
   // icon: '⭐'
});
   $(document).ready(function () {
   
    const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

    $('.save_fav').off('click').on('click', function () {

       const form = $(this).closest('form');

       const serviceId = form.find('.service_id').data('service-id');
       const userId = $('#user_id').val();

       $.ajax({
            url: baseUrl + '/api/save-favourite',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                service_id: serviceId,
                user_id: userId,
            },
            success: function (response) {
               Swal.fire({
               title: 'Done',
               text: response.message,
               icon: 'success',
               iconColor: '#5F60B9'
               }).then((result) => {
                  if (result.isConfirmed) {
                     $('#datatable').DataTable().ajax.reload();
                  }
               })
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });

    $('.delete_fav').off('click').on('click', function () {
       const form = $(this).closest('form');

       const serviceId = form.find('.service_id').data('service-id');
       const userId = $('#user_id').val();

       $.ajax({
            url: baseUrl + '/api/delete-favourite',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                service_id: serviceId,
                user_id: userId,
            },
            success: function (response) {
               Swal.fire({
               title: 'Done',
               text: response.message,
               icon: 'success',
               iconColor: '#5F60B9'
               }).then((result) => {
                  if (result.isConfirmed) {
                     $('#datatable').DataTable().ajax.reload();
                  }
               })
            },
            error: function (error) {
                console.error('Error', error);
            }
        });
    });

    $('.service-heading, .service-img').on('click', function (e) {
    e.preventDefault();
    var serviceId = $(this).closest('.service-box-card').data('service-id');

    // Local Storage
    var storedServiceIds = JSON.parse(localStorage.getItem('recentlyViewed')) || [];
    if (!storedServiceIds.includes(serviceId)) {
        storedServiceIds.unshift(serviceId);
        storedServiceIds = storedServiceIds.slice(0, 10);
        localStorage.setItem('recentlyViewed', JSON.stringify(storedServiceIds));
    }

    // Laravel Session
    $.ajax({
        url: baseUrl + '/save-recently-viewed/' + serviceId,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function (response) {
            return response;
        },
        error: function (error) {
            console.error('Error storing recently viewed service:', error);
        }
    });

    window.location.href = $(this).attr('href');
});
});
</script>