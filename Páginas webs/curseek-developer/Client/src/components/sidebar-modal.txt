<template>
  <div>
    <div class="flex items-center mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
        <path d="M440-120v-240h80v80h320v80H520v80h-80Zm-320-80v-80h240v80H120Zm160-160v-80H120v-80h160v-80h80v240h-80Zm160-80v-80h400v80H440Zm160-160v-240h80v80h160v80H680v80h-80Zm-480-80v-80h400v80H120Z"/>
      </svg>
      <h2 class="font-bold ml-2">Filtrar por</h2>
    </div>


  <div class="p-6 border-r bg-white border-gray-200 rounded-lg md:max-w-md lg:max-w-lg">
    <ul>
      <li
        v-for="category in categories"
        :key="category"
        class="my-1 hover:bg-gray-100 rounded-lg p-2"
      >
        <div class="flex items-center">
          <input
            type="radio"
            name="categoryFilter"
            class="hidden"
            :id="category"
            v-model="selectedCategories"
            :value="category"
          />
          <label :for="category" class="flex items-center cursor-pointer w-full">
            <span
              class="w-5 h-5 inline-block mr-2 rounded-full border border-gray-400 flex-shrink-0"
              :class="{'bg-blue-500': selectedCategories.includes(category)}"
            ></span>
            {{ category }}
          </label>
        </div>
      </li>
    </ul>
  </div>

</div>
</template>

<script setup>
import { ref, watch } from 'vue';

//
const props = defineProps({
  categories: {
    type: Array,
    default: () => [],
  },
});

const emit = defineEmits(['filter-by-category']); 
const selectedCategories = ref([]);


watch(selectedCategories, (newVal) => {
  // Emitimos el valor como un array para mantener compatibilidad con el código anterior
  emit('filter-by-category', [newVal]);
  console.log('Emitiendo evento con categoría:', newVal);
});
</script>
