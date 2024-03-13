<template>
  <div>
    <div class="flex items-center mb-4">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="22">
        <path
          d="M440-120v-240h80v80h320v80H520v80h-80Zm-320-80v-80h240v80H120Zm160-160v-80H120v-80h160v-80h80v240h-80Zm160-80v-80h400v80H440Zm160-160v-240h80v80h160v80H680v80h-80Zm-480-80v-80h400v80H120Z" />
      </svg>
      <h2 class="font-semibold ml-2 text-sm">Filtrar por</h2>
      <button v-if="selectedCategories.length > 0" @click="clearSelectedCategory"
        class="ml-24 text-sm bg-gray-200 text-blue-700 font-semibold px-2 rounded-full">
        Limpiar todo
      </button>
    </div>
    <div class="md:text-md bg-white rounded-lg md:max-w-md lg:max-w-lg">
      <ul>
        <li v-for="category in categories" :key="category" class="my-1 hover:bg-gray-100 transition p-2">
          <div class="flex items-center">
            <input type="radio" name="categoryFilter" class="hidden" :id="category" v-model="selectedCategories"
              :value="category" />
            <label :for="category" class="flex items-center cursor-pointer w-full pr-40">
              <span class="w-5 h-5 inline-block mr-2 rounded-full border border-gray-400 flex-shrink-0"
                :class="{ 'bg-indigo-500': selectedCategories.includes(category) }"></span>
              {{ capitalize(category) }}
            </label>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
  categories: {
    type: Array,
    default: () => [],
  },
});
const emit = defineEmits(['filter-by-category']);
const selectedCategories = ref([]);
const clearSelectedCategory = () => {
  selectedCategories.value = [];
};
const capitalize = (str) => {
  return str.charAt(0).toUpperCase() + str.slice(1);
};

watch(selectedCategories, (newVal) => {
  emit('filter-by-category', [newVal]);
  console.log('Emitiendo evento con categoría:', newVal);
});
</script>