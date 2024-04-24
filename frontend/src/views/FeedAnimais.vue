<template>
  <section id="feedAnimais">
    <div id="main-feedAnimais">
      <!-- <FiltrosAnimais /> -->
      <SearchBar />
      <CardsAnimais />
    </div>
  </section>
</template>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');
#feedAnimais {
  font-family: 'Roboto Flex', sans-serif;
}

.sub-titulo-feedAnimais {
  font-size: 16px;
  font-weight: 700;
  font-size: 20px;
  color: #696969;
}
#main-feedAnimais {
  display: flex;
  flex-direction: column;
  /* justify-content: space-between; */
  gap: 2rem;
  height: 100vh;
}
</style>
