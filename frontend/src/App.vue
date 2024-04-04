<template>
  <main>
    <header>
      <Navbar />
    </header>

    <RouterView />
  </main>
</template>

<script>
import { computed } from 'vue'
import { useStore } from 'vuex'
import Navbar from './components/Navbar.vue'

export default {
  components: {
    Navbar
  },
  setup() {
    const store = useStore()
    const isLoggedIn = computed(() => store.state.auth.isLoggedIn)

    return {
      isLoggedIn
    }
  }
}
</script>

<style scoped>
main {
  display: flex;
  flex-direction: column;
}


.logo {
  display: block;
  margin: 0 auto 2rem;
}
</style>

