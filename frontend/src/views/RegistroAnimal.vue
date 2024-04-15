<template>
  <div class="container-rgst-pet">
    <div class="card-rgst-pet">
      <div class="left-card-pet">
          <div class="infor-loc">
            <RouterLink to="/" class="textoEntrar">Encontre seu pet!</RouterLink>

          </div>

                <div class="inputRegst">
                <label for="username">Estado</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>

                <div class="inputRegst">
                <label for="username">Cidade</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>

                <div class="inputRegst">
                <label for="username">Cep</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>

                <div class="inputRegst">
                <label for="username">Rua</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>
              </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import Dropdown from 'primevue/dropdown';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

export default {
  components: {
    Dropdown,
    InputText,
    Button
  },
  data() {
    return {
      nameAnimal: '',
      selectedTipo: null,
      selectedRaca: null,
      senha: '',
      tipos: [], // Adicione opções para o tipo de animal
      racas: [] // Adicione opções para as raças de animais
    };
  },
  methods: {
    openFileSelector() {
      // Implemente a lógica para abrir o seletor de arquivo, se necessário
    },
    cancelar() {
      // Implemente a lógica para cancelar o cadastro, se necessário
    },
    salvar() {
      // Implemente a lógica para salvar o cadastro, se necessário
    }
  }
};
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.card {
  width: 30rem;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.card-header {
  padding: 1rem;
  border-bottom: 1px solid #ccc;
}

.card-body {
  padding: 1rem;
}

.card-footer {
  padding: 1rem;
  border-top: 1px solid #ccc;
}

.image-animals {
  /* Estilos para os elementos com a classe "image-animals" */
}
</style>
