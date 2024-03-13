<template>
  <div>
    <button @click.stop="toggleFavorite" class="focus:outline-none">
      <span :class="isFavorited ? 'text-3xl text-red-500' : 'text-3xl text-indigo-400'">
        {{ isFavorited ? '♥' : '♡' }}
      </span>
    </button>
    <transition name="slide-up">
      <div v-if="showNotification" class="fixed bottom-0 inset-x-0 z-50">
        <div :class="notificationClass" class="text-white text-center py-3 flex items-center justify-center">
          <svg v-if="notificationType === 'success'" class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <svg v-if="notificationType === 'error'" class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
          {{ notificationMessage }}
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps({
  courseId: String,
  courseType: String,
  isFavorited: {
    type: Boolean,
    default: false
  },
  class: String
});

const showNotification = ref(false);
const notificationMessage = ref('');
const notificationClass = ref('');
const notificationType = ref('');
const triggerNotification = (message, type) => {
  notificationMessage.value = message;
  notificationType.value = type;  // Agregamos el tipo de notificación
  notificationClass.value = type === 'success' ? 'bg-green-700 bg-opacity-75'
    : 'bg-red-700 bg-opacity-75';
  showNotification.value = true;
  setTimeout(() => {
    showNotification.value = false;
  }, 3000);
};

const isFavorited = ref(false);
const toggleFavorite = async () => {
  try {
    const userId = localStorage.getItem('loggedInUserId');
    if (!userId) {
      triggerNotification('Debes iniciar sesión para agregar a favoritos', 'error');
      return;
    }
    const action = isFavorited.value ? 'remove' : 'add';
    const response = await axios.post(`http://localhost:3333/users/favorites/${action}`, {
      userId,
      courseId: props.courseId,
      courseType: props.courseType
    });
    isFavorited.value = !isFavorited.value;
    triggerNotification(`Curso ${action === 'add' ? 'agregado a' : 'eliminado de'} favoritos`, action === 'add' ? 'success' : 'error');
  } catch (error) {
    console.error('Error al actualizar favoritos:', error);
    triggerNotification('No se pudo actualizar la lista de favoritos', 'error');
  }
};
</script>