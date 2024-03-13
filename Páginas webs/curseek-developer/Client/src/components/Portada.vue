<template>
  <div class="flex flex-col lg:flex-row justify-between items-center p-4 rounded-lg mb-6 w-full mx-auto max-w-screen-xl">
    <img :src="computedImageSrc" :alt="altText" class="w-full lg:w-80 mb-4 lg:mb-0" />

    <div class="lg:ml-4">
      <slot name="title">
        <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-800 mb-4">{{ title }}</h1>
      </slot>
      <slot name="description">
        <p class="text-gray-600 mb-6 mr-2">{{ description }}</p>
      </slot>
      <slot name="course-info">
        <span class="text-sm bg-gray-200 py-2 px-4 font-bold text-indigo-900 rounded-full">{{
          totalCourses.toLocaleString() }} cursos</span>
      </slot>
    </div>
  </div>
</template>
<script setup>
import { computed } from 'vue';
import defaultImage from '../assets/logo-utn.jpg';

const props = defineProps({
  title: {
    type: String,
    default: "Institucion Educativa"
  },
  description: {
    type: String,
    default: "Descripción predeterminada del curso o institución."
  },
  totalCourses: {
    type: Number,
    default: 0
  },
  imageSrc: {
    type: String,
    default: defaultImage
  },
  altText: {
    type: String,
    default: "Institución educativa"
  }
});

const computedImageSrc = computed(() => props.imageSrc);
</script>