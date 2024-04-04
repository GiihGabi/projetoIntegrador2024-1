<template>
  <section class="filtro-feedAnimais">
    <form class="form-feedAnimais">
      <p class="titulo-filtros-feedAnimais">Filtros</p>
      <section>
        <div class="form-label-input-feedAnimais">
          <label class="paragrafo-filtro-feedAnimais" for="inputcep">Endereço, Cidade ou CEP</label>
          <InputText id="inputcep" type="text" v-model="valueInputTextCEP" />
        </div>
        <div class="div-filtro-feedAnimais form-label-input-feedAnimais">
          <label class="paragrafo-filtro-feedAnimais" for="inputname">Nome do Pet</label>
          <InputText id="inputname" type="text" v-model="valueInputTextName" />
        </div>
        <div class="div-filtro-feedAnimais">
          <div class="switch-filtro-feedAnimais div-filtro-feedAnimais">
            <InputSwitch v-model="checked" class="input-switch-feedAnimais" />
            <p class="paragrafo-filtro-feedAnimais">Perdido</p>
          </div>
          <div class="switch-filtro-feedAnimais div-filtro-feedAnimais">
            <InputSwitch v-model="checked2" class="input-switch-feedAnimais" />
            <p class="paragrafo-filtro-feedAnimais">Procurando Tutor</p>
          </div>
        </div>
        <div class="div-filtro-feedAnimais">
          <MultiSelect
            v-model="selectedCities"
            :options="cities"
            filter
            optionLabel="name"
            placeholder="Raça do animal"
            :maxSelectedLabels="3"
            class="paragrafo-filtro-feedAnimais"
          />
        </div>
        <div class="div-filtro-feedAnimais">
          <InputText v-model="valueWithUnit" class="input-slider-feedAnimais" />
          <Slider v-model="value" class="slider-feedAnimais" />
        </div>
      </section>
    </form>
  </section>
</template>

<style>
/* SECTION */
.filtro-feedAnimais {
  /* margin: 0 5em 0 0; */
  width: fit-content;
}
section{
    margin-left: 1rem;
}

/* FORM */
.titulo-filtros-feedAnimais {
  font-size: 24px;
  color: #373737;
  font-weight: 700;
}

/* LABEL */
.form-label-input-feedAnimais {
  display: flex;
  flex-direction: column;
}
.paragrafo-filtro-feedAnimais {
  font-weight: 600;
  font-size: 18px;
  color: #838383;
}

/* DIVS */
.div-filtro-feedAnimais {
  padding: 5px 0;
}

/* SWITCH */
.p-inputswitch .p-inputswitch-slider:before {
  margin-top: -0.5em !important;

}

.p-multiselect:not(.p-disabled).p-focus{
    outline:1px solid #f27322 ;
}
.p-inputswitch.p-highlight .p-inputswitch-slider {
    background: #f27322;
}

.switch-filtro-feedAnimais {
  display: flex;
  gap:1rem;
  margin: auto
}

/* SLIDER */
.input-slider-feedAnimais {
  border: none;
  box-shadow: none;
  padding: 0.5rem 0;
  color: orange;
  font-weight: 800;
}
.slider-feedAnimais {
  height: 10px;
}
.p-slider .p-slider-handle::before {
  width: 14px;
  height: 14px;
}
.p-slider .p-slider-handle {
  background: linear-gradient(to right, #ff934b, #f27322, #d94509);
}

.p-slider .p-slider-range {
  background: linear-gradient(to right, #ff934b, #f27322, #d94509);
}

.p-slider.p-slider-horizontal .p-slider-handle {
  margin-top: -10px !important;
}

/* MULTISELECT */
.p-multiselect {
  width: 100%;
}

.p-multiselect .p-multiselect-label.p-placeholder {
  color: #373737;
  font-weight: 500;
}

.p-inputswitch-input {
  background: blue;
}

.p-multiselect-panel {
  width: 251px;
}

.p-inputtext:enabled:focus {
  outline: 1px solid #ff934b;
}

.p-multiselect-filter-icon {
  top: 30%;
}

.p-multiselect-panel .p-multiselect-items .p-multiselect-item .p-checkbox,
.p-multiselect-panel .p-multiselect-header .p-checkbox {
  margin-right: 0.5rem !important;
}
</style>

<script setup>
import { ref, computed } from 'vue'

const valueInputTextCEP = ref(null)
const valueInputTextName = ref(null)
const checked = ref(false)
const checked2 = ref(false)

const value = ref(0)

// Getter computado para adicionar "km" na frente do valor
const valueWithUnit = computed({
  get: () => `${value.value} km`,
  set: (newValue) => {
    // Remove "km" e atualiza o valor
    const parsedValue = parseFloat(newValue.replace('km', '').trim())
    if (!isNaN(parsedValue)) {
      value.value = parsedValue
    }
  }
})

const selectedCities = ref()
const cities = ref([
  { name: 'New York', code: 'NY' },
  { name: 'Rome', code: 'RM' },
  { name: 'London', code: 'LDN' },
  { name: 'Istanbul', code: 'IST' },
  { name: 'Paris', code: 'PRS' }
])
</script>
