
<div class="provider-custom-card professional-box-card border-0 position-relative">

            <a href="{{ route('provider.detail', $data->id) }}" class="position-absolute w-100 h-100 start-0 top-0 d-block">
			</a>
        <!-- name -->
        <div class="professional-avatar-section">
            <img src="{{ getSingleMedia($data,'profile_image', null) }}" alt="professional-avatar" class="professional-avatar object-cover" />
        </div>

        <div class="professional-user-name-section">
            <a href="{{ route('provider.detail', $data->id) }}" class="professional-user-name">
                {{ $data->display_name }}
            </a>
        </div>
        
        <div class="professional-category-section line-count-2">
            <a href="#" class="professional-category">
                {{ $data->designation }}
            </a>    
        </div>

        <div class="view-all-services-button-section">
            <button class="view-all-services-button">
                <a href="{{ route('provider.detail', $data->id) }}" class="professional-user-name">
                    <span>
                        Voir les services
                    </span>
                </a>
            </button>
        </div>

        @php $rating = round($providers_service_rating,1); @endphp

        <!-- rating -->
        <div class="d-flex justify-content-center align-items-center professional-rating-section">
            <span class="professional-avg-rating">
                {{$rating}}&nbsp;
            </span>
            <span class="rateit-demo bigstars" data-rateit-value="{{ $rating }}"></span>
            <h6 class="professional-reviews">
                @if($rating > 1)
                <a href="#" class="text-body ms-1">
                    {{(round($providers_service_rating,1))}} {{__('messages.reviews')}}
                </a>
                @else
                <a href="#" class="text-body ms-1">
                    {{(round($providers_service_rating,1))}} {{__('messages.review')}}
                </a>
                @endif
            </h6>
        </div>

</div>

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
</script>