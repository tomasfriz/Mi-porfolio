<template>
  <transition name="slide-down">
    <div v-if="visible" :class="`fixed bottom-0 inset-x-0 z-50 text-white text-center py-3 ${backgroundColor}`">
      {{ message }}
    </div>
  </transition>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';

const props = defineProps({
  message: String,
  type: String
});

const emits = defineEmits(['close']);
const visible = ref(true);
const backgroundColor = computed(() => {
  return props.type === 'error' ? 'bg-red-700 bg-opacity-75'
    : 'bg-green-700 bg-opacity-75';
});

onMounted(() => {
  // Cerrar automáticamente después de 3000 milisegundos (3 segundos)
  setTimeout(() => {
    close();
  }, 5000);
});

function close() {
  visible.value = false;
  emits('close');
}
</script>
