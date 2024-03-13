<template>
  <div class="min-h-screen bg-gray-100 flex flex-wrap justify-center items-start md:items-center p-4 gap-4">
    <!-- Notificación -->
    <transition name="slide-down">
      <div v-if="showNotification" class="fixed top-0 inset-x-0 z-50">
        <div :class="{
          'bg-green-700 bg-opacity-75 fixed bottom-0 inset-x-0 z-50': notificationType === 'success',
          'bg-red-700 bg-opacity-75 fixed bottom-0 inset-x-0 z-50': notificationType === 'error'
        }" class="text-white text-center py-3">
          {{ notificationMessage }}
        </div>
      </div>
    </transition>
    <!-- Perfil -->
    <div class="profile-card bg-white p-6 rounded-lg shadow-lg w-full md:w-1/2">
      <h1 class="text-center font-bold text-xl mb-4">Mi Perfil</h1>
      <img :src="userData.profilePicture || 'Mi perfil'" alt=""
        class="w-32 h-32 rounded-full mx-auto mb-4" />
      <!-- Campos editables -->
      <div v-if="editing" class="space-y-4">
        <div class="flex flex-col">
          <label for="username" class="text-sm font-medium text-gray-700 mb-1">Nombre de Usuario</label>
          <span class="flex items-center">
            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24">
              <path d="M480-120q-74.539 0-140.276-28.339-65.737-28.34-114.365-76.922-48.627-48.582-76.993-114.257Q120-405.194 120-479.866q0-74.673 28.339-140.41 28.34-65.737 76.922-114.365 48.582-48.627 114.257-76.993Q405.194-840 479.866-840q74.673 0 140.41 28.35t114.365 76.95q48.627 48.6 76.993 114.3Q840-554.7 840-480v39.539q0 50.538-34.714 85.5Q770.572-320 720-320q-35.769 0-65.231-19.615-29.461-19.615-43.538-52.231Q588.385-359 554.192-339.5 520-320 480-320q-66.846 0-113.423-46.577T320-480q0-66.846 46.577-113.423T480-640q66.846 0 113.423 46.577T640-480v39.539q0 32.923 23.539 56.692Q687.077-360 720-360t56.462-23.769Q800-407.538 800-440.461V-480q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v40H480Zm0-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z"/>
            </svg>
            <input id="username" type="text" v-model="editableUserData.username" class="form-input text-sm mt-1 p-2 rounded-lg block w-full bg-gray-100" placeholder="Nombre de usuario">
          </span>
        </div>
        <!-- Campo de correo electrónico -->
        <div class="flex flex-col">
          <label for="email" class="text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
          <span class="flex items-center">
            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
              <path d="M184.615-200Q157-200 138.5-218.5 120-237 120-264.615v-430.77Q120-723 138.5-741.5 157-760 184.615-760h590.77Q803-760 821.5-741.5 840-723 840-695.385v430.77Q840-237 821.5-218.5 803-200 775.385-200h-590.77ZM480-475.384 160-684.615v420q0 10.769 6.923 17.692T184.615-240h590.77q10.769 0 17.692-6.923T800-264.615v-420L480-475.384ZM480-520l307.692-200H172.308L480-520ZM160-684.615V-720v455.385q0 10.769 6.923 17.692T184.615-240H160v-444.615Z"/>
            </svg>
            <input id="email" type="email" v-model="editableUserData.email" class="form-input text-sm mt-1 p-2 rounded-lg block w-full bg-gray-100" placeholder="Correo Electrónico">
          </span>
        </div>
        <div class="flex flex-col">
          <label for="address" class="text-sm font-medium text-gray-700 mb-1">Dirección</label>
          <span class="flex items-center">
            <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24">
              <path d="M480.136-490.769q26.71 0 45.595-19.021 18.884-19.021 18.884-45.731t-19.02-45.594Q506.574-620 479.864-620t-45.595 19.021q-18.884 19.02-18.884 45.731 0 26.71 19.02 45.594 19.021 18.885 45.731 18.885ZM480-172.923q112.769-98.154 178.308-199.654 65.538-101.5 65.538-175.577 0-109.769-69.5-181.192T480-800.769q-104.846 0-174.346 71.423t-69.5 181.192q0 74.077 65.538 175.577Q367.231-271.077 480-172.923Zm0 53.692Q339-243.923 267.577-351.808q-71.423-107.884-71.423-196.346 0-126.923 82.654-209.385Q361.461-840 480-840t201.192 82.461q82.654 82.462 82.654 209.385 0 88.462-71.423 196.346Q621-243.923 480-119.231Zm0-436.154Z"/>
            </svg>
            <input id="address" type="text" v-model="editableUserData.address" class="form-input text-sm mt-1 p-2 rounded-lg block w-full bg-gray-100" placeholder="Dirección">
          </span>
        </div>
        <div class="flex flex-col">
          <label for="newPassword" class="text-sm font-medium text-gray-700">Nueva Contraseña</label>
          <div class="relative">
            <input :type="isPasswordShown ? 'text' : 'password'" id="newPassword" v-model="newPassword" class="form-input text-sm mt-1 p-2 rounded-lg bg-gray-100 block w-full" placeholder="Nueva Contraseña">
            <button type="button" @click="togglePasswordVisibility" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                <span>{{ isPasswordShown ? '' : '' }}</span>
                <svg v-if="isPasswordShown" class="ml-1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                  <path d="M480.181-353.846q60.973 0 103.473-42.681t42.5-103.654q0-60.973-42.681-103.473t-103.654-42.5q-60.973 0-103.473 42.681t-42.5 103.654q0 60.973 42.681 103.473t103.654 42.5ZM480-392q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm.11 152q-129.956 0-236.879-70.731Q136.307-381.461 83.077-500q53.23-118.539 160.044-189.269Q349.934-760 479.89-760q129.956 0 236.879 70.731Q823.693-618.539 876.923-500q-53.23 118.539-160.044 189.269Q610.066-240 480.11-240ZM480-500Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
                </svg>
                <svg v-else xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                  <path d="M617.846-454.154 586-486q9-52.385-29.692-90.692Q517.615-615 466-606l-31.846-31.846q10.077-4.154 21.038-6.231 10.962-2.077 24.808-2.077 61.154 0 103.654 42.5 42.5 42.5 42.5 103.654 0 13.846-2.077 25.577-2.077 11.731-6.231 20.269Zm126.462 122.923L714-358q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-31.231-31.231q34.846-13.154 70.923-18.962Q443.769-760 480-760q130.231 0 238.231 71.577T876.923-500q-21.461 48.231-54.346 90.654-32.884 42.423-78.269 78.115Zm44.615 216.77L633.231-269.692q-26.539 11.769-65.885 20.731Q528-240 480-240q-131 0-238.231-71.577T83.077-500q23.307-53 61.461-99.269 38.154-46.269 81.462-77.654l-111.539-112 28.308-28.308 674.462 674.462-28.308 28.308ZM254.307-648.615Q219.923-624.154 184-584.308 148.077-544.461 128-500q50 101 143.5 160.5T480-280q34.615 0 69.769-6.731 35.154-6.73 52.846-13.577L537.385-366q-9.462 5.308-26.385 8.731-16.923 3.423-31 3.423-61.154 0-103.654-42.5-42.5-42.5-42.5-103.654 0-13.308 3.423-29.846 3.423-16.539 8.731-27.539l-91.693-91.23ZM541-531Zm-112.539 56.539Z"/>
                </svg>
            </button>
          </div>
        </div>
        <div class="flex flex-col space-y-4">
          <div class="flex gap-2 justify-end">
            <button @click="saveProfile" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-800 transition">Guardar</button>
            <button @click="cancelEdit" class="px-4 py-2 text-gray-700">Cancelar</button>
          </div>
        </div>
      </div>
      <!-- Campos de visualización -->
      <div v-else>
        <div class="md:mx-56">
          <div class="flex flex-col mb-4">
            <span class="flex justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24">
                <path d="M480-120q-74.539 0-140.276-28.339-65.737-28.34-114.365-76.922-48.627-48.582-76.993-114.257Q120-405.194 120-479.866q0-74.673 28.339-140.41 28.34-65.737 76.922-114.365 48.582-48.627 114.257-76.993Q405.194-840 479.866-840q74.673 0 140.41 28.35t114.365 76.95q48.627 48.6 76.993 114.3Q840-554.7 840-480v39.539q0 50.538-34.714 85.5Q770.572-320 720-320q-35.769 0-65.231-19.615-29.461-19.615-43.538-52.231Q588.385-359 554.192-339.5 520-320 480-320q-66.846 0-113.423-46.577T320-480q0-66.846 46.577-113.423T480-640q66.846 0 113.423 46.577T640-480v39.539q0 32.923 23.539 56.692Q687.077-360 720-360t56.462-23.769Q800-407.538 800-440.461V-480q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93h200v40H480Zm0-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Z"/>
              </svg>
              <h2 class="text-xl font-bold mb-2">{{ userData.username }}</h2>
            </span>
          </div>
          <div class="mb-4">
            <div class="flex">
              <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M184.615-200Q157-200 138.5-218.5 120-237 120-264.615v-430.77Q120-723 138.5-741.5 157-760 184.615-760h590.77Q803-760 821.5-741.5 840-723 840-695.385v430.77Q840-237 821.5-218.5 803-200 775.385-200h-590.77ZM480-475.384 160-684.615v420q0 10.769 6.923 17.692T184.615-240h590.77q10.769 0 17.692-6.923T800-264.615v-420L480-475.384ZM480-520l307.692-200H172.308L480-520ZM160-684.615V-720v455.385q0 10.769 6.923 17.692T184.615-240H160v-444.615Z"/>
              </svg>
              <!-- Usa el filtro capitalize -->
              <span class="mb-2">{{ userData.email }}</span>
            </div>
          </div>
          <div class="mb-4">
            <div class="flex">
              <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                <path d="M480.136-490.769q26.71 0 45.595-19.021 18.884-19.021 18.884-45.731t-19.02-45.594Q506.574-620 479.864-620t-45.595 19.021q-18.884 19.02-18.884 45.731 0 26.71 19.02 45.594 19.021 18.885 45.731 18.885ZM480-172.923q112.769-98.154 178.308-199.654 65.538-101.5 65.538-175.577 0-109.769-69.5-181.192T480-800.769q-104.846 0-174.346 71.423t-69.5 181.192q0 74.077 65.538 175.577Q367.231-271.077 480-172.923Zm0 53.692Q339-243.923 267.577-351.808q-71.423-107.884-71.423-196.346 0-126.923 82.654-209.385Q361.461-840 480-840t201.192 82.461q82.654 82.462 82.654 209.385 0 88.462-71.423 196.346Q621-243.923 480-119.231Zm0-436.154Z"/>
              </svg>
              <!-- Usa el filtro capitalize -->
              <span class="mb-2">{{ userData.address }}</span>
            </div>
          </div>
        </div>
        <div class="text-right">
          <button @click="startEdit" class="btn text-sm font-bold text-black rounded-md border border-gray-300 p-2 mr-4">Editar perfil</button>
          <button @click="logout" class="btn text-red-600 font-semibold text-lg mt-2">Logout</button>
        </div>
      </div>
    </div>
    <!-- Cursos favoritos -->
    <div class="profile-card bg-white p-6 rounded-lg shadow-lg w-full md:w-1/2 mx-auto">
      <h2 class="text-2xl font-bold mb-4">Mis Cursos Favoritos</h2>
      <div class="flex flex-col gap-4">
        <!-- Bucle para los cursos favoritos -->
        <div v-for="course in favoriteCourses" :key="course._id"
        class="bg-white hover:shadow-md transition rounded-lg overflow-hidden">
          <div class="flex flex-col md:flex-row cursor-pointer border-gray-100 border">
            <!-- Imagen del curso a la izquierda -->
            <img :src="courseImage(course)" alt="" 
            class="md:w-40 w-full object-contain rounded-t-lg md:rounded-t-none md:rounded-l-lg">
            <!-- Contenido del curso a la derecha -->
            <div class="p-2 flex-grow">
              <h3  @click="() => goToCourseDetail(course)" class="font-semibold text-md  hover:underline">{{ course.title || 'Curso Seleccionado' }}</h3>
              <!-- <p class="text-gray-600 text-sm mb-4">{{ courseDescription(course) || 'En el ámbito actual, al guiar a individuos, equipos y organizaciones a través de procesos de desarrollo del talento humano, se...'}}</p> -->
            </div>
            <button @click="removeFromFavorites(course._id)" title="Eliminar curso"
              class="p-2">
              <svg fill="#FF0000" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" width="24">
                <path d="M304.615-160q-26.846 0-45.731-18.884Q240-197.769 240-224.615V-720h-40v-40h160v-30.77h240V-760h160v40h-40v495.385Q720-197 701.5-178.5 683-160 655.385-160h-350.77ZM680-720H280v495.385q0 10.769 6.923 17.692T304.615-200h350.77q9.23 0 16.923-7.692Q680-215.385 680-224.615V-720ZM392.307-280h40.001v-360h-40.001v360Zm135.385 0h40.001v-360h-40.001v360ZM280-720v520-520Z"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted,computed  } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter();
const userId = ref(localStorage.getItem("loggedInUserId"));
const userData = ref({});
const editableUserData = reactive({}); // Datos editables del usuario
const newPassword = ref(''); // Nueva contraseña
const isPasswordShown = ref(false);
const editing = ref(false);
const favoriteCourses = ref([]);
const showNotification = ref(false);
const notificationMessage = ref('');
const notificationType = ref('');
//ajustes para diferencia de utn y udemy 
const goToCourseDetail = (course) => {
  console.log("Curso actual:", course);
  console.log("Tipo de curso:", course.courseType);
  if (course.courseType === 'UDEMY') {
    router.push({ name: 'DetalleCursoUdemy', params: { id: course._id } });
  } else if (course.courseType === 'UTN') {
    router.push({ name: 'DetalleCursoUTN', params: { id: course._id } });
  } else {
    router.push({ name: 'Home' });
  }
};
const courseImage = (course) => {
  return course.image_480x270 || course.imgUrl;
};
// const courseDescription = (course) => {
//   return course.headline || course.summary;
// };
// Función para alternar la visibilidad de la contraseña
const togglePasswordVisibility = () => {
  isPasswordShown.value = !isPasswordShown.value;
};
// Función para cerrar sesión
const logout = () => {
  localStorage.clear();
  router.push('/login');
};
// Función para obtener el perfil del usuario
const fetchUserProfile = async () => {
  if (!userId.value) {
    console.error("ID de usuario no identificado.");
    return;
  }
  try {
    const response = await axios.get(`http://localhost:3333/users/profile/id/${userId.value}`);
    userData.value = response.data;
    Object.assign(editableUserData, response.data); // Copiar datos del usuario a editableUserData
  } catch (error) {
    console.error("Error al obtener el perfil del usuario:", error);
  }
};
const removeFromFavorites = async (courseId) => {
  try {
    await axios.post('http://localhost:3333/users/favorites/remove', { userId: userId.value, courseId });
    favoriteCourses.value = favoriteCourses.value.filter(course => course._id !== courseId);
  } catch (error) {
    console.error('Error al eliminar curso de favoritos:', error);
  }
};
// Función para cargar cursos favoritos
const loadFavoriteCourses = async () => {
  if (!userId.value) {
    return;
  }
  try {
    const response = await axios.get(`http://localhost:3333/users/favorites/${userId.value}`);
    console.log("Cursos favoritos recibidos:", response.data);
    favoriteCourses.value = response.data;
  } catch (error) {
    console.error("Error al cargar cursos favoritos:", error);
  }
};
const startEdit = () => {
  editing.value = true;
};
const cancelEdit = () => {
  editing.value = false;
  // Reset password field and editable user data
  newPassword.value = '';
  Object.assign(editableUserData, userData.value);
};
// Función para guardar los cambios del perfil
const saveProfile = async () => {
  const updatedData = {
    ...editableUserData,
    password: newPassword.value ? newPassword.value : undefined
  };
  try {
    const response = await axios.put(`http://localhost:3333/users/profile/${userId.value}`, updatedData);
    console.log('Perfil actualizado exitosamente');

    notificationMessage.value = 'Perfil actualizado con éxito.';
    notificationType.value = 'success';
    showNotification.value = true;
    // Ocultar la notificación después de 3 segundos
    setTimeout(() => {
      showNotification.value = false;
    }, 3000);
    editing.value = false;
    newPassword.value = ''; 
  } catch (error) {
    console.error('Error al actualizar perfil:', error);
    // Si deseas, también puedes mostrar una notificación de error
    notificationMessage.value = 'Error al actualizar el perfil. Por favor, intente de nuevo.';
    notificationType.value = 'error';
    showNotification.value = true;
    // Ocultar la notificación después de 3 segundos
    setTimeout(() => {
      showNotification.value = false;
    }, 3000);
  }
};

onMounted(() => {
  fetchUserProfile();
  loadFavoriteCourses();
});
</script>