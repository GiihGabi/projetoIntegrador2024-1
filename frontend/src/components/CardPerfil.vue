<template>
  <div style="display: flex; margin-top: 2rem;">
    <div>
      <img src="../assets/icons/perfil.svg" style="display: flex; margin-left:1.0rem; margin-top: 1rem;" />
    </div>
    <div style="padding-left: 0.50rem; margin-top: 1.5rem;">
      <p style="text-align: center; ">0</p>
      <p style="text-align: center;">publicações</p>
    </div>
    <div style="padding-left: 1rem; margin-top: 1.5rem;">
      <p style="text-align: center; justify-content: right">0</p>
      <p style="text-align: center;">animais encontrados</p>
    </div>
  </div>
  <div style="display: inline; margin-left: 2rem;">
    <h2 style="font-weight: bolder; text-align: left;">Fulano da Silva
      <img src="../assets/icons/new_pencil.svg" class="border" />
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
            <span class="font-bold white-space-nowrap"></span>
          </div>
        </template>
        <div class="align-image">
          <img src="../assets/images/image_dog.svg" style="height: auto;">
          <img src="../assets/images/image_golden.svg" style="margin-left: 0.20rem; height: auto;">
        </div>
      </TabPanel>
      <TabPanel>
        <template #header>
          <div class="flex align-items-center gap-2">
            <img src="../assets/icons/icon_pata_black.svg" class="icon-ajuste">
            <span class="font-bold white-space-nowrap"></span>
          </div>
        </template>
        <div>
          <img src="../assets/images/image_dog.svg" >
        </div>
      </TabPanel>
    </TabView>
  </div>


</template>
<style>
h3 {
  font-weight: bolder;
  text-align: left;
  margin-left: 5px;
  color: black;
  font-size: 15px;
}

.border {
  width: 0.90rem;
  margin-left: 12vh;
}

.icon-center {
  margin-top: 4rem;
}

.icon-ajuste {
  display: block;
  justify-content: center;
  margin-left: 6rem;
}

.card {
  margin-top: 4rem;
}

.align-image{
  display: flex;
}


</style>