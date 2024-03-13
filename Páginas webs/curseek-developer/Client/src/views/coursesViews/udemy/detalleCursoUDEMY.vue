<template>
  <div class="bg-gray-100 p-4 md:p-6 max-w-screen-full">
    <h1 class="hidden md:block text-center pb-6 text-sm text-gray-500">CurSeek cuenta con el apoyo del alumno. Cuando
      compra a través de enlaces en nuestro sitio, podemos ganar una comisión de afiliado.</h1>
    <!-- Grilla Principal -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 max-w-screen-xl mx-auto">
      <!-- Columna 1 y 2 (Contenido principal) -->
      <div class="md:col-span-2">
        <!-- Sección de Título y Precio -->
        <div class="bg-white p-4 md:p-6 rounded mb-4 justify-between items-center border border-gray-200">
          <h2 class="md:text-3xl font-bold text-gray-800">{{ udemyCourse.title || 'Aprende con este Curso de Udemy'}}</h2>
          <!-- <h2 class="md:text-xl font-semibold text-green-500 py-1" v-if="!udemyCourse.is_paid">$ {{ udemyCourse.price }}</h2> -->
        </div>
        <!-- Sección de Descripción Larga -->
        <div class="bg-white p-4 md:p-6 rounded mb-4 border border-gray-200">
          <h3 class="text-xl mb-2 font-bold">Resumen</h3>
          <div v-html="udemyCourse.description" class="700 md:text-md bold-4"></div>
        </div>
        <!-- Sección de Contenido del Curso -->
        <!-- <div class="bg-white p-4 md:p-6 rounded mb-4 border border-gray-200"> -->
        <!-- <h3 class="md:text-lg font-bold text-gray-800 mb-2">Contenido del Curso</h3> -->
        <!-- Itera y muestra el contenido aquí -->
        <!-- </div> -->
        <!-- Sección de Valoraciones -->
        <!-- <div class="bg-white p-4 md:p-6 rounded mb-4 border border-gray-200">
          <h3 class="md:text-lg font-bold text-gray-800 mb-2">Valoraciones</h3>
          <div v-for="review in udemyCourse.reviews" :key="review._id" class="border-b border-gray-300 mb-4 pb-4">
            <div class="flex items-center mb-1"> -->
        <!-- Componente de estrellas aquí -->
        <!-- <rating-component :rating="review.rating"></rating-component>
              <span class="text-gray-600 text-sm ml-2">({{ review.rating }})</span>
            </div>
            <p class="text-gray-800 font-semibold">{{ review.title }}</p>
            <p class="text-gray-600">{{ review.content }}</p>
          </div>
        </div> -->
        <!-- Sección de Categorías -->
        <!-- <div class="bg-white p-4 md:p-6 rounded border border-gray-200">
          <h3 class="md:text-lg font-bold text-gray-800 mb-2">Categorías</h3>
          <div class="text-sm md:text-base font-medium text-gray-900">{{ udemyCourse.primary_category }}</div>
        </div> -->
        <!-- Nueva Sección de Profesor -->
        <div class="bg-white p-4 md:p-6 rounded border border-gray-200">
          <h3 class="text-xl mb-2 font-bold">Profesores</h3>
          <div v-if="udemyCourse.instructorImage || (udemyCourse.instructors && udemyCourse.instructors.length > 0)">
            <div class="flex items-center">
              <img
                :src="udemyCourse.instructorImage || udemyCourse.instructors[0]?.image_100x100 || 'ruta_por_defecto_del_profesor.jpg'"
                alt="" class="rounded-full w-12 mr-4">
              <span>{{ udemyCourse.instructors[0]?.name || 'Profesor' }}</span>
            </div>
          </div>
        </div>
      </div>
      <!-- Columna 3 (Barra Lateral) -->
      <div class="order-first md:order-last bg-white p-4 md:p-6 rounded border border-gray-200">
        <img :src="udemyCourse.image" alt="" class="rounded-sm mb-4 w-full">
        <a :href="`https://www.udemy.com${udemyCourse.url}`" target="_blank"
          class="flex bg-indigo-600 text-white text-center py-2 px-4 rounded hover:bg-indigo-800 transition-colors duration-300 ease-in-out w-full items-center text-md justify-center font-semibold">
          Ir al curso
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24" class="ml-2">
            <path
              d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"
              fill="#fff" />
          </svg>
        </a>
        <div class="px-2 py-6 text-md">
          <ul>
            <!-- Institución -->
            <li class="flex text-sm text-gray-800 p-2 border-b border-gray-100">
              <div class="flex items-center">
                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                  <path
                    d="M400-420h139.231v-40H400v40Zm0-120h278.462v-40H400v40Zm0-120h278.462v-40H400v40Zm-75.385 380Q297-280 278.5-298.5 260-317 260-344.615v-430.77Q260-803 278.5-821.5 297-840 324.615-840h430.77Q783-840 801.5-821.5 820-803 820-775.385v430.77Q820-317 801.5-298.5 783-280 755.385-280h-430.77Zm0-40h430.77q9.231 0 16.923-7.692Q780-335.385 780-344.615v-430.77q0-9.23-7.692-16.923Q764.616-800 755.385-800h-430.77q-9.23 0-16.923 7.692Q300-784.615 300-775.385v430.77q0 9.23 7.692 16.923Q315.385-320 324.615-320Zm-120 160Q177-160 158.5-178.5 140-197 140-224.615v-470.77h40v470.77q0 9.231 7.692 16.923Q195.384-200 204.615-200h470.77v40h-470.77ZM300-800v480-480Z" />
                </svg>
                <a href="/cursos/udemy">
                  <button class="flex hover:underline transition" title="Ir a cursos de Udemy">
                    <span>Udemy</span>
                    <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" fill="#000000">
                      <path d="M0 0h24v24H0V0z" fill="none" />
                      <path
                        d="M11.5 2C6.81 2 3 5.81 3 10.5S6.81 19 11.5 19h.5v3c4.86-2.34 8-7 8-11.5C20 5.81 16.19 2 11.5 2zm1 14.5h-2v-2h2v2zm0-3.5h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2h-2c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z" />
                    </svg>
                  </button>
                </a>
              </div>
            </li>
            <!-- Categoría -->
            <li class="flex text-sm text-black p-2 border-b border-gray-100">
              <div class="flex items-center">
                <svg class="mr-2" fill="#6366f1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                  width="24">
                  <path
                    d="M260-318.462q52.385 0 101.885 12.039 49.5 12.038 98.115 39.192v-392.461q-43.308-30.923-95.462-46.385Q312.385-721.538 260-721.538q-36 0-63.039 4.307-27.038 4.308-60.038 16-9.231 3.077-13.077 8.846-3.846 5.77-3.846 12.693v360.615q0 10.769 7.692 15.769 7.693 5 16.923 1.154 21.923-7.384 50.654-11.846Q224-318.462 260-318.462Zm240 51.231q48.615-27.154 98.115-39.192 49.5-12.039 101.885-12.039 36 0 64.731 4.462 28.731 4.462 50.654 11.846 9.23 3.846 16.923-1.154 7.692-5 7.692-15.769v-360.615q0-6.923-3.846-12.308t-13.077-9.231q-33-11.692-60.038-16Q736-721.538 700-721.538q-52.385 0-104.538 15.461-52.154 15.462-95.462 46.385v392.461Zm-20 58.001q-48.769-33.385-104.769-51.308-56-17.923-115.231-17.923-31.231 0-61.346 5.231Q168.538-268 140-256.461q-21.769 8.692-40.885-5.231Q80-275.615 80-300.153v-386.616q0-14.847 7.807-27.539Q95.615-727 109.692-732q35.231-15.539 73.308-22.539 38.077-7 77-7 58.769 0 114.654 16.923Q430.538-727.693 480-695.385q49.462-32.308 105.346-49.231Q641.231-761.539 700-761.539q38.923 0 77 7T850.308-732q14.077 5 21.885 17.692Q880-701.616 880-686.769v386.616q0 24.538-20.654 37.692-20.653 13.154-43.961 4.461-27.769-10.769-56.731-15.615-28.962-4.846-58.654-4.846-59.231 0-115.231 17.923-56 17.923-104.769 51.308ZM290-499.385Z" />
                </svg>
                <span>{{ udemyCourse.category || 'Development' }}</span>
              </div>
            </li>
            <!-- Duración -->
            <li class="flex text-sm text-black p-2 border-b border-gray-100">
              <div class="flex items-center">
                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                  <path
                    d="m625.846-305.846 28.308-28.308L500-488.326V-680h-40v208.308l165.846 165.846ZM480.134-120q-74.673 0-140.41-28.339-65.737-28.34-114.365-76.922-48.627-48.582-76.993-114.257Q120-405.194 120-479.866q0-74.673 28.339-140.41 28.34-65.737 76.922-114.365 48.582-48.627 114.257-76.993Q405.194-840 479.866-840q74.673 0 140.41 28.339 65.737 28.34 114.365 76.922 48.627 48.582 76.993 114.257Q840-554.806 840-480.134q0 74.673-28.339 140.41-28.34 65.737-76.922 114.365-48.582 48.627-114.257 76.993Q554.806-120 480.134-120ZM480-480Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                </svg>
                <span class="text-sm">{{ udemyCourse.duration || '24 hs' }}</span>
              </div>
            </li>
            <!-- Profesor -->
            <!-- <li class="flex text-sm text-black p-2 border-b border-gray-100">
                <div v-if="udemyCourse.instructorImage || (udemyCourse.instructors && udemyCourse.instructors.length > 0)">
                  <div class="flex items-center">
                    <img :src="udemyCourse.instructorImage || udemyCourse.instructors[0]?.image_100x100 || 'ruta_por_defecto_del_profesor.jpg'" alt="Imagen del Profesor" class="rounded-full w-6 mr-2">
                    <span>{{ udemyCourse.instructors[0]?.name || 'Nombre del Profesor' }}</span>
                  </div>
                </div>
              </li> -->
            <!-- Precio -->
            <li class="flex text-sm text-black p-3">
              <svg class="mr-2" fill="#057500" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                width="24">
                <path
                  d="M542.308-131.692q-11.529 11.461-28.573 11.461-17.043 0-28.504-11.461l-352-352q-6.385-6.385-9.808-14.02T120-514v-286q0-16.077 11.961-28.039Q143.923-840 160-840h286q7.769 0 15.452 3.166 7.683 3.167 13.317 8.526l352 352.231Q839-463.846 839.385-446.5q.384 17.346-11.077 28.808l-286 286ZM259.91-660q16.629 0 28.359-11.64Q300-683.281 300-699.909q0-16.63-11.64-28.36Q276.72-740 260.09-740q-16.629 0-28.359 11.64Q220-716.719 220-700.091q0 16.63 11.64 28.36Q243.28-660 259.91-660Z" />
              </svg>
              <span class="text-sm">{{ udemyCourse.price || 'Gratis' }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';

const udemyCourse = ref({
  title: '',
  price: '',
  description: '',
  instructors: [],
  rating: '',
  students: '',
  image: '',
  url: '',
  reviews: [],
  primary_category: '',
  secondary_category: '',
  instructorImage: '',
  category: '',
});
const route = useRoute();
const categories = ref([]);

async function fetchUdemyCourse(courseId) {
  try {
    const response = await axios.get(`http://localhost:3333/cursos/udemy/${courseId}`);
    udemyCourse.value = { ...udemyCourse.value, ...response.data };
    udemyCourse.value.image = udemyCourse.value.image_480x270;
  } catch (error) {
    console.error("Error obteniendo el detalle del curso de Udemy:", error);
  }
}
const loadCategories = async () => {
  try {
    const { data } = await axios.get("categorias/udemy");
    categories.value = data;
  } catch (error) {
    console.error("Error al obtener las categorías de Udemy:", error);
  }
};

onMounted(() => {
  console.log('Curso ID:', route.params.id);
  udemyCourse.value.instructorImage = route.params.instructorImage || '';
  udemyCourse.value.category = route.params.category || '';
  fetchUdemyCourse(route.params.id);
  loadCategories();
});
</script>