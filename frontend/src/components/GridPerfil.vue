<template>
  <div class="card">
    <TabView class="tabview-custom">
      <TabPanel>
        <template #header>
          <div class="flex align-items-center gap-2">
            <img src="../assets/icons/icon_pata.svg" class="icon-ajuste">
          </div>
        </template>
        <div class="align-image">
          <div class="image-place" v-for="dog in dogs" :key="dog.animal.id">
            <img v-for="url in dog.image_urls" :src="'http://localhost:8000'+url" :key="url" class="cachorro" @click="openModal(dog)">
          </div>
        </div>
      </TabPanel>
    </TabView>
    <Dialog v-model:visible="showModal" modal :closable="false" dismissableMask>
      <img :src="'http://localhost:8000'+selectedImage.image_urls[0]" class="modal-image">
      <div class="modalAnimal">

        <h4 class="modalAnimalName">{{ selectedImage.animal.animal_name }}</h4>
        <h4 class="modalAnimalDescription">{{ selectedImage.animal.description }}</h4>
      </div>

    </Dialog>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';

export default {
  setup() {
    const dogs = ref([]);
    const userId = localStorage.getItem('userId');
    const selectedImage = ref(null);
    const showModal = ref(false);

    const fetchDogs = async () => {
      try {
        const ownerId = userId;
        const response = await fetch(`http://localhost:8000/api/owners/${ownerId}/animals`);
        if (!response.ok) {
          throw new Error('Falha ao obter os dados dos cachorros.');
        }
        const data = await response.json();
        dogs.value = data;
      } catch (error) {
        console.error('Erro ao buscar dados dos cachorros:', error);
      }
    };

    const openModal = (dog) => {
      console.log(dog)
      selectedImage.value = dog;
      showModal.value = true;
    };

    onMounted(fetchDogs);

    return {
      dogs,
      selectedImage,
      showModal,
      openModal
    };
  }
};
</script>



<style scoped>
.p-dialog-header {
  display: flex;
  align-items: center;
  justify-content: end;
  flex-shrink: 0;
  padding: 0;
}

.p-dialog-content {
  padding: 0 !important;
  background: transparent !important;
}
</style>
<style>
.modalAnimal {
  padding: 0.5rem;
}

.modalAnimalDescription {
  font-size: 0.8rem;
}

.modal-image {
  border-radius: 0.5rem;
  width: 80vw;
  height: auto;
  border: none;
}

h2 {
  font-weight: bolder;
  text-align: left;
  color: black;
}

.image-place {
  width: 33vw;
  height: 33vw;

}

.cachorro {
  width: 100%;
  height: 100%;
  cursor: pointer;
  /* Adicione um cursor pointer para indicar que a imagem é clicável */

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
  height: 100%;
  padding-top: 2rem
}

.align-image {
  width: 100%;
  /* height: 50vh; */
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

.p-tabview .p-tabview-panels {
  height: 65vh !important;
  padding: 0 !important;
}

.editar {
  border: 1px solid transparent;
  margin-left: 1rem;
  width: 2rem;
  background-color: transparent;
}

.editar {
  color: black;
}

.p-button:not(:disabled):hover {
  background-color: transparent;
}
</style>
