<template>
    <div class="row">
        <div class="col-12">
            <section ref="servicesection">
                <Swiper class="swiper-container"
                :modules="modules"
                :slides-per-view="4"
                :space-between="12"
                :loop="false"
                :pagination="{ clickable: false }"
                :autoplay="{ delay: 3000, disableOnInteraction: false }"
                :breakpoints="{
                  320: { slidesPerView: 1 },
                  550: { slidesPerView: 2 },
                  991: { slidesPerView: 3 },
                  1024: { slidesPerView: 5 },
                  1400: { slidesPerView: 5 },
                  1500: { slidesPerView: 5 },
                  1920: { slidesPerView: 5 },
                  2040: { slidesPerView: 5 },
                  2440: { slidesPerView: 5 }
                }"
                  @slide-change-transition-start="changeSlide"
                >
                  <SwiperSlide v-for="category in categoryList" :key="category.id">
                    <div class="justify-content-center service-slide-items-4">
                      <div class="col">
                        <CategorySliderCard
                            :category_id="category.id"
                            :category_name="category.name"
                            :category_image="category.image"
                            :category_description="category.description"
                            :category_image_width="category.width"
                            :category_image_height="category.height"   
                          />
                      </div>
                    </div>
                  </SwiperSlide>
                </Swiper>
            
                <Swiper class="swiper-container" v-if="categoryList.length == 0"
                :modules="modules"
                :slides-per-view="4"
                :space-between="12"
                :loop="false"
                :pagination="{ clickable: false  }"
                :autoplay="{ delay: 3000, disableOnInteraction: false }"
                :breakpoints="{
                      320: { slidesPerView: 1 },
                      550: { slidesPerView: 2 },
                      991: { slidesPerView: 3 },
                      1024: { slidesPerView: 5 },
                      1400: { slidesPerView: 5 },
                      1500: { slidesPerView: 5 },
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
                <span v-if="IS_LOADER ==false && categoryList.length == 0"> Data Not Available </span>
            </section>
        </div>
    </div>
  </template>

  <script setup>

  import CategorySliderCard from '../components/CategorySliderCard.vue';
  
  
  import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
  import ServiceShimmer  from '../shimmer/ServiceShimmer.vue';
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue';
  
  const modules = [ Scrollbar, A11y];
//   const props = defineProps(['user_id','favourite','type','countRef']);
  
  
  // Export component options
//   import { computed} from 'vue';
    import { onMounted,ref} from 'vue';
//   import {useSection} from '../store/index'
//   import {useObserveSection} from '../hooks/Observer'
//   import { SERVICE_API,PROVIDER_API} from '../data/api'; 
  
//   const store = useSection()
//   const service_data = computed(() => store.service_list_data)
  
//   const services = ref([]);
    const categoryList = ref([]);
//   const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
//   const [servicesection] = useObserveSection(() => store.get_service_list({per_page: 8, category_id: null}))
  
    const fetchCategories = () => {
        categoryList.value = [
            { id: 22, name: 'Entrepreneurs', image: 'images/frontend/entrepreneurs.webp', width: '34px', height: '40px', description: "Cultivez votre réussite en affaires en ciblant ..." },
            { id: 30, name: 'Organisation', image: 'images/frontend/organization.webp', width: '31px', height: '30px', description: "Tirez le meilleur parti de votre équipe pour att ..." },
            { id: 18, name: 'Adultes', image: 'images/frontend/adults.webp', width: '18px', height: '38px', description: "Atteignez le stade de la personne que vous ave.." },
            { id: 32, name: 'Couple', image: 'images/frontend/couple.webp', width: '44px', height: '17px', description: "Augmentez l'harmonie dans votre couple pou" },
            { id: 31, name: 'Famille', image: 'images/frontend/family.webp', width: '36px', height: '38px', description: "Encouragez l'épanouissement fami..." },
        ];
    };
  
  
  
  onMounted(async () => {
    await fetchCategories();
  });
  
  function changeSlide (elem) {
    // console.log(this, elem)
      // var currentElement = jQuery(elem.el);
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
  