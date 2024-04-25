// SearchBar.vue

<template>
  <div class="container">
    <!-- <InputIcon class="pi pi-search"> </InputIcon> -->
    <InputText class="input-pesquisar" v-model="value1" placeholder="Pesquisar" />
    <div class="buttons">
      <FiltrosAnimais />
      <ModalCadPet />
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

const value1 = ref('');
const visible = ref(false);

const showPetModal = () => {
  visible.value = true;
};
</script>

<style>
.pi-filter-fill{
  color: #696969;
}
.container {
  display: flex;
  justify-content: space-between;
  max-width: 100vw;
  padding: 1rem;
  height: fit-content;
  gap: 0.5rem;
}

.input-pesquisar{
  height: 2rem;
  width: 75%;
}
.input-pesquisar:enabled:focus {
  outline: 1px solid #ff934b;
}
.buttons {
  display: flex;
  gap: 0.5rem;
  border-radius:10px;
  border:0;
}
.buttonSearchBar {
  background: none;
  color: #373737;
  width: 2rem;
  height: 2rem;
  padding: 0;
  border-radius:10px;
  border:0;
}
</style>
