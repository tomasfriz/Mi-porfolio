<template>
  <div class="text-right">
    <select v-model="selectedFilter" @change="applyFilter"
      class="bg-gray-300 cursor-pointer text-black transition px-2 py-1 rounded-md text-sm font-semibold">
      <option class="bg-white text-black" value="dateDesc">Más Reciente</option>
      <option class="bg-white text-black" value="priceAsc">Menor precio</option>
      <option class="bg-white text-black" value="priceDesc">Mayor precio</option>
    </select>
  </div>
</template>
<script setup>
import { ref } from 'vue';

const selectedFilter = ref("priceAsc");
const emits = defineEmits(["filter-changed"]);
const applyFilter = () => {
  emits('filter-changed', selectedFilter.value);
  console.log("Emite el filtro:", selectedFilter.value);
};
</script>