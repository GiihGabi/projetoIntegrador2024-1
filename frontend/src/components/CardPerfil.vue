<template>
  <div style="display: flex; margin-top: 2rem; margin: auto; padding-top: 2rem;">
    <div>
      <img src="../assets/icons/perfil.svg" style="display: block;margin-top: 1rem;" />
    </div>
    <div style="padding-left: 0.40rem; margin-top: 1.5rem;">
      <p style="text-align: center; ">0</p>
      <p style="text-align: center;">publicações</p>
    </div>
    <div style="margin-top: 1.5rem; padding-left: 0.50rem;">
      <p style="text-align: center; justify-content: right;">0</p>
      <p style="text-align: center;">animais encontrados</p>
    </div>
  </div>
  <div style="display: inline; margin-left: 2rem;margin: auto; padding-top: 1rem;">
    <h2>Fulano da Silva
      <Button icon="pi pi-pencil" class="editar" @click="modalEdicao = true" >
      <!-- <img src="../assets/icons/new_pencil.svg" class="border" /> -->
      </Button> 
    </h2>
    <h3>Telefone: (14) 99999-9999</h3>
    <h3>E-mail: fulano@gmail.com.br</h3>
  </div>
  <div class="card">
    <TabView class="tabview-custom">
      <TabPanel>
        <template #header>
          <div class="flex align-items-center gap-2">
            <img src="../assets/icons/icon_pata.svg" class="icon-ajuste">
            <!-- <span class="font-bold white-space-nowrap"></span> -->
          </div>
        </template>
        <div class="align-image">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">
          <img class="cachorro" src="../assets/images/image_dog.svg" style="height: auto;">
          <img class="cachorro" src="../assets/images/image_golden.svg" style="">

        </div>
      </TabPanel>
      <TabPanel>
        <template #header>
          <div class="flex align-items-center gap-2">
            <img src="../assets/icons/icon_pata_black.svg" class="icon-ajuste">
            <!-- <span class="font-bold white-space-nowrap"></span> -->
          </div>
        </template>
        <div class="align-image">
          <img class="cachorro" src="../assets/images/image_dog.svg">
        </div>
      </TabPanel>
    </TabView>
  </div>
  <div class="card flex justify-content-center">
    <Dialog v-model:visible="modalEdicao" modal header="Edit Profile" :style="{ width: '25rem' }">
      <span class="p-text-secondary block mb-5">Update your information.</span>
      <div class="flex align-items-center gap-3 mb-3">
        <label for="username" class="font-semibold w-6rem">Username</label>
        <InputText id="username" class="flex-auto" autocomplete="off" />
      </div>
      <div class="flex align-items-center gap-3 mb-5">
        <label for="email" class="font-semibold w-6rem">Email</label>
        <InputText id="email" class="flex-auto" autocomplete="off" />
      </div>
      <div class="flex justify-content-end gap-2">
        <Button type="button" label="Cancel" severity="secondary" @click="modalEdicao = false"></Button>
        <Button type="button" label="Save" @click="modalEdicao = false"></Button>
      </div>
    </Dialog>
  </div>
</template>

<script>
import { ref } from "vue";

export default {

  setup() {
    const modalEdicao = ref(false);

    return {
      modalEdicao
    }
  }
}
</script>

<style>
h2 {
  font-weight: bolder;
  text-align: left;
  color: black;
}

.cachorro {
  width: 100%;
}

h3 {
  font-weight: bolder;
  text-align: left;
  margin-left: 5px;
  color: black;
  font-size: 15px;
}


.border {
  height: auto;
  width: 100px;
  margin-right: 0.50rem;
}

.icon-center {
  margin-top: 4rem;
}

.icon-ajuste {
  display: flex;
  justify-content: center;
  margin: auto;

}

.card {
  margin-top: 3rem;
  margin: auto;
  width: 100vw;
  padding-top: 2rem
}

.align-image {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  /* Cria três colunas de largura igual */
  gap: 1px;
  /* Espaço entre as colunas */
}

p {
  font-size: 14px;
}

.p-tabview .p-tabview-ink-bar {
  background-color: orangered;
}

.p-tabview-nav {
  margin: auto !important;
}

.p-tabview-nav-link .p-tabview-header-action {
  display: flex;
  justify-content: center;
  width: 100%;
}

.p-tabview-header {
  width: 100%;
  display: flex;
  justify-content: center;
}

.p-tabview-panels {
  min-height: 50vh;
}
.editar{
  border: 1px solid transparent;
  margin-left: 1rem;
  width: 2rem;
  background-color: transparent;
}
.editar{
  color: black;
}
.p-button:not(:disabled):hover{
  background-color: transparent;
}
</style>