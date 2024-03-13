<template>
  <div class="md:min-h-screen py-12 flex items-center justify-center bg-gray-100">
    <Notificationes v-if="showNotification" :message="notificationMessage" :type="notificationType"
      @close="showNotification = false" />
    <form class="bg-white rounded shadow-md p-6 w-80" @submit.prevent="login">
      <h2 class="text-xl mb-4 text-center">Iniciar Sesión</h2>
      <div class="mb-6">
        <label for="username" class="block text-md mb-2">Nombre de Usuario</label>
        <input type="text" id="username" v-model="username" placeholder="" required
          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" />
      </div>
      <div class="mb-6">
        <label for="password" class="block text-md mb-2">Contraseña</label>
        <input type="password" id="password" v-model="password" placeholder="" required
          class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" />
      </div>
      <button type="submit"
        class="w-full bg-indigo-600 text-white rounded-md py-2 hover:bg-indigo-800 transition duration-300">
        Ingresar
      </button>
      <p class="mt-4 text-center text-sm">
        ¿Eres Nuevo? <router-link class="text-indigo-500" to="/signUp">Regístrate</router-link>
      </p>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import Notificationes from '../components/Notificaciones.vue'; // Asegúrate de usar la ruta correcta

const router = useRouter();
const username = ref(localStorage.getItem('loggedInUsername') || '');
const password = ref('');
// const userData = ref({});
// const isPasswordShown = ref(false);
const showNotification = ref(false);
const notificationMessage = ref('');
const notificationType = ref('');
const login = async () => {
  try {
    const response = await axios.post('http://localhost:3333/users/login', {
      username: username.value,
      password: password.value,
    });
    if (response.status === 200 && response.data._id) {
      showNotification.value = true;
      notificationMessage.value = 'Inicio de sesión exitoso!';
      notificationType.value = 'success';
      localStorage.setItem('loggedInUsername', username.value);
      localStorage.setItem('loggedInUserId', response.data._id);
      router.push('/profile');
    } else {
      console.error('Error al iniciar sesión: Credenciales incorrectas');
      showNotification.value = true;
      notificationMessage.value = 'Credenciales incorrectas. Por favor, intenta nuevamente.';
      notificationType.value = 'error';
    }
  } catch (error) {
    // Error al iniciar sesión
    showNotification.value = true;
    notificationMessage.value = 'Ocurrió un error al intentar iniciar sesión. Por favor, revisa los datos ingresados';
    notificationType.value = 'error';
    console.error('Error al iniciar sesión:', error);
  }
};
</script>