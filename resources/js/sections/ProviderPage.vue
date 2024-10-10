<template>
    <section ref="providersection" class=" py-4">

        <div class="row">
            <div class="col-md-12">
                <div class="providers-main-wrapper">
                    <div class="filters-container">
                        <div class="providers-search" id="providers-search-container">
                            <svg width="51" height="50" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.755001" width="50" height="50" rx="25" fill="#EB5353"/>
                                <path d="M35.5459 33.2041L31.0938 28.75C32.4287 27.0104 33.0519 24.8282 32.837 22.6461C32.6222 20.4639 31.5853 18.4452 29.9367 16.9994C28.2882 15.5536 26.1514 14.789 23.9598 14.8607C21.7683 14.9324 19.6861 15.8351 18.1356 17.3856C16.5851 18.9361 15.6824 21.0183 15.6107 23.2098C15.539 25.4014 16.3036 27.5382 17.7494 29.1867C19.1952 30.8353 21.2139 31.8722 23.3961 32.087C25.5782 32.3019 27.7604 31.6787 29.5 30.3437L33.9559 34.8006C34.0606 34.9053 34.1848 34.9883 34.3215 35.0449C34.4583 35.1015 34.6048 35.1307 34.7528 35.1307C34.9008 35.1307 35.0474 35.1015 35.1841 35.0449C35.3208 34.9883 35.445 34.9053 35.5497 34.8006C35.6543 34.696 35.7373 34.5717 35.794 34.435C35.8506 34.2983 35.8798 34.1517 35.8798 34.0037C35.8798 33.8557 35.8506 33.7092 35.794 33.5725C35.7373 33.4357 35.6543 33.3115 35.5497 33.2069L35.5459 33.2041ZM17.875 23.5C17.875 22.2391 18.2489 21.0066 18.9494 19.9582C19.6499 18.9099 20.6455 18.0928 21.8104 17.6103C22.9753 17.1278 24.2571 17.0015 25.4937 17.2475C26.7303 17.4935 27.8662 18.1006 28.7578 18.9922C29.6494 19.8837 30.2565 21.0197 30.5025 22.2563C30.7485 23.4929 30.6222 24.7747 30.1397 25.9396C29.6572 27.1045 28.8401 28.1001 27.7918 28.8006C26.7434 29.5011 25.5109 29.875 24.25 29.875C22.5598 29.8733 20.9393 29.201 19.7441 28.0059C18.5489 26.8107 17.8767 25.1902 17.875 23.5Z" fill="white"/>
                            </svg>
                            <div class="input-group flex-nowrap search-box-label">
                                <label class="input-group-text">
                                    Search for a provider : 
                                </label>
                                <input type="text" class="form-control custom-search-field rounded-3" v-model="search" placeholder="By name" :disabled="isEmpty" @focus="addFocusClass()" @blur="removeFocusClass()">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="float-end">
                    <div class="search-form input-group flex-nowrap align-items-center">
                        <input type="search" class="form-control rounded-3 bg-transparent shadow" name="search" v-model="search" placeholder="Search...">
                        <span class="input-group-text search-icon position-absolute text-body">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle><path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="table-responsive rounded">
            <table id="datatable" ref="tableRef" class="table custom-card-table"></table>
        </div>
    </section>

</template>
<script setup>
import ProviderCard from '../components/ProviderCard.vue';
import ProviderShimmer  from '../shimmer/ProviderShimmer.vue';
import { computed, ref, watch} from 'vue';
import {useSection} from '../store/index'
import {useObserveSection} from '../hooks/Observer'
import useDataTable from '../hooks/Datatable'

const props = defineProps(['link']);

const search = ref('')
watch(() => search.value, () => ajaxReload())

const ajaxReload = () => window.$(tableRef.value).DataTable().ajax.reload(null, false)

const columns = ref([
  { data: 'name', title: '', orderable: false, }
]);

const tableRef = ref(null);

useDataTable({
  tableRef: tableRef,
  columns: columns.value,
  url: props.link,
  dom: '<"row align-items-center"><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" l><"col-md-12 mt-md-0 mt-3" p>><"clear">',
  advanceFilter: () => {
    return {
        search: search.value,
    }
  }
});

const store = useSection()
const provider_data = computed(() => store.provider_list_data)
const [providersection] = useObserveSection(() => store.get_provider_list({ per_page: 'all', user_type: 'provider' }))

const addFocusClass = () => {
    var element = document.getElementById("providers-search-container");
    element.classList.add("focused");
};
const removeFocusClass = () => {
    var element = document.getElementById("providers-search-container");
    element.classList.remove("focused");
};


</script>
<style>
.providers-main-wrapper
{
  padding-top: 40px;
  padding-bottom: 40px;
}
.filters-container
{
  max-width: 750px;
  margin: auto;
}
.search-box-label label
{
  font-family: 'Open Sans';
  font-size: 16px;
  font-weight: 600;
  line-height: 21.79px;
  text-align: left;
  background-color: transparent;
  color: #000000;
  padding-right: 4px;
}
.providers-search
{
  max-width: 550px;
  height: 60px;
  padding: 4px;
  background: #FFFFFF;
  border: 1px solid #E5E5E5;
  border-radius: 40px;
  display: flex;
  margin: auto;
}
.providers-search input[type="text"]
{
  border: transparent;
  flex-grow: 1;
  width: 85%;
  margin: 0 15px;
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 22px;
  color: #686868;
  background: transparent;
  padding-left: 0px;
}
.focused
{
  border: 1px solid #000 !important;
  box-shadow: 5px 5px 20px rgba(0,0,0,0.2) !important;
}
</style>