
<template>
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
    
  </template>
  
 
  
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