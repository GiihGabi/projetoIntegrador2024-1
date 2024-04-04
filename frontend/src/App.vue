<template>
  <main>
    <header>
      <Navbar />
    </header>

    <RouterView />
  </main>
</template>

<script>

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

