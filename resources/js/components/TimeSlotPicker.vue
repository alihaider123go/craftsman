<template>
    <div>
        <h1>
            Time slot picker
        </h1>
    </div>
</template>

<script setup>
import { ref, defineProps,computed,onMounted} from 'vue';
import * as yup from 'yup'
import { useField, useForm } from 'vee-validate'
import { GET_HANDYMAN_TIME_SLOT } from '../data/api'; 
import Swal from 'sweetalert2';

// const props = defineProps(['booking_id','customer_id','discount','total_amount','advance_payment_amount']);

onMounted(() => {
    GetProviderHandymanTimeSlot();
    // setFormData(defaultData())
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

// get handyman time slots
const GetProviderHandymanTimeSlot = async(data) => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    
    const res= await fetch(GET_HANDYMAN_TIME_SLOT, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body:JSON.stringify(data),
    });
    if(res.ok)
    {
        const responseData = await res.json();
        if(responseData.message)
        {
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
      }
      else {
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