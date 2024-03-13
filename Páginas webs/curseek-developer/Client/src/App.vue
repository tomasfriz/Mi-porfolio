<template>
  <div>
    <AppHeader />
    <div class="px-0">
      <router-view />
    </div>
    <Footer />
  </div>
</template>

<script setup>
import AppHeader from './components/AppHeader.vue';
import Footer from './components/Footer.vue';
</script>