<template>
    <div class="row">
        <div class="col-12">
            <p class="mb-0 mt-6 mt-lg-0 professionals-heading-text d-flex justify-content-between">
                <span>
                    <strong>+ {{ providersCount }}</strong>
                    {{$t('landingpage.professionals_around_you')}}
                </span>
                <a href="/provider-list" class="view-more-link">
                    <strong>{{$t('landingpage.see_more')}}</strong>
                </a>
            </p>
        </div>
        <div class="col-12">
            <section >
                <Swiper class="swiper-container" v-if="is_loading == false && providersList.length > 0"
                :navigation="true"
                :modules="modules"
                :slides-per-view="4"
                :space-between="12"
                :loop="false"
                :pagination="{ clickable: true }"
                :autoplay="{ delay: 3000, disableOnInteraction: false }"
                :breakpoints="{
                  320: { slidesPerView: 1 },
                  550: { slidesPerView: 2 },
                  991: { slidesPerView: 3 },
                  1024: { slidesPerView: 4 },
                  1400: { slidesPerView: 4},
                  1500: { slidesPerView: 4 },
                  1920: { slidesPerView: 5 },
                  2040: { slidesPerView: 5 },
                  2440: { slidesPerView: 5 }
                }"
                  @slide-change-transition-start="changeSlide"
                >
                  <SwiperSlide v-for="provider in providers" :key="provider.id">
                    <div class="justify-content-center service-slide-items-4">
                      <div class="col">
                        <ProfessionalCard 
                          :userImage="provider.profile_image" 
                          :providerName="provider.display_name" 
                          :provider_id= "provider.id"
                          :title="provider.description"
                          :reviewNo="provider.providers_service_rating" 
                          :reviewCount="provider.total_service_rating"
                          />
                      </div>
                    </div>
                  </SwiperSlide>
                </Swiper>
            
                <Swiper class="swiper-container" v-if="is_loading ==true && providersList.length == 0"
                :navigation="true"
                :modules="modules"
                :slides-per-view="4"
                :space-between="12"
                :loop="false"
                :pagination="{ clickable: true  }"
                :autoplay="{ delay: 3000, disableOnInteraction: false }"
                :breakpoints="{
                      320: { slidesPerView: 1 },
                      550: { slidesPerView: 2 },
                      991: { slidesPerView: 3 },
                      1024: { slidesPerView: 4 },
                      1400: { slidesPerView: 4 },
                      1500: { slidesPerView: 4 },
                      1920: { slidesPerView: 5 },
                      2040: { slidesPerView: 5 },
                      2440: { slidesPerView: 5 }
                    }"
                >
                  <SwiperSlide v-for="item in 4" :key="item" >
                    <div class="justify-content-center service-slide-items-4">
                      <div class="col">
                        <ServiceShimmer ></ServiceShimmer>
                      </div>
                    </div>
                  </SwiperSlide>
                </Swiper>
                <span v-if="is_loading ==false && providersList.length == 0"> Data Not Available </span>
            </section>
        </div>
    </div>
  </template>

  <script setup>

  import ProfessionalCard from '../components/ProfessionalCard.vue';
  
  
  import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
  import ServiceShimmer  from '../shimmer/ServiceShimmer.vue';
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';
  
  const modules = [Navigation, Pagination, Scrollbar, A11y];
  const props = defineProps(['user_id','favourite','featured']);
  
  const is_loading=ref(false)
  
  // Export component options
  import { computed} from 'vue';
  import { onMounted,ref} from 'vue';
  import {useSection} from '../store/index'
  import {useObserveSection} from '../hooks/Observer'
  import {FEATURED_PROVIDER_API,PROVIDERS_COUNT_API} from '../data/api'; 
  
  const store = useSection()
  
  const providersList = ref([]);
  const providersCount = ref(0);  
  const providers = ref([]);
  const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

  const getFeaturedProviders = async () => {
        try {
           is_loading.value=true
           const response = await fetch(FEATURED_PROVIDER_API());
           const data = await response.json();
           if (data && Array.isArray(data.data)) {
           providersList.value = data.data;
            // const topProvider = providersList.value.slice(0, 4);
            const topProvider = providersList.value;
            providers.value = topProvider;
            is_loading.value=false

           } else {
           console.error('Invalid data structure or missing array of providers.');
           }
        } catch (error) {
           console.error('Error fetching or processing data:', error);
        }
     };

     const getAllProvidersCount = async () => {
        try {
           const response = await fetch(PROVIDERS_COUNT_API());
           const data = await response.json();
           providersCount.value = data.count;
        } catch (error) {
           console.error('Error fetching or processing data:', error);
        }
     };
  
  onMounted(async () => {
    if(props.featured == true){
      await getFeaturedProviders();
    }
    await getAllProvidersCount()
  
  });

  function changeSlide (elem) {
    //  var currentElement = jQuery(elem.el);
    // var lastBullet = currentElement.find(".swiper-pagination-bullet:last");
    // console.log(lastBullet)
    // if (elem.slides.length - (elem.loopedSlides + 1) === elem.activeIndex) {
    //     lastBullet.addClass("js_prefix-disable-bullate");
    // } else {
    //     lastBullet.removeClass("js_prefix-disable-bullate");
    // }
    // if (jQuery(window).width() > 1199) {
    //     var innerTranslate = -(160 + swSpace[this.currentBreakpoint]) * (this.activeIndex);
    //     currentElement.find(".swiper-wrapper").css({
    //     "transform": "translate3d(" + innerTranslate + "px, 0, 0)"
    //     });
    //     currentElement.find('.swiper-slide:not(.swiper-slide-active)').css({
    //     width: "160px"
    //     });
    //     currentElement.find('.swiper-slide.swiper-slide-active').css({
    //     width: "476px"
    //     });
    // }
}
  </script>
<!-- <style>
  .swiper-container{
    padding: 0px 50px;
  }
</style> -->