<template>
  <div class="flex flex-wrap justify-center my-5 space-x-2">
    <button @click="prevPage" :disabled="currentPage <= 1" class="p-2 border rounded-lg bg-gray-200">
      Anterior
    </button>
    <span v-if="currentPage > 3" class="mx-1 hidden lg:inline">...</span>
    <div v-for="page in displayedPages" :key="page" class="mx-1">
      <button @click="changePage(page)" :class="page === currentPage
        ? 'text-white bg-indigo-600'
        : 'text-black bg-gray-200'
        " class="px-4 py-2 border rounded-lg">
        {{ page }}
      </button>
    </div>
    <span v-if="currentPage < totalPages - 2" class="mx-1 hidden lg:inline">...</span>
    <button @click="changePage(totalPages)" :class="currentPage === totalPages
      ? 'text-white bg-indigo-600'
      : 'text-black hover:bg-gray-500 bg-gray-400'
      " class="mx-1 px-4 py-2 border rounded-lg">
      {{ totalPages }}
    </button>
    <button @click="nextPage" :disabled="currentPage >= totalPages" class="p-2 border rounded-lg bg-gray-200">
      Siguiente
    </button>
  </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
  currentPage: {
    type: Number,
    required: true,
  },
  totalPages: {
    type: Number,
    required: true,
  },
});
const emit = defineEmits(['changePage']);

const startPage = computed(() => {
  if (props.currentPage <= 3) return 1;
  if (props.currentPage > props.totalPages - 2) return props.totalPages - 4;
  return props.currentPage - 2;
});

const endPage = computed(() => {
  if (props.currentPage <= 3) return 2;
  if (props.currentPage > props.totalPages - 2) return props.totalPages;
  return props.currentPage + 2;
});

const displayedPages = computed(() => {
  let pages = [];
  for (let i = startPage.value; i <= endPage.value; i++) {
    pages.push(i);
  }
  return pages;
});

const changePage = (page) => {
  emit("changePage", page);
};

const nextPage = () => {
  if (props.currentPage < props.totalPages) {
    emit("changePage", props.currentPage + 1);
  }
};

const prevPage = () => {
  if (props.currentPage > 1) {
    emit("changePage", props.currentPage - 1);
  }
};
</script>