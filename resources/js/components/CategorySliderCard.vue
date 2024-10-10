<template>
    <div class="flex-row">            
        <div class="columnee" >
            <div class="par-group-box">
                <div class="top-icon  d-flex justify-content-center align-items-center">
                    <img :src="category_image" :width="category_image_width" :height="category_image_height"/>                    
                </div>
                <a :href="'/category-details/' + category_id" target="_blank">
                    <h2>
                        {{ category_name }}
                    </h2>
                </a>
                <p class="mb-0 category-description readmore-text">
                    {{ category_description }}
                </p>
                <p class="mb-0 category-detail-link">
                    <a :href="'/category-details/' + category_id" target="_blank">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6C12 6.13261 11.9473 6.25979 11.8536 6.35355C11.7598 6.44732 11.6326 6.5 11.5 6.5H6.5V11.5C6.5 11.6326 6.44732 11.7598 6.35355 11.8536C6.25979 11.9473 6.13261 12 6 12C5.86739 12 5.74021 11.9473 5.64645 11.8536C5.55268 11.7598 5.5 11.6326 5.5 11.5V6.5H0.5C0.367392 6.5 0.240215 6.44732 0.146447 6.35355C0.0526785 6.25979 0 6.13261 0 6C0 5.86739 0.0526785 5.74021 0.146447 5.64645C0.240215 5.55268 0.367392 5.5 0.5 5.5H5.5V0.5C5.5 0.367392 5.55268 0.240215 5.64645 0.146447C5.74021 0.0526785 5.86739 0 6 0C6.13261 0 6.25979 0.0526785 6.35355 0.146447C6.44732 0.240215 6.5 0.367392 6.5 0.5V5.5H11.5C11.6326 5.5 11.7598 5.55268 11.8536 5.64645C11.9473 5.74021 12 5.86739 12 6Z" fill="black"/>
                        </svg>
                        <span>
                            En savoir plus
                        </span>
                    </a>
                </p>
            </div>
        </div>
    </div>

 </template>
 
<script setup>

const props = defineProps({
    category_id : {type: Number, default: 0},
    category_name: {type:String ,default:''},
    category_image: {type:String ,default:''},
    category_description: {type:String ,default:''},
    category_image_width: {type:String ,default:''},
    category_image_height: {type:String ,default:''}
})
</script>
<style lang="scss">
    .category-detail-link
    {
        margin-top: 40px;
        a
        {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 17px;
            color: #202020;
            span
            {
                padding-left: 4px;
            }
        }
    }
</style>