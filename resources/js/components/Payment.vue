<template>
  <div class="booking-list-content">
                <h5 class="mt-5 mb-0 text-capitalize">{{ $t('landingpage.payment_option') }}</h5>
                <div class="mt-0">
                    <form @submit="formSubmit">
                      <input type="hidden" name="_token" :value="csrfToken">
                    
                        <h6 class="mb-2 mt-3 text-capitalize">{{ $t('messages.payment_method') }}</h6>
                        <div class="d-flex align-items-center flex-wrap gap-3">
                          
                            <div class="form-check">

        
                              <input class="form-check-input" type="radio" name="payment_method" v-model="payment_method" id='stripe' value='stripe' :checked="payment_method == 'stripe'"/>

                                <label class="form-check-label h6 fw-normal text-capitalize"
                                  for="stripe">{{$t('messages.stripe')}}</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-inline-flex align-items-center flex-wrap gap-3">
                                <button class="btn btn-primary" type="submit"> <span v-if="IsLoading==1" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <span v-else>{{ $t('landingpage.Proceed_To_Payment') }}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</template>

<script setup>
import { ref, defineProps,computed,onMounted} from 'vue';
import * as yup from 'yup'
import { useField, useForm } from 'vee-validate'
import { GET_PAYMENT_METHOD, GET_STRIPE_PAYMENT_URL} from '../data/api'; 
import Swal from 'sweetalert2';

const props = defineProps(['booking_id','customer_id','discount','total_amount','advance_payment_amount']);

onMounted(() => {
      
  setFormData(defaultData())

})

const IsLoading=ref(0);

const defaultData = () => {
  errorMessages.value = {}
  return {
    payment_method:'stripe',

  
  }
}

const setFormData = (data) => {
  resetForm({
    values: {

      payment_method: data.payment_method,

    }
  })
}

const validationSchema = yup.object({

})

const { handleSubmit, errors, resetForm } = useForm({
  validationSchema
})

const { value: payment_method } = useField('payment_method')

const errorMessages = ref({})

const formSubmit = handleSubmit(async(values) => {

  values.booking_id=props.booking_id;
  values.customer_id=props.customer_id;
  values.discount=props.discount;
  if(props.advance_payment_amount !=null){
    
    values.total_amount=props.advance_payment_amount;
    values.type='advance_payment'

  }else{
    values.total_amount=props.total_amount;
    values.type='full_payment'

  }

  IsLoading.value=1;
  
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  const response = await fetch(GET_PAYMENT_METHOD, {
        method: 'POST',
        headers: {
           'Content-Type': 'application/json',
           'X-CSRF-TOKEN': csrfToken,
        },
        body:JSON.stringify(values),
     });
     if(response.ok){

      IsLoading.value=0;

      const responseData = await response.json();

      if(responseData.payment_geteway_data != null ){

        Openstripepayment(responseData)
 
      }else{

        IsLoading.value=0;

        Swal.fire({
           title: 'Error',
           text: 'check Your Stripe key Integration !',
           icon: 'error',
           iconColor: '#5F60B9'
         }).then((result) => {
 
         })

      }

     } else {

      IsLoading.value=0;

         Swal.fire({
           title: 'Error',
           text: 'Something Went Wrong!',
           icon: 'error',
           iconColor: '#5F60B9'
         }).then((result) => {
 
         })
     }

  })



 const Openstripepayment = async(data) => {

  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
  
  const res= await fetch(GET_STRIPE_PAYMENT_URL, {
           method: 'POST',
           headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken,
           },
           body:JSON.stringify(data),
        });
        if(res.ok){

          const responseData = await res.json();

          if(responseData.message){

               Swal.fire({
                 title:'Error',
                 text: responseData.message,
                 icon: 'error', 
                 iconColor: '#5F60B9'
               }).then((result) => {
       
               })
          }else{
              window.location.href = responseData.url;
          }
   

        }else{

            Swal.fire({
              title: 'Error',
              text: 'Something Went Wrong!',
              icon: 'error',
              iconColor: '#5F60B9'
            }).then((result) => {
    
            })
        }


}
 



</script>
