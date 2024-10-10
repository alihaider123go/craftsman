<template>
   <div class="service-box-card service-box-container border-0">
      <div class="iq-image position-relative">
         <span v-if="visit_type == 'ONLINE'" class="online-service"></span>
         <a :href="`${baseUrl}/service-detail/${service_id}`"  @click="storeRecentlyViewed" class="">
            <img :src="image ? image : baseUrl+'/images/default.png'" alt="service" class="service-img w-100 object-cover img-fluid" >
            
         </a>
      </div>

      <div class="service-detail-container">
         <!-- profession -->
         <a :href="`${baseUrl}/service-detail/${service_id}`" class="service-heading p-0 line-count-2" @click="storeRecentlyViewed">
           <h5 class="service-heading service-title line-count-2">{{ title }} </h5>
         </a>

         <ul class="price-content">
            <li class="duration-text">
               <span>{{$t('messages.duration')}}</span>
               {{ formattedDuration() }}
            </li>
            <li class="price-text" v-if="price==0">Free</li>
            <li class="price-text" v-else>{{ formatCurrencyVue(price) }}</li>
         </ul>
   
         <!-- name -->
         <div class="d-flex align-items-center service-user-detail">
            <img :src="userImage" alt="service" class="img-fluid object-cover avatar-24 user-avatar">
            <a :href="`${baseUrl}/provider-detail/${provider_id}`">
               <span class="service-user-name">{{ userName }}</span>
            </a>
         </div>
         <!-- rating -->
         <div class="d-flex align-items-center">
            <span class="service-avg-rating">
               {{ reviewNo }}&nbsp;
            </span>
            <span class="rateit-demo bigstars" :data-rateit-value="reviewNo"></span>
            <h6 class="service-reviews">
               <a :href="`${baseUrl}/rating-all?service_id=${service_id}`" class="text-body ms-1" v-if="reviewCount > 1">
                  ({{ reviewCount }} {{$t('messages.reviews')}})
               </a>
               <a :href="`${baseUrl}/rating-all?service_id=${service_id}`" class="text-body ms-1" v-else>
                  ({{ reviewCount }} {{$t('messages.review')}})
               </a>
            </h6>
         </div>

      </div>

   </div>
</template>

<script setup>
import { ref ,onMounted} from 'vue';
import axios from 'axios';
import { SAVE_FAVOURITE_API, DELETE_FAVOURITE_API} from '../data/api';
import Swal from 'sweetalert2';
import { extendWith } from 'lodash';

const props = defineProps({
    image: {type:String ,default:''},
    userImage: {type:String ,default:''},
    userName: {type:String ,default:''},
    reviewNo: {type:Number ,default:0},
    reviewCount: {type:Number ,default:0},
    title: {type:String ,default:''},
    price: {type:Number ,default:0},
    duration: {type:String ,default:''},
    service_id : {type: Number, default: 0},
    provider_id : {type: Number, default: 0},
    user_id : {type: Number, default: 0},
    favourite : {type: Boolean, default: ''},
    visit_type : {type: String, default: ''},
})

const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const saveFavourite = async(values) => {
   values.service_id = props.service_id;
   values.user_id = props.user_id;

   if(props.user_id !== ""){
      try {
         const response = await fetch(SAVE_FAVOURITE_API, {
            method: 'POST',
            headers: {
               'Content-Type': 'application/json',
               'X-CSRF-TOKEN': csrfToken,
            },
            body:JSON.stringify(values),
         });

         if(response.ok) {
            const responseData = await response.json();
            Swal.fire({
            title: 'Done',
            text: responseData.message,
            icon: 'success',
            iconColor: '#5F60B9'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            })
        }
      } catch (error) {
         console.error(error);
      }
   }
   else{
      window.location.href = baseUrl + '/login-page';
   }
};
const deleteFavourite = async(values) => {
   values.service_id = props.service_id;
   values.user_id = props.user_id;
   try {
      const response = await fetch(DELETE_FAVOURITE_API, {
         method: 'POST',
         headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
         },
         body:JSON.stringify(values),
      });

      if(response.ok) {
         const responseData = await response.json();
         Swal.fire({
         title: 'Done',
         text: responseData.message,
         icon: 'success',
         iconColor: '#5F60B9'
         }).then((result) => {
               if (result.isConfirmed) {
                  window.location.reload();
               }
         })
      }
   } catch (error) {
      console.error(error);
   }
};
const redirectToLogin = () => {
   window.location.href = baseUrl + '/login-page';
}

const storeRecentlyViewed = async () => {
   try {
      const response = await axios.post(`${baseUrl}/save-recently-viewed/${props.service_id}`);
      if (response.data.success) {

         return response.data.success;
      } else {

         console.error(response.data.success);
      }
   } catch (error) {
      console.error('Error storing service ID in session for recently viewed', error);
   }
};

const formatCurrencyVue = (value) => {

   if(window.currencyFormat !== undefined) {
   return window.currencyFormat(value)
   }
   return value
}

import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const formattedDuration = () => {
    if (props.duration) {
        const durationParts = props.duration.split(':');
        const hours = parseInt(durationParts[0], 10);
        const minutes = parseInt(durationParts[1], 10);

        if (hours > 0) {
            return `${hours} ${t('landingpage.hrs')} ${minutes} ${t('landingpage.min')}`;
        } else {
            return `${minutes} ${t('landingpage.min')}`;
        }
    } else {
        return ''; // or any default value you want to show if duration is not provided
    }
}
</script>
<style lang="scss">
.line-count-2 {
   overflow: hidden;
   -o-text-overflow: ellipsis;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-box-orient: vertical;
   -webkit-line-clamp: 2;
}

.service-box-card {
   // padding: .875rem  .875rem 1.5rem .875rem;
   padding: 5px;
   background: #FFFFFF;
   box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.06);
   border-radius: 24px;
   margin-bottom: 32px;
   border: none;
   .serv-whishlist {
     position: absolute;
     top: 0.75rem;
     right: 1rem;
     width: 1.625rem;
     height: 1.625rem;
     background: var(--bs-white);
     display: flex;
     align-items: center;
     justify-content: center;
     border-radius: 50%;
     padding: 0;
     outline: none;
     border: none;
   }
   .service-detail-container
   {
     padding: 5px;
   }
   .service-img
   {
     height: 180px !important;
     border-radius: 20px 20px 0px 0px !important;
   }
   .service-rating {
     color: var(--bs-yellow);
   }
   .price-content {
     margin: 12px 0 0 0;
     padding: 0;
     height: 18px;
     li
     {
       display: inline;
       &.duration-text
       {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 700;
         font-size: 14px;
         line-height: 18px;
         float: left;
         color: #202020;
         list-style: none;
         span
         {
           font-family: 'Open Sans';
           font-size: 14px;
           font-weight: 400;
           line-height: 18px;
           // float: left;
         }
       }
       &.price-text
       {
         font-family: 'Open Sans';
         font-style: normal;
         font-weight: 700;
         font-size: 16px;
         line-height: 22px;
         float: right;
         color: #202020;
         list-style: none;
       }
     }
   }
   a.service-heading {
     // display: block;
     // padding-top: .5rem;
     // padding-bottom: 1rem;
     padding-top: 24px !important;
     margin-bottom: 0px !important;
     .service-title {
       // transition: all 0.3s ease-in-out;
       font-family: 'Rubik';
       font-style: normal;
       font-weight: 400;
       font-size: 16px;
       line-height: 19px;
       color: #202020;
       margin-bottom: 0px !important;
     }
     &:hover {
       .service-title {
         color: var(--bs-primary);
       }
     }
   }
   .service-user-detail
   {
     padding: 24px 0 24px 0;
     .user-avatar
     {
       width: 30px;
       height: 30px;
       border-radius: 15px;
       margin-right: 8px;
     }
     .service-user-name {
       font-family: 'Open Sans';
       font-style: normal;
       font-weight: 400;
       font-size: 14px;
       line-height: 19px;
       color: #686868;
     }
   }
   .service-avg-rating
   {
     font-family: 'Rubik';
     font-style: normal;
     font-weight: 900;
     font-size: 16px;
     line-height: 19px;
     color: #202020;
   }
   .rateit-font
   {
     font-size: 16px;
     line-height: 13px;
   }
   // span.bigstars span.rateit-range
   // {
   //   background: url('../vendor/star-rating/empty-rating-star.png');
   // }
   // span.bigstars span.rateit-selected
   // {
   //   background: url('../vendor/star-rating/full-rating-star.png');
   // }
  
   
   .rateit .rateit-selected
   {
     color: #ffcb12;
   }
   .service-reviews
   {
     font-family: 'Open Sans';
     font-style: normal;
     font-weight: 400;
     font-size: 14px;
     line-height: 19px;
     color: #999999;
   }
   .iq-image{
     .online-service{
       display: inline-block;
       background: var(--bs-success);
       height: 8px;
       width: 8px;
       position: absolute;
       top: 22px;
       left: 16px;
       border-radius: 50%;
       animation: blink 0.6s infinite ease-in-out alternate;
       -webkit-animation: blink 0.6s infinite ease-in-out alternate;
     }
   }
}
</style>