<template>
  <div class="p-0 min-h-screen bg-white">
    <!-- Banner -->
    <div :class="{ 'blurred-background': isInputClicked }" class="pt-12">
      <h1 class="text-center text-4xl font-bold pb-4 text-indigo-900">404. Página no encontrada</h1>
      <p class="text-lg text-center mb-4">No encontramos la página que estas buscando, intenta nuevamente:</p>
    </div>
    <!-- Campo de búsqueda -->
    <div class="max-w-xl mx-auto pt-3 p-4">
      <form @submit.prevent="search"
        class="flex p-1 bg-white items-center border rounded-xl overflow-hidden shadow-lg">
        <button type="submit" class="p-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24">
            <path
              d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
          </svg>
        </button>
        <input v-model="query" placeholder="¿Qué quieres aprender?"
          class="rounded-xl p-3 flex-grow outline-none " @focus="setInputClicked(true)"
          @blur="setInputClicked(false)" />
        <button v-if="query" type="button" @click="clearSearch" class="p-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18">
            <path
              d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
          </svg>
        </button>
      </form>
    </div>

    <!-- Resultados -->
    <div class="flex flex-col md:flex-row container mx-auto justify-center">
      <div v-if="courses.length > 0" class="absolute max-w-full mt-1 bg-white shadow-lg max-h-96 overflow-y-auto z-10">
        <p class="px-4 py-2 text-sm text-gray-500 border-b">Los cursos que se relacionan con "{{ query }}"</p>
        <ul>
          <li v-for="course in courses" :key="course._id" class="border-b last:border-b-0">
            <a @click="redirectToCourse(course)" class="flex items-center p-4 hover:bg-gray-100 transition cursor-pointer">
              <img :src="course.image" alt="" class="w-24 h-16 rounded object-cover mr-2">
              <div class="flex-grow">
                <div>
                  <h2 class="text-sm font-semibold hover:underline w-80">{{ course.title || 'Aprende con este curso y descubre oportunidades' }}</h2>
                  <p class="text-xs text-gray-600 pt-1">{{ course.source || 'Curso' }}</p>
                </div>
              </div>
              <div class="flex items-end text-sm font-semibold text-green-700">
                <p>{{ course.price || 'Gratis' }}</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    
    <div class="flex items-center justify-center mt-0 bg-white">
      <img src="../assets/404.png" alt="Error 404" class="object-cover max-w-screen-sm h-auto mt-1" />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();
const query = ref('');
const courses = ref([]);
const isInputClicked = ref(false);
const search = async () => {
  try {
    const response = await axios.get(`http://localhost:3333/cursos/search?q=${query.value}`);
    courses.value = response.data;
  } catch (error) {
    console.error("Error al buscar cursos:", error);
  }
};
const clearSearch = () => {
  query.value = '';
  courses.value = [];
};
const setInputClicked = (clicked) => {
  isInputClicked.value = clicked;
};
const redirectToCourse = (course) => {
  if (course.source === 'UDEMY') {
    // Asegúrate de que 'originalId' sea el ID original del curso de Udemy
    router.push({ name: 'DetalleCursoUdemy', params: { id: course.originalId } });
  } else if (course.source === 'UTN') {
    // Asegúrate de que 'originalId' sea el ID original del curso de UTN
    router.push({ name: 'DetalleCursoUTN', params: { id: course.originalId } });
  }
};
</script>