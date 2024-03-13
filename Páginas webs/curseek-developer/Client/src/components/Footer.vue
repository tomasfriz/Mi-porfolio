<template>
  <footer class="bg-gray-200 text-blak md:pb-40 pb-20 pt-12 px-20 md:px-40">
    <div class="container mx-auto flex flex-col md:flex-row justify-between">
      <div class="block">
        <!-- Logo -->
        <div class="mb-4 md:mb-0 pb-2">
          <a href="/">
            <img src="../assets/logo-curseek.png" alt="CurSeek" class="w-48">
          </a>
          <p class="text-center text-indigo-800">&copy; Copyright 2023</p>
        </div>
      </div>
      <!-- Enlaces de navegación -->
      <div class="flex flex-col md:flex-row">
        <!-- Sección de Ayuda -->
        <div class="mb-4 md:mb-0 md:mr-8">
          <h4 class="text-md font-bold mb-2">Ayuda</h4>
          <ul>
            <li class="text-sm text-gray-700 hover:text-indigo-500 transition pb-1"><a href="/nosotros/#/acerca">Preguntas
                frecuentes</a></li>
            <li class="text-sm text-gray-700 hover:text-indigo-500 transition pb-1"><a href="/nosotros/#/acerca">Soporte
                técnico</a></li>
          </ul>
        </div>
        <!-- Sección de Nosotros -->
        <div class="mb-4 md:mb-0 md:mr-8">
          <h4 class="text-md font-bold mb-2">Nosotros</h4>
          <ul>
            <li class="text-sm text-gray-700 hover:text-indigo-500 transition pb-1"><a href="/nosotros/#/acerca">Sobre
                nosotros</a></li>
            <li class="text-sm text-gray-700 hover:text-indigo-500 transition pb-1"><a href="/nosotros/#/acerca">Nuestro
                equipo</a></li>
          </ul>
        </div>
        <!-- Sección de Términos y Condiciones -->
        <div class="mb-4 md:mb-0 md:mr-8">
          <h4 class="text-md font-bold mb-2">Términos y Condiciones</h4>
          <ul>
            <li class="text-sm text-gray-700 hover:text-indigo-500 transition pb-1"><a href="/nosotros/#/acerca">Política
                de privacidad</a></li>
            <li class="text-sm text-gray-700 hover:text-indigo-500 transition pb-1"><a href="/nosotros/#/acerca">Términos
                y condiciones</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useRouter } from 'vue-router';

const loggedInUsername = ref(localStorage.getItem('loggedInUsername'));
const router = useRouter();

watch(() => router.currentRoute, () => {
  loggedInUsername.value = localStorage.getItem('loggedInUsername');
});

const logout = () => {
  localStorage.removeItem('loggedInUsername');
  loggedInUsername.value = null;
  router.push('/login');
};
</script>