<template>
  <div class="p-0 min-h-screen bg-white">
    <!-- Buscador -->
    <div class="flex flex-col md:flex-row container mx-auto md:pl-40 pl-0 bg-white pb-12">
      <!-- Contenedor del buscador y resultados -->
      <div class="md:w-1/2 p-8 flex flex-col justify-center">
        <!-- Título -->
        <h1 :class="{ 'blurred-background': isInputClicked }" class="text-left font-semibold text-3xl md:text-4xl text-gray-900 pb-3">
          Encuentra hoy mismo tu próximo curso sin esfuerzo.
        </h1>
        <!-- Campo de búsqueda -->
        <div class="max-w-xl m-0 p-0">
          <form @submit.prevent="search"
            class="flex p-1 bg-white items-center border rounded-xl overflow-hidden shadow-lg">
            <button type="submit" class="p-2">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24">
                <path
                  d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
              </svg>
            </button>
            <input v-model="query" placeholder="Buscar más de 10,000 cursos"
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
        <div class="flex flex-col md:flex-row container mx-0 justify-center">
          <div v-if="isLoading" class="flex justify-center items-center h-64">
            <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-gray-900"></div>
          </div>
          <div v-if="courses.length > 0" class="md:absolute md:max-w-full mt-1 bg-white shadow-lg max-h-96 overflow-y-auto z-10">
            <p class="px-4 py-2 text-sm text-gray-500 border-b">Los cursos que se relacionan con "{{ query }}"</p>
            <ul>
              <li v-for="course in courses" :key="course._id" class="border-b last:border-b-0 pb-2 md:pb-0">
                <a @click="redirectToCourse(course)" class="flex flex-col md:flex-row items-center p-4 hover:bg-gray-100 transition cursor-pointer">
                  <img :src="course.image" alt="" class="w-full h-24 md:w-16 md:h-16 lg:w-20 lg:h-16 xl:w-24 xl:h-16 rounded object-cover md:mr-2">
                  <div class="flex-grow p-2 md:p-0">
                    <div>
                      <h2 class="text-sm font-semibold hover:underline md:w-80">{{ course.title || 'Aprende con este curso y descubre oportunidades' }}</h2>
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

        <!-- Saber más -->
        <div :class="{ 'blurred-background': isInputClicked }" class="border-b border-gray-200 mt-2 pb-8 ml-2">
          <a href="/nosotros/#/preguntasFrecuentes" :class="{ 'blurred-background': isInputClicked }">
            <button class="flex text-sm font-semibold hover:underline hover:bg-indigo-100 transition text-black p-0">
              Ayuda
              <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" fill="#000000">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                  d="M11.5 2C6.81 2 3 5.81 3 10.5S6.81 19 11.5 19h.5v3c4.86-2.34 8-7 8-11.5C20 5.81 16.19 2 11.5 2zm1 14.5h-2v-2h2v2zm0-3.5h-2c0-3.25 3-3 3-5 0-1.1-.9-2-2-2s-2 .9-2 2h-2c0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.5-3 2.75-3 5z" />
              </svg>
            </button>
          </a>
        </div>
        <!-- Botones de búsquedas frecuentes -->
        <div class="mt-4 pr-0 md:pr-20">
          <h2 class="text-lg font-bold p-2">Búsquedas frecuentes</h2>
          <button @click="handleSearch('Java')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Java
          </button>
          <button @click="handleSearch('Desarrollo web')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Desarrollo web
          </button>
          <button @click="handleSearch('Javascript')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Javascript
          </button>
          <button @click="handleSearch('Estilos CSS')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            curso css
          </button>
          <button @click="handleSearch('Curso de php')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Curso de php
          </button>
          <button @click="handleSearch('Administración de empresas')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Administración de empresas
          </button>
          <button @click="handleSearch('React js')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            React js
          </button>
          <button @click="handleSearch('seguridad')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            seguridad
          </button>
          <button @click="handleSearch('bases SQL')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            bases SQL
          </button>
          <button @click="handleSearch('html')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            html
          </button>
          <button @click="handleSearch('física')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            física
          </button>
          <button @click="handleSearch('Tejer')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Tejer
          </button>
          <button @click="handleSearch('Matemática')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Matemática
          </button>
          <button @click="handleSearch('YouTube')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            YouTube
          </button>
          <button @click="handleSearch('meditación')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            meditación
          </button>
          <button @click="handleSearch('Vue 3')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Vue 3
          </button>
          <button @click="handleSearch('Salud')" @focus="setInputClicked(true)" @blur="setInputClicked(false)"
            class="text-sm bg-gray-100 text-gray-800 hover:bg-indigo-200 border border-gray-200 transition py-1 px-2 rounded-full mb-1 mr-1">
            Salud
          </button>
        </div>
      </div>
      <!-- Imagen -->
      <img :class="{ 'blurred-background': isInputClicked }" src="../assets/banner-1-izquierda.jpg"
        alt="" class="md:w-1/2 object-cover md:h-full hidden md:block" />
    </div>
    <!-- El curso que quieras, cuando quieras -->
    <div :class="{ 'blurred-background': isInputClicked }"
      class="block flex-col md:flex-row max-w-screen-full bg-indigo-100">
      <h2 class="text-center font-semibold text-3xl text-indigo-900 py-12">
        El curso que quieras, cuando quieras
      </h2>
      <img src="../assets/banner-curseek-2.png" alt="" class="object-cover md:w-full" />
      
      <!-- Lista de Proveedores y Universidades -->
      <div class="container mx-auto px-20 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
          <!-- Contenido de Proveedores -->
          <div class="text-center sm:border-r border-gray-400 hidden md:block">
            <h3 class="text-2xl font-bold mb-2 pb-4">Proveedores</h3>
            <ul class="list-none text-left">
              <li class="flex items-center justify-center">
                <a href="/cursos/udemy">
                  <button
                    class="hover:scale-110 hover:bg-indigo-200 rounded-lg transform transition duration-100 ease-in-out w-full sm:w-60 flex items-center">
                    <img class="w-12" src="../assets/instituciones/Udemy.png" alt="Udemy">
                    <span class="ml-2 text-lg font-semibold text-black">Udemy</span>
                  </button>
                </a>
              </li>
            </ul>
          </div>
          <!-- Contenido de Universidades -->
          <div class="text-center sm:border-r border-gray-400">
            <h3 class="text-2xl font-bold mb-2 pb-4">Universidades</h3>
            <ul class="list-none text-left">
              <li class="flex items-center justify-center">
                <a href="/cursos/utn">
                  <button
                    class="hover:scale-110 hover:bg-indigo-200 rounded-lg transform transition duration-100 ease-in-out w-full sm:w-60 flex items-center">
                    <img class="w-12" src="../assets/instituciones/utn.png" alt="Universidad Tecnológica Nacional">
                    <span class="ml-2 text-lg font-semibold text-black">UTN</span>
                  </button>
                </a>
              </li>
            </ul>
          </div>
          <!-- Contenido de Futuro -->
          <div class="text-center hidden md:block">
            <h3 class="text-2xl font-bold mb-2 pb-4">Próximamente</h3>
            <ul class="list-none text-left">
              <!-- <li class="flex items-center justify-center">
                <a href="https://www.unam.mx/" target="_blank">
                  <button class="hover:scale-110 hover:bg-indigo-200 rounded-lg transform transition duration-100 ease-in-out w-full sm:w-60 flex items-center">
                    <img class="w-12" src="../assets/instituciones/UNAM.png" alt="Universidad de México UNAM">
                    <span class="ml-2 text-lg font-semibold text-black">UNAM</span>
                  </button>
                </a>
              </li>
              <li class="flex items-center justify-center">
                <a href="https://uchile.cl/" target="_blank">
                  <button class="hover:scale-110 hover:bg-indigo-200 rounded-lg transform transition duration-100 ease-in-out w-full sm:w-60 flex items-center">
                    <img class="w-12" src="../assets/instituciones/Universidad_de_Chile.png" alt="Universidad de Chile">
                    <span class="ml-2 text-lg font-semibold text-black">U. de Chile</span>
                  </button>
                </a>
              </li> -->
              <li class="flex items-center justify-center">
                <a href="https://www.coursera.org" target="_blank">
                  <button
                    class="hover:scale-110 hover:bg-indigo-200 rounded-lg transform transition duration-100 ease-in-out w-full sm:w-60 flex items-center">
                    <img class="w-12" src="../assets/instituciones/coursera.png" alt="Coursera">
                    <span class="ml-2 text-lg font-semibold text-black">Coursera</span>
                  </button>
                </a>
              </li>
              <!-- <li class="flex items-center justify-center">
                <a href="http://www.ucv.ve/" target="_blank">
                  <button class="hover:scale-110 hover:bg-indigo-200 rounded-lg transform transition duration-100 ease-in-out w-full sm:w-60 flex items-center">
                    <img class="w-12" src="../assets/instituciones/Universidad_Central_de_Venezuela.png" alt="Universidad_Central_de_Venezuela">
                    <span class="ml-2 text-lg font-semibold text-black">U. C. Venezuela</span>
                  </button>
                </a>
              </li>
              <li class="flex items-center justify-center">
                <a href="https://www.edx.org/es" target="_blank">
                  <button class="hover:scale-110 hover:bg-indigo-200 rounded-lg transform transition duration-100 ease-in-out w-full sm:w-60 flex items-center">
                    <img class="w-12" src="../assets/instituciones/edX.png" alt="edX">
                    <span class="ml-2 text-lg font-semibold text-black">edX</span>
                  </button>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div :class="{ 'blurred-background': isInputClicked }" class="block flex-col md:flex-row max-w-screen-full bg-gray-100">
      <h2 class="text-center font-semibold text-3xl text-indigo-900 py-12">
        ¡Adéntrate a CurSeek y descubre!
      </h2>
      <div class="flex flex-wrap pb-6 md:px-40">
        <!-- Card 1 -->
        <div
          class="max-w-xs mx-auto bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform ease-in-out hover:scale-105 hover:shadow-xl px-4 py-2 mb-6">
          <svg class="inline mr-2" fill="#6366f1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="63">
            <path
              d="M224.615-120q-26.846 0-45.731-18.884Q160-157.769 160-184.615v-444.846q-17.231-7.154-28.616-23.116Q120-668.538 120-689.231v-86.154q0-26.846 18.884-45.731Q157.769-840 184.615-840h590.77q26.846 0 45.731 18.884Q840-802.231 840-775.385v86.154q0 20.693-11.384 36.654-11.385 15.962-28.616 23.116v444.846q0 26.846-18.884 45.731Q762.231-120 735.385-120h-510.77ZM200-624.615v436.154q0 12.307 8.846 20.384T230.769-160h504.616q10.769 0 17.692-6.923T760-184.615v-440H200Zm-15.385-40h590.77q10.769 0 17.692-6.924Q800-678.462 800-689.231v-86.154q0-10.769-6.923-17.692T775.385-800h-590.77q-10.769 0-17.692 6.923T160-775.385v86.154q0 10.769 6.923 17.692 6.923 6.924 17.692 6.924Zm190.77 219.231h209.23V-480h-209.23v34.616ZM480-392.308Z" />
          </svg>
          <div class="p-4">
            <h3 class="text-lg font-bold mb-4 text-left">Descubrimiento</h3>
            <ul>
              <li class="flex items-center">
                <p class="text-sm ">
                  Explora cursos por destacadas universidades como UTN, U. de Chile, UNAM, y muchas otras.
                </p>
              </li>
            </ul>
          </div>
        </div>
        <!-- Card 2 -->
        <div
          class="max-w-xs mx-auto bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform ease-in-out hover:scale-105 hover:shadow-xl px-4 py-2 mb-6">
          <svg class="inline mr-2" fill="#6366f1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="63">
            <path
              d="M184.615-200Q157-200 138.5-218.5 120-237 120-264.615v-430.77Q120-723 138.5-741.5 157-760 184.615-760h590.77Q803-760 821.5-741.5 840-723 840-695.385v430.77Q840-237 821.5-218.5 803-200 775.385-200h-590.77ZM480-475.384 160-684.615v420q0 10.769 6.923 17.692T184.615-240h590.77q10.769 0 17.692-6.923T800-264.615v-420L480-475.384ZM480-520l307.692-200H172.308L480-520ZM160-684.615V-720v455.385q0 10.769 6.923 17.692T184.615-240H160v-444.615Z" />
          </svg>
          <div class="p-4">
            <h3 class="text-lg font-bold mb-4 text-left">Seguimiento (próximamente)</h3>
            <ul>
              <li class="flex items-center">
                <p class="text-sm ">
                  Utiliza nuestro botón de "Seguir" para asegurarte de no perderte nunca un curso importante en tu
                  trayectoria educativa.
                </p>
              </li>
            </ul>
          </div>
        </div>
        <!-- Card 3 -->
        <div
          class="max-w-xs mx-auto bg-white shadow-lg rounded-lg overflow-hidden transform transition-transform ease-in-out hover:scale-105 hover:shadow-xl px-4 py-2 mb-6">
          <svg class="inline mr-2" fill="#6366f1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="63">
            <path
              d="m480-173.846-30.308-27.385q-97.923-89.461-162-153.153-64.077-63.693-101.154-112.347-37.077-48.654-51.807-88.038Q120-594.154 120-634q0-76.308 51.846-128.154Q223.692-814 300-814q52.769 0 99 27t81 78.538Q514.769-760 561-787t99-27q76.308 0 128.154 51.846Q840-710.308 840-634q0 39.846-14.731 79.231-14.73 39.384-51.807 88.038-37.077 48.654-100.769 112.347Q609-290.692 510.308-201.231L480-173.846ZM480-228q96-86.769 158-148.654 62-61.884 98-107.384t50-80.616q14-35.115 14-69.346 0-60-40-100t-100-40q-47.769 0-88.154 27.269-40.384 27.269-72.307 82.116h-39.078q-32.692-55.616-72.692-82.5Q347.769-774 300-774q-59.231 0-99.615 40Q160-694 160-634q0 34.231 14 69.346 14 35.116 50 80.616t98 107q62 61.5 158 149.038Zm0-273Z" />
          </svg>
          <div class="p-4">
            <h3 class="text-lg font-bold mb-4 text-left">Favoritos</h3>
            <ul>
              <li class="flex items-center">
                <p class="text-sm ">
                  Marca tus cursos favoritos o crea trayectorias personalizadas de aprendizaje utilizando recursos de
                  cualquier parte de la web.
                </p>
              </li>
            </ul>
          </div>
        </div>
        <div class="pt-6 pb-12 px-14 md:px-60">
          <p class="text-center text-md text-gray-700">
            Con nuestra plataforma impulsada por una visión digital avanzada,
            obtén los datos y perspicacia esenciales para destacar en el emocionante
            ámbito de la educación en línea. Descubre, aprende y alcanza tus metas
            académicas con Curseek.
          </p>
          <a href="/signUp"
            class="flex items-center justify-center text-lg font-bold text-indigo-700 hover:text-gray-500 transition duration-100 mt-6">
            <span>Únete ahora!</span>
            <svg class="ml-2" fill="none" stroke="currentColor" width="24" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
      </div>
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
const isLoading = ref(false);

const search = async () => {
  try {
    const response = await axios.get(`http://localhost:3333/cursos/search?q=${query.value}`);
    courses.value = response.data;
  } catch (error) {
    console.error("Error al buscar cursos:", error);
  }finally {
    isLoading.value = false; 
  }
};
const clearSearch = () => {
  query.value = '';
  courses.value = [];
  isLoading.value = false; 

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

const handleSearch = (value) => {
 
  // Establece el contenido del campo de búsqueda al hacer clic en un botón de búsqueda frecuente
  query.value = value;
  search(); // Realiza la búsqueda automáticamente al establecer el contenido del campo

  isLoading.value = true;
   
};


</script>
<style scoped>.blurred-background {
  filter: blur(5px);
  transition: all .3s;
}</style>