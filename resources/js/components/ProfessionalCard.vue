<template>
    <div class="professional-box-card border-0">

        <!-- name -->
        <div class="professional-avatar-section">
            <img :src="userImage" alt="professional-avatar" class="professional-avatar object-cover" />
        </div>

        <div class="professional-user-name-section">
            <a :href="`${baseUrl}/provider-detail/${provider_id}`" class="professional-user-name">
                {{ providerName }}
            </a>
        </div>
        
        <div class="professional-category-section line-count-2">
            <a href="#" class="professional-category">
                {{ title }}
            </a>    
        </div>

        <div class="view-all-services-button-section">
            <button class="view-all-services-button">
                <a :href="`${baseUrl}/provider-detail/${provider_id}`" class="professional-user-name">
                    <span>
                        Voir les services
                    </span>
                </a>
            </button>
        </div>

        <!-- rating -->
        <div class="d-flex justify-content-center align-items-center professional-rating-section">
            <span class="professional-avg-rating">
                {{ reviewNo }}&nbsp;
            </span>
            <rating-component :readonly="true" :showrating="false" :ratingvalue="reviewNo" />
            <h6 class="professional-reviews">
                <a href="#" class="text-body ms-1" v-if="reviewCount > 1">
                    ({{ reviewCount }} {{$t('messages.reviews')}})
                </a>
                <a href="#" class="text-body ms-1" v-else>
                    ({{ reviewCount }} {{$t('messages.review')}})
                </a>
            </h6>
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
    //  image: {type:String ,default:''},
    //  userImage: {type:String ,default:''},
    //  providerName: {type:String ,default:''},
    //  reviewNo: {type:Number ,default:0},
    //  reviewCount: {type:Number ,default:0},
    //  title: {type:String ,default:''},
    //  price: {type:Number ,default:0},
    //  duration: {type:String ,default:''},
    //  service_id : {type: Number, default: 0},
     
    //  user_id : {type: Number, default: 0},
    //  favourite : {type: Boolean, default: ''},
    //  visit_type : {type: String, default: ''},

    provider_id : {type: Number, default: 0},
    userImage: {type:String ,default:''},
    providerName: {type:String ,default:''},
    reviewNo: {type:Number ,default:0},
    reviewCount: {type:Number ,default:0},
    title: {type:String ,default:''},
 })
 
 const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
 const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
//  const saveFavourite = async(values) => {
//     values.service_id = props.service_id;
//     values.user_id = props.user_id;
 
//     if(props.user_id !== ""){
//        try {
//           const response = await fetch(SAVE_FAVOURITE_API, {
//              method: 'POST',
//              headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': csrfToken,
//              },
//              body:JSON.stringify(values),
//           });
 
//           if(response.ok) {
//              const responseData = await response.json();
//              Swal.fire({
//              title: 'Done',
//              text: responseData.message,
//              icon: 'success',
//              iconColor: '#5F60B9'
//              }).then((result) => {
//                  if (result.isConfirmed) {
//                      window.location.reload();
//                  }
//              })
//          }
//        } catch (error) {
//           console.error(error);
//        }
//     }
//     else{
//        window.location.href = baseUrl + '/login-page';
//     }
//  };
//  const deleteFavourite = async(values) => {
//     values.service_id = props.service_id;
//     values.user_id = props.user_id;
//     try {
//        const response = await fetch(DELETE_FAVOURITE_API, {
//           method: 'POST',
//           headers: {
//              'Content-Type': 'application/json',
//              'X-CSRF-TOKEN': csrfToken,
//           },
//           body:JSON.stringify(values),
//        });
 
//        if(response.ok) {
//           const responseData = await response.json();
//           Swal.fire({
//           title: 'Done',
//           text: responseData.message,
//           icon: 'success',
//           iconColor: '#5F60B9'
//           }).then((result) => {
//                 if (result.isConfirmed) {
//                    window.location.reload();
//                 }
//           })
//        }
//     } catch (error) {
//        console.error(error);
//     }
//  };
//  const redirectToLogin = () => {
//     window.location.href = baseUrl + '/login-page';
//  }
 
//  const storeRecentlyViewed = async () => {
//     try {
//        const response = await axios.post(`${baseUrl}/save-recently-viewed/${props.service_id}`);
//        if (response.data.success) {
 
//           return response.data.success;
//        } else {
 
//           console.error(response.data.success);
//        }
//     } catch (error) {
//        console.error('Error storing service ID in session for recently viewed', error);
//     }
//  };
 
//  const formatCurrencyVue = (value) => {
 
//     if(window.currencyFormat !== undefined) {
//     return window.currencyFormat(value)
//     }
//     return value
//  }
 
 import { useI18n } from 'vue-i18n';
 
 const { t } = useI18n();
 
//  const formattedDuration = () => {
//      if (props.duration) {
//          const durationParts = props.duration.split(':');
//          const hours = parseInt(durationParts[0], 10);
//          const minutes = parseInt(durationParts[1], 10);
 
//          if (hours > 0) {
//              return `${hours} ${t('landingpage.hrs')} ${minutes} ${t('landingpage.min')}`;
//          } else {
//              return `${minutes} ${t('landingpage.min')}`;
//          }
//      } else {
//          return ''; // or any default value you want to show if duration is not provided
//      }
//  }
 </script>
 <style lang="scss">
 .professional-box-card {
    padding: 30px 20px 15px 20px;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.06);
    border-radius: 24px;
    margin: 24px 16px 0px 16px;
    text-align: center;
    .professional-avatar-section
    {
        margin-bottom: 10px;
        .professional-avatar
        {
            width: 70px;
            height: 70px;
            border: 4px solid #FFFFFF;
            border-radius: 24px;
        }
    }
    .professional-user-name-section
    {
        margin-bottom: 10px;
        line-height: 21px;
        .professional-user-name
        {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 21px;
            color: #000000;
        }
    }
    .professional-category-section
    {
        margin-bottom: 15px;
        height: 40px;
        line-height: 19px;
        .professional-category
        {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 19px;
            text-align: center;
            color: #000000;
        }
    }
    .view-all-services-button-section
    {
        .view-all-services-button
        {
            width: 100%;
            background: rgba(238, 238, 238, 0.47);
            border-radius: 12px;
            border: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
            padding: 10px 35px;
            span
            {
                font-family: 'Rubik';
                font-style: normal;
                font-weight: 700;
                font-size: 14px;
                line-height: 17px;
                color: #202020;
            }
        }
    }

    
    .service-rating {
      color: var(--bs-yellow);
    }
    .professional-rating-section
    {
        line-height: 12px;
    }
    .professional-avg-rating
    {
      font-family: 'Rubik';
      font-style: normal;
      font-weight: 900;
      font-size: 16px;
      line-height: 19px;
      color: #202020;
    }
    .professional-reviews
    {
      font-family: 'Open Sans';
      font-style: normal;
      font-weight: 400;
      font-size: 14px;
      line-height: 19px;
      color: #999999;
    }
 }
 </style>