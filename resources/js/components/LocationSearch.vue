<template>
   <div class="bg-body search-box-wrapper d-flex">
      <div class="d-flex flex-wrap align-items-center justify-content-between search-box-container">
         <div class="d-flex align-items-center flex-wrap search-fields-container">

            <!-- search input -->
            <div class="search-input d-flex align-items-center" v-for="setting in section1Data" :key="setting.id">
               <div class="form-group input-group mb-0 d-flex justify-content-start align-items-center" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_search') == 'on'">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g clip-path="url(#clip0_1247_494)">
                     <path d="M10.692 1.81656C10.4749 1.71751 10.239 1.66626 10.0004 1.66626C9.76172 1.66626 9.52585 1.71751 9.30871 1.81656L2.16704 5.06656C2.01917 5.13176 1.89344 5.23856 1.80518 5.37394C1.71692 5.50932 1.66992 5.66744 1.66992 5.82906C1.66992 5.99067 1.71692 6.1488 1.80518 6.28418C1.89344 6.41956 2.01917 6.52635 2.16704 6.59156L9.31704 9.84989C9.53418 9.94893 9.77005 10.0002 10.0087 10.0002C10.2474 10.0002 10.4832 9.94893 10.7004 9.84989L17.8504 6.59989C17.9983 6.53469 18.124 6.42789 18.2122 6.29251C18.3005 6.15713 18.3475 5.999 18.3475 5.83739C18.3475 5.67578 18.3005 5.51765 18.2122 5.38227C18.124 5.24689 17.9983 5.14009 17.8504 5.07489L10.692 1.81656Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M5.06639 7.91675L2.14972 9.25008C2.00656 9.31738 1.88551 9.42403 1.80072 9.55758C1.71593 9.69113 1.6709 9.84606 1.6709 10.0042C1.6709 10.1624 1.71593 10.3174 1.80072 10.4509C1.88551 10.5845 2.00656 10.6911 2.14972 10.7584L9.31639 14.0167C9.53239 14.1146 9.76677 14.1652 10.0039 14.1652C10.241 14.1652 10.4754 14.1146 10.6914 14.0167L17.8414 10.7667C17.9893 10.7015 18.115 10.5947 18.2033 10.4594C18.2915 10.324 18.3385 10.1659 18.3385 10.0042C18.3385 9.84264 18.2915 9.68451 18.2033 9.54913C18.115 9.41375 17.9893 9.30695 17.8414 9.24175L14.9247 7.91675" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M5.06639 12.0833L2.14972 13.4166C2.00656 13.4839 1.88551 13.5905 1.80072 13.7241C1.71593 13.8576 1.6709 14.0126 1.6709 14.1708C1.6709 14.3289 1.71593 14.4839 1.80072 14.6174C1.88551 14.751 2.00656 14.8576 2.14972 14.9249L9.31639 18.1833C9.53239 18.2811 9.76677 18.3317 10.0039 18.3317C10.241 18.3317 10.4754 18.2811 10.6914 18.1833L17.8414 14.9333C17.9893 14.868 18.115 14.7613 18.2033 14.6259C18.2915 14.4905 18.3385 14.3324 18.3385 14.1708C18.3385 14.0091 18.2915 13.851 18.2033 13.7156C18.115 13.5803 17.9893 13.4735 17.8414 13.4083L14.9247 12.0833" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                     </g>
                     <defs>
                     <clipPath id="clip0_1247_494">
                     <rect width="20" height="20" fill="white"/>
                     </clipPath>
                     </defs>
                  </svg>

                  <!-- <span class="input-group-text bg-transparent border-0 p-0 pe-2">
                     <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                        <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                        <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     </svg>
                  </span> -->
                  <input type="text" class="border-0" placeholder="Domaine" @keyup="getServiceList" v-model="keyword">
                  <div :class="`top-width dropdown-menu dropdown-menu-end user-dropdown homepage-user-dropdown mt-5 ${keyword.length > 0 ? 'show' : ''}`" aria-labelledby="dropdownMenuButton1">
                     <!-- <button class="btn btn-close" @click="closeDropdown"></button> -->
                     <span type="button" class="text-primary custom-btn-close" @click="closeDropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                           <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z" fill="currentColor"></path>
                        </svg>
                     </span>
                     <div class="location-search-dropdown">
                        <div v-if="serviceList.length > 0 && !show" >
                           <div class="searchbox-datalink global-search-result show-data" >
                              <ul class="iq-post p-3">
                                 <li v-for="service in serviceList" :key="service.id" class="mr-0 mb-3 pb-0 d-block">
                                    <a :href="`${baseUrl}/service-detail/${service.id}`">
                                       <div class="post-img d-flex align-items-center">
                                          <div class="post-img-holder">
                                             <a href="img-height">
                                                <img :src="service.attchments[0] ? service.attchments[0] : baseUrl+'/images/default.png'" alt="">
                                             </a>
                                          </div>
                                          <div class="post-blog pl-2">
                                             <div class="blog-box">
                                                <a class="nav-link">{{service.name}}</a>
                                             </div>
                                          </div>
                                       </div>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div v-else>
                           <div class="searchbox-datalink global-search-result show-data" >
                              <ul class="iq-post p-3 list-inline mb-0">
                                 <li>
                                    {{$t('landingpage.record_not_found')}}
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- location input -->
            <div class="location-input d-flex justify-content-start align-items-center" data-bs-toggle="modal"
              data-bs-target="#modal-location" v-for="setting in section1Data" :key="setting.id">
               <svg v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'current_location') == 'on'" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 14" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.66659 6.00026C7.66659 5.07941 6.92043 4.33325 6.00026 4.33325C5.07941 4.33325 4.33325 5.07941 4.33325 6.00026C4.33325 6.92043 5.07941 7.66659 6.00026 7.66659C6.92043 7.66659 7.66659 6.92043 7.66659 6.00026Z"
                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.99967 13C5.20069 13 1 9.59892 1 6.04219C1 3.25776 3.23807 1 5.99967 1C8.76128 1 11 3.25776 11 6.04219C11 9.59892 6.79866 13 5.99967 13Z"
                    stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               <span class="font-size-14 text-body text-capitalize" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'current_location') === 'on'">{{$t('landingpage.current_location')}}</span>
            </div>

            <!-- divider -->
            <div class="search-box-divider"></div>
        </div>

           <!-- <div class="py-2 px-3" v-for="setting in landingPageSettings" :key="setting.id">
              <button class="btn btn-primary" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_search') == 1">Search</button>
           </div> -->

        <!-- search button -->
         <div class="search-button-container" v-if="shouldShowSearchBox">
            <button class="btn btn-primary search-button">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M21.0002 21L16.7002 16.7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
               </svg>
               <span>
                  {{$t('landingpage.search')}}
               </span>
            </button>
         </div>
       </div>

       <div class="modal fade" id="modal-location" aria-labelledby="modal-locationLabel" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title text-capitalize" id="modal-locationLabel">{{$t('landingpage.get_nearest_services')}}</h5>
                         <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                                  <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                                     fill="currentColor">
                                  </path>
                            </svg>
                         </span>
                      </div>
                      <div class="modal-body">
                         <form>
                            <p v-if="showofflocation">{{ $t('landingpage.continue_view_services') }}</p>
                            <p v-else>{{ $t('landingpage.discover_find_services') }}</p>
                            <div class="row row-cols-2 pt-4">
                               <div class="col">
                                  <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal" aria-label="Close">{{ $t('messages.cancel')}}</button>
                               </div>
                               <div v-if="showofflocation" class="col">
                                  <button type="button" class="btn btn-primary w-100" @click="removeCurrentLocation" >{{ $t('messages.off_location') }}</button>
                               </div>
                               <div v-else class="col">
                                  <button type="button" class="btn btn-primary w-100" @click="getServices">{{ $t('messages.save')}}</button>
                               </div>
                                 
                            </div>
                         </form>
                      </div>
                </div>
             </div>
       </div>

    </div>
     <div class="mt-3 d-flex align-items-center justify-content-between gap-2 flex-wrap d-none" >
         <div v-for="setting in section1Data" :key="setting.id">
             <ul class="p-0 list-inline categories-list mb-0" v-if="setting.key === 'section_1'&& getJsonValue(setting.value, 'enable_popular_services') == 'on'">
                <li class="d-inline-block text-capitalize font-size-14 position-relative p-1">
                <h6>{{getJsonValue(setting.value, 'title')}}</h6>
                </li>
                <li v-for="(categoryIds, categoryIndex) in getJsonValue(setting.value, 'category_id')" :key="categoryIndex" class="d-inline-block text-capitalize font-size-14 position-relative p-1">
                      <a :href="`${baseUrl}/category-details/` + categoryIds" class="position-relative">
                         {{ getCategoryNames([categoryIds]) }}
                      </a>
                </li>
             </ul>
         </div>
          
          <div v-if="postjobservice === 1">
          <!-- <div v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_post_job') == 'on'"> -->
            
        <!-- <div  class="d-inline-block text-capitalize font-size-14 cursor-pointer text-decoration-underline" data-bs-target="#modaladdservice" data-bs-toggle="modal" @show="onModalShow" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_post_job') == 1"> -->
          <!-- <div class="d-inline-block text-capitalize font-size-14 cursor-pointer text-decoration-underline" @click="redirectToPostJob">
          <span>{{ $t('landingpage.post_job_service') }}</span>
         </div> -->
           <!-- <span>{{ $t('landingpage.post_job_service') }}</span> -->
        </div>
             <div class="modal fade " id="modaladdservice"  aria-labelledby="modal-locationLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <div class="modal-content">
                      <div class="modal-header justify-content-center">
                         <div class="text-center">
                            <h5 class="modal-title text-capitalize" id="modal-locationLabel">{{ $t('landingpage.add_your_service') }}</h5>
                            <p>{{ $t('landingpage.add_service_page_msg') }}</p>
                         </div>

                         <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close" @click="resetFormData()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                               <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                               <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                                  fill="currentColor">
                               </path>
                            </svg>
                         </span>
                      </div>
                      <div class="modal-body">
                         <form @submit.prevent="submitService">
                            <input type="hidden" name="_token" :value="csrfToken">
                            <div class="row">
                               <div class="col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('landingpage.Service_Category')}}</label>
                                  
                                  <select class="form-select" v-model="selectedCategory">
                                     <option value="" disabled selected>{{ $t('landingpage.select_category')}}</option>
                                     <option v-for="category in allCategory" :key="category.id" :value="category.id">{{ category.name }}</option>
                                  </select>
                                  <p v-if="allCategory.length === 0">{{ $t('landingpage.loading_categories') }}...</p>

                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('landingpage.service_name') }}</label>
                                  <input v-model="serviceName" type="text" class="form-control" placeholder="Write Service Name" aria-label="servicename" aria-describedby="basic-addon1">
                                  
                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{$t('landingpage.Type')}}</label>
                                  
                                  <select class="form-select" v-model="selectType">
                                    
                                     <option value="fixed" selected>{{ $t('messages.fixed')}}</option>
                                     <option value="hourly" >{{ $t('messages.hourly')}}</option>
                                     <option value="free" >{{ $t('messages.free')}}</option>
                                  </select>
                                  
                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('messages.price')}}</label>
                                  <input v-model="price" type="number" class="form-control" placeholder="Price" aria-label="price" aria-describedby="basic-addon1" min="1">
                                  
                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('messages.status')}}</label>
                                  
                                  <select class="form-select" v-model="status">
                                    
                                     <option value="active" selected>{{ $t('messages.active')}}</option>
                                     <option value="inactive" >{{ $t('messages.inactive')}}</option>
                                  </select>

                               </div>
                               <div class="mb-4 col-md-12">
                                     <label class="form-label text-capitalize">{{ $t('messages.description')}}</label>
                                     <textarea v-model="serviceDescription" class="form-control" rows="4" placeholder="Write Here..."></textarea>
                               </div>
                               <div class="mb-4">
                                     <button type="submit" class="btn btn-primary" :disabled="isLoading">{{ $t('messages.submit')}}</button>
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
     </div>

   
</template>

<script setup>
import { ref,computed, onMounted,defineProps} from 'vue';
import { CATEGORY_API,SERVICE_API, POST_SERVICE_API} from '../data/api'; 
import {useSection} from '../store/index'
//import {useObserveSection} from '../hooks/Observer'
const props = defineProps(['postjobservice','user_id']);

const store = useSection()
//const [userlogin] = useObserveSection(() => store.login({email : 'email', password: 'password'}))

const showofflocation = ref(false);

const categories = ref([]);
const allCategory = ref([]);
const redirectToPostJob = () => {
const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
if(props.user_id){
window.location.href = `${baseUrl}/post-job`;
}else{
window.location.href = `${baseUrl}/login-page`;
}
};

const closeDropdown = () => {
keyword.value = ''; 
show.value = false;
};
const fetchTopCategories = async () => {
try {
const response = await fetch(CATEGORY_API({ per_page: 'all', status: 1 }));
const data = await response.json();
if (data && Array.isArray(data.data)) {
const TotalServices = data.data.filter(user => user.services !== undefined);
const sortedCategories = TotalServices.sort((a, b) => b.services - a.services);
//const topCategories = sortedCategories.slice(0, 10);
categories.value = sortedCategories;
allCategory.value = TotalServices;
} else {
console.error('Invalid data structure or missing array of providers.');
}
} catch (error) {
console.error('Error fetching or processing data:', error);
}
};
onMounted(() => {
resetFormData();
fetchTopCategories();
});

const shouldShowSearchBox= async () => {
const settings = this.landingPageSettings.find(setting => setting.key === 'section_1');
return settings && settings.value.current_location === 1 && settings.value.enable_search === 1;
};

const getCategoryNames = (categoryIds) => {
if (!categoryIds || !Array.isArray(categoryIds)) {
return 'Unknown Category';
}
return categoryIds.map(categoryId => getCategoryName(categoryId)).join(', ');
};

/* get category name */
const getCategoryName = (categoryId) => {
const categoryValues = Object.values(categories.value);
const category = categoryValues.find(cat => String(cat.id) === String(categoryId));
return category ? category.name : 'Unknown Category';
};
const getServices = async () => {
try {
navigator.geolocation.getCurrentPosition(async (position) => {
 const currentLatitude = position.coords.latitude;
 const currentLongitude = position.coords.longitude;
 localStorage.setItem('loction_current_lat', currentLatitude);
 localStorage.setItem('loction_current_long', currentLongitude);
 localStorage.setItem('is_location_on', 'on');
 //const response = await fetch(SERVICE_API({ per_page: 'all', latitude: currentLatitude, longitude: currentLongitude }));
 const serviceUrl = `${baseUrl}/service-list?latitude=${currentLatitude}&longitude=${currentLongitude}`;
 window.location.href = serviceUrl;
 //const data = await response.json();
 //console.log(data);
 showofflocation.value = true;
});
closeModal();
} catch (error) {
console.error('Error fetching service list:', error);
}
};

const resetFormData = () => {
// Clear form data
selectedCategory.value = '';
serviceName.value = '';
selectType.value = 'fixed';
price.value = '';
status.value = 'active';
serviceDescription.value = '';
};

const removeCurrentLocation = async () => {
window.location.reload()
const response = await fetch(SERVICE_API({ per_page: 'all'}));
//const data = await response.json();
localStorage.removeItem('loction_current_lat')
localStorage.removeItem('loction_current_long')
localStorage.setItem('is_location_on','off')
closeModal();
};

const serviceList = ref([]);
const keyword = ref('');
const show = ref(true);
const getServiceList = async () => {
try {
 if (keyword.value.trim().length >= 2) {
    const response = await fetch(SERVICE_API({ per_page: "all", status: 1 }));
    const data = await response.json();

    if (data && Array.isArray(data.data)) {
       show.value = false;
       const filteredServices = data.data.filter(service =>
          service.name.toLowerCase().includes(keyword.value.toLowerCase().split(' ')) 
       );

       if (filteredServices.length > 0) {
          show.value = false;
          serviceList.value = filteredServices;
       } else {
         serviceList.value = [];
         show.value = true; 
     }
    } else {
       serviceList.value = [];
       show.value = true;
    }
 }else {
    serviceList.value = [];
    show.value = true;
 }

} catch (error) {
 console.error('Error fetching service list:', error);
}
};


const closeModal = () => {
$('.modal').modal('hide');
};


const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const isLoading = ref(false);
const selectedCategory = ref('');
const serviceName = ref('');
const selectType = ref('fixed'); 
const price = ref('');
const status = ref('active');
const serviceDescription = ref('');
const submitService = async () => {
try {
isLoading.value = true;


const serviceData = {
 provider_id: window.Laravel && window.Laravel.user ? window.Laravel.user.id : null,
 category_id: selectedCategory.value,
 name: serviceName.value,
 description: serviceDescription.value,
 type: selectType.value,
 price: price.value,
 status: status.value.toLowerCase() === 'active' ? 1 : 0,
};
const response = await fetch(POST_SERVICE_API, {
method: 'POST',
headers: {
   'Content-Type': 'application/json',
   'X-CSRF-TOKEN': csrfToken,
},
body: JSON.stringify(serviceData),
});
if (response.ok) {
 isLoading.value = false;
 selectedCategory.value = '';
 serviceName.value = '';
 serviceDescription.value = '';
 price.value = '';
 closeModal();

} else {
console.error('Error posting service:', response.status);
}
} catch (error) {
console.error('Error submitting service:', error);
}
};


const landingPageSettings = ref([]);
const section1Data = ref([]);

onMounted(async () => {
try {
await store.get_landing_page_setting_list({ per_page: 10, page: 1 });
landingPageSettings.value = store.landing_page_setting_list_data.data;
section1Data.value = landingPageSettings.value.filter(item => item.key === 'section_1');
} catch (error) {
console.error('Error fetching landing page settings:', error);
}
});

function getJsonValue(jsonString, key) {
try {
const parsedJson = JSON.parse(jsonString);
return parsedJson[key];
} catch (error) {
console.error('Error parsing JSON:', error);
return null;
}
}

</script>

<style>
.homepage-user-dropdown
{
   position: absolute;
   top: 25%;
}
</style>