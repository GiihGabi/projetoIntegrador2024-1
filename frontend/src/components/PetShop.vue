<template>
    <div class="container">
      <div class="item">
        <h2 style="margin-left: 1rem;">PetShops</h2>
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
   <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #f0f0f0;">
    <div style="width: 20rem; padding: 1rem; border: 1px solid #ddd; border-radius: 8px; background-color: #fff;">
        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
            <img src="../assets/icons/icon_loja.png" style="margin-right: 1rem;"/>
            <div>
                <h2 style="margin: 0;">LovePet</h2>
                <p style="margin: 0;">Rua exemplo N 10 - centro <br> PetShop</p>
            </div>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
            <img src="../assets/icons/icon_loja.png" style="margin-right: 1rem;"/>
            <div>
                <h2 style="margin: 0;">LovePet</h2>
                <p style="margin: 0;">Rua exemplo N 10 - centro <br> PetShop</p>
            </div>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
            <img src="../assets/icons/icon_loja.png" style="margin-right: 1rem;"/>
            <div>
                <h2 style="margin: 0;">MedPet</h2>
                <p style="margin: 0;">Rua exemplo N 10 - centro <br> PetShop</p>
            </div>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
            <img src="../assets/icons/icon_loja.png" style="margin-right: 1rem;"/>
            <div>
                <h2 style="margin: 0;">MedPet</h2>
                <p style="margin: 0;">Rua exemplo N 10 - centro <br> PetShop</p>
            </div>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
            <img src="../assets/icons/icon_loja.png" style="margin-right: 1rem;"/>
            <div>
                <h2 style="margin: 0;">Cobasi</h2>
                <p style="margin: 0;">Rua exemplo N 10 - centro <br> PetShop</p>
            </div>
        </div>
        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
            <img src="../assets/icons/icon_loja.png" style="margin-right: 1rem;"/>
            <div>
                <h2 style="margin: 0;">Cobasi</h2>
                <p style="margin: 0;">Rua exemplo N 10 - centro <br> PetShop</p>
            </div>
        </div>
    </div>
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
  