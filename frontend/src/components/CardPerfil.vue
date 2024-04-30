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
<div class="card flex justify-content-center">
      <Dialog v-model:visible="modalEdicao" modal header="Atualize seus dados:" :style="{ width: '25rem' }">
        <div class="flex align-items-center gap-3 mb-3">
          <label for="username" class="font-semibold w-6rem">Nome de Usuario:</label>
          <InputText id="username" class="flex-auto" autocomplete="off" />
        </div>
        <div class="flex align-items-center gap-3 mb-5">
          <label for="email" class="font-semibold w-6rem">Telefone:</label>
          <InputText id="email" class="flex-auto" autocomplete="off" />
        </div>
        <div class="flex align-items-center gap-3 mb-5">
          <label for="email" class="font-semibold w-6rem">E-mail:</label>
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
.p-button {
  background: orangered;
  background-color: transparent;
}
</style>