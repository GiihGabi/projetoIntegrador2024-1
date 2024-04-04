<script setup>
import { RouterView } from 'vue-router'
import NavBar from './components/NavBar.vue'
</script>

<template>
  <main>
    <header>
      <NavBar/>
    </header>

    <RouterView />

  </main>
</template>

<style scoped>

main{
  display: flex;
  flex-direction: column;
}
header {
  
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}



</style>
