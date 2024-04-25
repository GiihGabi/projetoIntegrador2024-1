<template>
  <section id="feedAnimais">
    <div id="main-feedAnimais">
      <SearchBar @OpenFilterModal="funcaoDoOutroComponente" />
      <CardsAnimais />
    </div>
  </section>

  <Dialog v-model:visible="modalFilter" modal header="Filtros" :style="{ width: '25rem' }">
    <div class="input">
      <label for="username">Endereço, cidade ou CEP</label>
      <InputText id="input" v-model="value" aria-describedby="username-help" />
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

    // Função que será chamada quando o evento for emitido
    const funcaoDoOutroComponente = () => {
      modalFilter.value = true
    }

    return {
      funcaoDoOutroComponente,
      modalFilter,
      checked,
      especieSelecionada,
      especies,
      kilometerFilter,
      animalPerdido,
      procurandoTutor
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
  position: inherit;
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
</style>
