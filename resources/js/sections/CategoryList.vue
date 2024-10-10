<template>
    <div ref="categoryList">
        <div class="row">
            <div class="col-12 d-flex justify-content-center flex-wrap">
                <a
                    v-if="categoryDetails.length > 0"
                    v-for="category in categoryDetails"
                    :key="category.id"
                    class="btn btn-outline-primary btn-category custom-category-btn"
                    :href="`${baseUrl}/category-details/${category.id}`"
                >
                    <!-- <span class="d-flex justify-content-between align-items-center"> -->
                        <span>{{ category.name }}</span>
                        <i class="fa fa-arrow-right fa-up-arrow-right-icon"></i>
                    <!-- </span> -->
                </a>
                <CategoryCapsuleShimmer v-else v-for="item in 8" :key="item"></CategoryCapsuleShimmer>
            </div>
        </div>
    </div>
</template>
<script setup>
import {onMounted, ref} from 'vue';
import {CATEGORY_API} from '../data/api';
import {useSection} from '../store/index'
import CategoryCapsuleShimmer from "../shimmer/CategoryCapsuleShimmer.vue";
import CategoryShimmer from "../shimmer/CategoryShimmer.vue";

const store = useSection()
const categoryDetails = ref([]);
const categories = ref([]);

// get all category
const fetchTopCategories = async () => {
    try {
        const response = await fetch(CATEGORY_API({per_page: 'all', status: 1}));
        const data = await response.json();
        if (data && Array.isArray(data.data)) {
            const TotalServices = data.data.filter(user => user.services !== undefined);
            const sortedCategories = TotalServices.sort((a, b) => b.services - a.services);
            //const topCategories = sortedCategories.slice(0, 10);
            categories.value = sortedCategories;
        } else {
            console.error('Invalid data structure or missing array of providers.');
        }
    } catch (error) {
        console.error('Error fetching or processing data:', error);
    }
};

const getCategoryDetails = async () => {
    try {
        await store.get_landing_page_setting_list({per_page: 10, page: 1});
        const settings = store.landing_page_setting_list_data.data.find(setting => setting.key === 'section_2' && setting.status === 1);
        if (settings) {
            const categoryIds = getJsonValue(settings.value, 'category_id');
            await fetchTopCategories();
            const allCategories = categories.value;
            const selectedCategories = allCategories.filter(category => categoryIds.includes(String(category.id)));
            categories.value = selectedCategories.map(category => ({
                id: category.id,
                name: category.name,
            }));
            categoryDetails.value = categories.value;
        }
    } catch (error) {
        console.error('Error fetching category details:', error);
    }
};

const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

onMounted(async () => {
    await fetchTopCategories();
    await getCategoryDetails();
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
.custom-category-btn
{
    font-weight: bold;
    border: none;
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    border-radius: 16px;
    box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.12);
    margin: 10px 16px;
}
</style>