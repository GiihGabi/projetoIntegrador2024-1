<template>
  <section id="feedAnimais">
    <div id="main-feedAnimais">
      <SearchBar @OpenFilterModal="OpenFilterModal" />
      <CardsAnimais />
    </div>
  </section>

  <Dialog v-model:visible="modalFilter" modal header="Filtros" :style="{ width: '25rem' }">
    <div class="input">
      <label for="username">Endereço, cidade ou CEP</label>
      <AutoComplete
        v-model="endereco"
        optionLabel="display_name"
        :suggestions="enderecosEncontrados"
        @complete="search"
      />
    </div>
    <div class="input">
      <label for="username">Nome do pet</label>
      <InputText id="input" v-model="value" aria-describedby="username-help" />
    </div>
    <div class="switches">
      <InputSwitch v-model="animalPerdido" />
      <label for="">Perdido</label>
    </div>
    <div class="switches">
      <InputSwitch v-model="procurandoTutor" />
      <label for="">Procurando tutor</label>
    </div>
    <div class="select">
      <label for="username">Espécie</label>

      <MultiSelect
        v-model="especieSelecionada"
        display="chip"
        :options="especies"
        optionLabel="name"
        placeholder="Selecione espécies"
        :maxSelectedLabels="3"
        class="w-full md:w-20rem"
        :virtualScrollerOptions="{ itemSize: 50 }"
      />
    </div>
    <div class="">
      <label for="username">Distância máxima</label>
      <div>
        <span class="kilometerValue">{{ kilometerFilter }} km</span>
        <Slider v-model="kilometerFilter" />
      </div>
    </div>
  </Dialog>
</template>

<script>
import { ref } from 'vue'

export default {
  setup() {
    const checked = ref(false)
    const endereco = ref('')
    const enderecosEncontrados = ref('')
    const modalFilter = ref(false)
    const animalPerdido = ref(false)
    const procurandoTutor = ref(false)
    const especieSelecionada = ref()
    const kilometerFilter = ref(0)
    const especies = ref([
      { name: 'Cachorros', code: 'NY' },
      { name: 'Gatos', code: 'RM' },
      { name: 'Passaros', code: 'LDN' }
    ])

    const search = async () => {
      try {
        const response = await fetch(
          `http://localhost:8000/api/search-endereco?endereco=${endereco.value}`
        )
        const data = await response.json()
        console.log(data)
        enderecosEncontrados.value = data
      } catch (error) {
        console.error('Erro ao buscar endereço:', error)
      }
    }

    // Função que será chamada quando o evento for emitido
    const OpenFilterModal = () => {
      modalFilter.value = true
    }

    return {
      search,
      endereco,
      OpenFilterModal,
      modalFilter,
      checked,
      especieSelecionada,
      especies,
      kilometerFilter,
      animalPerdido,
      procurandoTutor,
      enderecosEncontrados
    }
  }
}
</script>

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
  height: 100vh;
}
.p-dialog {
  top: 7.5rem !important;
  position: fixed;
  width: 90vw !important;
}
.p-dialog-header {
  padding-top: 1rem;
  padding-inline: 1.5rem;
  padding-bottom: 0;
}
.p-dialog-title {
  font-weight: 700;
}
.p-dialog-mask {
  top: 7rem !important;
}
.p-dialog-content {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
#input {
  width: 100%;
}
label {
  font-size: smaller;
  font-weight: 600;
}
.switches {
  /* padding: 1rem; */
  display: flex;
  gap: 1rem;
  /* flex-direction: column; */
}
.p-multiselect-header {
  display: none;
}
.p-multiselect {
  height: 2.5rem !important;
}
.select {
  display: flex;
  flex-direction: column;
}
.p-multiselect-token {
  padding: 0;
  font-size: 16px;
  padding-inline: 0.5rem;
  border-radius: 1rem;
}

.p-multiselect-label {
  display: flex;
  padding: 0.4rem;
  font-size: 16px;
  gap: 0.5rem;
}
.p-inputswitch-slider:before {
  top: 0.2rem;
}
.p-slider {
  height: 0.5rem;
}
.p-slider-range {
  background-color: #ff934b;
}
.p-slider-handle {
  top: -0.3rem;
  position: inherit;
  background-color: #ff934b;
}
.p-slider-handle::before {
  width: 0.6rem;
  height: 0.6rem;
}
.p-inputswitch.p-highlight .p-inputswitch-slider {
  background: #ff934b;
}

.kilometerValue {
  color: #ff934b;
  font-weight: 600;
}
.p-autocomplete {
  width: 100%;
}

.p-autocomplete-input {
  width: 100%;
}
.p-autocomplete-panel {
  left: 2rem !important;
  max-width: 77vw !important;
  position: inherit;
}
/* .p-autocomplete-items {
  width: 90vw;
  left: 1.5rem;
  overflow-x: auto;
} */
.p-autocomplete-loader{
  top: 0.5rem !important;
}
.p-autocomplete-panel {
  max-width: 75vw !important;
  left: 2.5rem !important;
  overflow-x: auto;
}
</style>
