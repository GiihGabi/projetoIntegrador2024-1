<template>
    <div class="container">
      <div class="item">
        <p>PetShops</p>
      </div>
      <div class="item">
        <Dropdown 
          v-model="selectedItem" 
          :options="items" 
          optionLabel="label" 
          optionValue="value"
          :virtualScrollerOptions="{ itemSize: 38 }" 
          placeholder="Ordenar" 
          class="w-full md:w-14rem" 
        />
      </div>
   </div>
   <div style="display: flex;">
    <img src="../assets/icons/icon_loja.png"/>
    <h2 style="margin-left: 1 rem">LovePet</h2>
    <p>Rua exemplo N 10 - centro <br> PetShop</p>
    
    </div>
   <div style="display: flex;">
    <img src="../assets/icons/icon_loja.png"/>
    <h2 style="margin-left: 1 rem">LovePet</h2>
    <p>Rua exemplo N 10 - centro <br> PetShop</p>
    
    </div>
   <div style="display: flex;">
    <img src="../assets/icons/icon_loja.png"/>
    <h2 style="margin-left: 1 rem">MedPet</h2>
    <p>Rua exemplo N 10 - centro <br> PetShop</p>
    
    </div>
   <div style="display: flex;">
    <img src="../assets/icons/icon_loja.png"/>
    <h2 style="margin-left: 1 rem">MedPet</h2>
    <p>Rua exemplo N 10 - centro <br> PetShop</p>
    
    </div>
   <div style="display: flex;">
    <img src="../assets/icons/icon_loja.png"/>
    <h2 style="margin-left: 1 rem">Cobasi</h2>
    <p>Rua exemplo N 10 - centro <br> PetShop</p>
    
    </div>
   <div style="display: flex;">
    <img src="../assets/icons/icon_loja.png"/>
    <h2 style="margin-left: 1 rem">Cobasi</h2>
    <p>Rua exemplo N 10 - centro <br> PetShop</p>
    
    </div>
</template>
  
  
  <script setup>
  import { ref } from "vue";
  import Dropdown from 'primevue/dropdown'; // Certifique-se de importar o Dropdown
  
  const selectedItem = ref();
  const items = ref(Array.from({ length: 100000 }, (_, i) => ({ label: `Item #${i}`, value: i })));
  </script>

  
  
  <style scoped>
  .container {
    display: flex;
    align-items: center; 
  }
  
  .item {
    margin-right: 6rem; 
  }
.p-dropdown {
    border: none;
    background: transparent;
    
  }
  .p-dropdown .p-dropdown-label.p-placeholder{
    color: black;
  }
  </style>
  