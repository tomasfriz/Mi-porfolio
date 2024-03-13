<template>
  <div class="flex flex-col max-w-screen-full md:flex-row mx-auto md:px-60 bg-gray-100 p-6">

    <form
      class="bg-white px-6 md:px-16 py-8 max-w-screen-sm w-full"
      @submit.prevent="registerUser"
    >
        <!-- Mensaje de éxito -->
  <p v-if="registrationSuccess" class="text-sm text-green-500">
    Registro exitoso. Redirigiendo al login...
  </p>

  <!-- Mensaje de error -->
  <p v-if="registrationError" class="text-sm text-red-500">
    Error en el registro: {{ registrationErrorMessage }}
  </p>
      <h1 class="text-xl font-bold mb-4 text-center">Crea tu cuenta</h1>
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium text-gray-600">Nombre de Usuario</label>
        <input type="text" id="username" v-model="username" class="mt-1 p-2 w-full border rounded-md" required />
      </div>
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
        <input type="email" id="email" v-model="email" class="mt-1 p-2 w-full border rounded-md" required />
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-600">Contraseña</label>
        <input type="password" id="password" v-model="password" class="mt-1 p-2 w-full border rounded-md" required />
      </div>
      <div class="mb-4">
        <label for="confirmPassword" class="block text-sm font-medium text-gray-600">Confirmar Contraseña</label>
        <input type="password" id="confirmPassword" v-model="confirmPassword" class="mt-1 p-2 w-full border rounded-md"
          required />
        <p v-if="passwordsDoNotMatch" class="text-sm text-red-500 mt-1">
          Las contraseñas no coinciden.
        </p>
      </div>
      <div class="mb-4">
        <label for="address" class="block text-sm font-medium text-gray-600">Dirección</label>
        <textarea id="address" v-model="address" class="mt-1 p-2 w-full border rounded-md h-24"></textarea>
      </div>
      <div class="mb-4">
        <label for="profilePicture" class="block text-sm font-medium text-gray-600">Link URL de Imagen</label>
        <input type="text" id="profilePicture" v-model="profilePicture" class="mt-1 p-2 w-full border rounded-md" />
      </div>
      <button type="submit" class="w-full bg-indigo-600 text-white p-2 rounded hover:bg-indigo-800">
        Registrarse
      </button>
    </form>
    <div class="border-l border-gray-200 px-8 pt-4 pb-12 md:py-40 bg-white text-left">
      <h1 class="font-bold pb-2 text-lg">Únete a CurSeek! Gratis</h1>
      <ul>
        <li class="text-sm pt-4">
          <svg class="inline mr-2" fill="#6366f1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
            width="24">
            <path
              d="M224.615-120q-26.846 0-45.731-18.884Q160-157.769 160-184.615v-444.846q-17.231-7.154-28.616-23.116Q120-668.538 120-689.231v-86.154q0-26.846 18.884-45.731Q157.769-840 184.615-840h590.77q26.846 0 45.731 18.884Q840-802.231 840-775.385v86.154q0 20.693-11.384 36.654-11.385 15.962-28.616 23.116v444.846q0 26.846-18.884 45.731Q762.231-120 735.385-120h-510.77ZM200-624.615v436.154q0 12.307 8.846 20.384T230.769-160h504.616q10.769 0 17.692-6.923T760-184.615v-440H200Zm-15.385-40h590.77q10.769 0 17.692-6.924Q800-678.462 800-689.231v-86.154q0-10.769-6.923-17.692T775.385-800h-590.77q-10.769 0-17.692 6.923T160-775.385v86.154q0 10.769 6.923 17.692 6.923 6.924 17.692 6.924Zm190.77 219.231h209.23V-480h-209.23v34.616ZM480-392.308Z" />
          </svg>
          <b> Descubre 10,000 cursos </b> de las principales universidades como UTN, U. de Chile, UNAM y muchas más.
        </li>
        <li class="text-sm pt-4">
          <svg class="inline mr-2" fill="#6366f1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
            width="24">
            <path
              d="M184.615-200Q157-200 138.5-218.5 120-237 120-264.615v-430.77Q120-723 138.5-741.5 157-760 184.615-760h590.77Q803-760 821.5-741.5 840-723 840-695.385v430.77Q840-237 821.5-218.5 803-200 775.385-200h-590.77ZM480-475.384 160-684.615v420q0 10.769 6.923 17.692T184.615-240h590.77q10.769 0 17.692-6.923T800-264.615v-420L480-475.384ZM480-520l307.692-200H172.308L480-520ZM160-684.615V-720v455.385q0 10.769 6.923 17.692T184.615-240H160v-444.615Z" />
          </svg>
          <b> Nunca te pierdas un curso </b> con nuestro botón de Seguir para la educación.
        </li>
        <li class="text-sm pt-4">
          <svg class="inline mr-2" fill="#6366f1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
            width="24">
            <path
              d="m480-173.846-30.308-27.385q-97.923-89.461-162-153.153-64.077-63.693-101.154-112.347-37.077-48.654-51.807-88.038Q120-594.154 120-634q0-76.308 51.846-128.154Q223.692-814 300-814q52.769 0 99 27t81 78.538Q514.769-760 561-787t99-27q76.308 0 128.154 51.846Q840-710.308 840-634q0 39.846-14.731 79.231-14.73 39.384-51.807 88.038-37.077 48.654-100.769 112.347Q609-290.692 510.308-201.231L480-173.846ZM480-228q96-86.769 158-148.654 62-61.884 98-107.384t50-80.616q14-35.115 14-69.346 0-60-40-100t-100-40q-47.769 0-88.154 27.269-40.384 27.269-72.307 82.116h-39.078q-32.692-55.616-72.692-82.5Q347.769-774 300-774q-59.231 0-99.615 40Q160-694 160-634q0 34.231 14 69.346 14 35.116 50 80.616t98 107q62 61.5 158 149.038Zm0-273Z" />
          </svg>
          <b> Marca cursos </b> o crea trayectorias de aprendizaje desde cualquier recurso en la web.
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const username = ref("");
const email = ref("");
const password = ref("");
const confirmPassword = ref("");
const address = ref("");
const profilePicture = ref("");
const passwordsDoNotMatch = ref(false);
const registrationSuccess = ref(false);
const registrationError = ref(false);
const registrationErrorMessage = ref("");

const registerUser = async () => {
  if (password.value !== confirmPassword.value) {
    passwordsDoNotMatch.value = true;
    return;
  }
  passwordsDoNotMatch.value = false;
  try {
    await axios.post("http://localhost:3333/users/register", {
      username: username.value,
      email: email.value,
      password: password.value,
      address: address.value,
      profilePicture: profilePicture.value,
    });

    registrationSuccess.value = true;
    setTimeout(() => router.push("/login"), 2000); 
    } catch (error) {
    registrationError.value = true;
    registrationErrorMessage.value = error.response.data.message || "Error desconocido";
    console.error("Error al registrar el usuario:", error);
  }
};

</script>