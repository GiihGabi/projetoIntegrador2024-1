<template>
  <div>
    <p style="text-align: center; margin-top: 2.80rem">Rua Padre roma,205 - Marília - SP</p>
    </div>
  <div style="display: flex; margin-top: 2rem; justify-content: left; padding-top: 2rem; margin-left: 2rem;">
    <div>
      <img src="../assets/icons/icon-produto.svg" style="margin-top: 1rem;justify-content: left;" />
    </div>
    <div style="padding-left: 0.40rem; margin-top: 1.0rem;">
      <h2 style="text-align: center; margin-left: 0.40rem;">Produtos</h2>
    </div>
  </div>
  <div class="card flex flex-wrap justify-content-center gap-3" style="margin-top: 0.60rem;">
    <IconField iconPosition="left" style="margin-left: 2rem;">
      <InputText v-model="value1" placeholder="Buscar em PetShops"></InputText>
    </IconField>
  </div>
  
    <div class="card">
      <Carousel :value="products" :numVisible="1" :numScroll="1">
        <template #item="slotProps">
          <div class="border-1 surface-border border-round m-2 p-3">
            <div class="mb-3">
              <div class="relative mx-auto">
                <img :src="slotProps.data.image" :alt="slotProps.data.alt" class="carousel__images" />
              </div>
            </div>
          </div>
        </template>
      </Carousel>
    </div>
    </template>
 
  <script setup>
  import { ref } from 'vue'
 
  const products = ref([
    {
      image: '../src/assets/icons/acessorios.png', // Substitua pelo caminho correto da imagem
      alt: 'Rações em Promo'
    },
    {
      image: '../src/assets/icons/icon_promo.png', // Substitua pelo caminho correto da imagem
      alt: 'Acessórios para Gatos'
    }
  ])
  </script>
  
  <style>
  .carousel__images {
    width: 100%;
    height: auto;
    object-fit: cover;
    margin-left: auto;
    margin-right: auto;
    display: block;
    margin-top: 2rem;
  }

  .p-carousel-indicator{
    display: none;
  }
  </style>
  
