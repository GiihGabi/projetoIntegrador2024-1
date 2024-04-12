<template>
  <section class="containerItens">
    <div class="containerPages">
      <img class="logo" src="./../assets/images/Logo.svg" alt="" />
      <RouterLink to="/">Encontre seu pet!</RouterLink>
      <RouterLink to="/products" v-if="isLoggedIn">Produtos</RouterLink>
      <RouterLink to="/adoption" v-if="isLoggedIn">Adoção</RouterLink>
      <RouterLink to="/about">Sobre nós</RouterLink>
    </div>
    <div class="containerProfile">
      <!-- Botão para abrir o modal -->
      <Button class="findPetBnt" label="Procurar meu Pet" @click="openModal"></Button>
      <RouterLink to="/profile" v-if="isLoggedIn">Perfil</RouterLink>
      <div class="notLogged" v-if="!isLoggedIn">
        <RouterLink to="/login">Entrar</RouterLink>
        <RouterLink to="/singUp">Cadastre-se</RouterLink>
      </div>
    </div>

    <!-- Modal -->
    <Dialog v-model:visible="showModal" modal header="Edit Profile" :style="{ width: '30rem' }">
      <!-- Cabeçalho do modal -->
      <template #header>
        <div class="inline-flex align-items-center justify-content-center gap-2 div-infos">
          <div>
            <img class="pata_cad" src="../assets/icons/pata_cad_pet.png" alt="" />
          </div>
          <div class="text-image-pata-cad">
            <h3 class="h3_cad_pet">Tem um animal perdido?</h3>
            <h4 class="cadastro-pet">Cadastre ele na plataforma para encontrá-lo!</h4>
          </div>
        </div>
      </template>
      <!-- Corpo do modal -->
      <div class="form-div">
        <span class="p-text-secondary block mb-5">Insira as imagens do seu animalzinho:</span>
          <div class="image-animals" @click="openFileSelector">
            <input type="file" name="file" id="file" class="inputfile" />
          </div>
          <div class="form-div-2">
            <form action="" class="form-cad-pet">
              <div class="input-cad-pet-name">
                <label for="name">Nome do animalzinho:</label>
                <InputText id="nameAnimal" v-model="nameAnimal" aria-describedby="username-help" />
              </div>
              <div class="tipo-raca">
                <div class="input-cad-pet">
                  <label for="tipo">Tipo:</label>
                  <Dropdown v-model="selectedTipo" :options="tipos" optionLabel="name" placeholder="Selecione o tipo" class="w-full dropdown-tipo">
                    <template #selectedItem>
                      <div v-if="selectedTipo">{{ selectedTipo.name }}</div>
                    </template>
                  </Dropdown>
                </div>
                <div class="input-cad-pet">
                  <label for="raca">Raça:</label>
                  <Dropdown v-model="selectedRaca" :options="racas" optionLabel="name" placeholder="Selecione a raça" class="w-full dropdown-raca">
                    <template #selectedItem>
                      <div v-if="selectedRaca">{{ selectedRaca.name }}</div>
                    </template>
                  </Dropdown>
                </div>
              </div>
              <div class="input-cad-pet-local">
                <label for="senha">Último local visto:</label>
                <InputText id="senha" v-model="senha" aria-describedby="username-help" />
              </div>
            </form>
          </div>
        </div>
      <!-- Rodapé do modal -->
      <template #footer>
        <Button class="button-cancel" label="Cancelar" text severity="secondary" @click="showModal = false" autofocus />
        <Button class="button-save" label="Salvar" outlined severity="secondary" @click="showModal = false" autofocus />
      </template>
    </Dialog>
  </section>
</template>

<script>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import Button from "primevue/button";
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import Dropdown from 'primevue/dropdown';

export default {
  components: {
    // eslint-disable-next-line vue/no-reserved-component-names
    Button,
    // eslint-disable-next-line vue/no-reserved-component-names
    Dialog,
    InputText,
    Dropdown
  },
  setup() {
    const isLoggedIn = ref(false);
    const router = useRouter();
    const showModal = ref(false); // Variável para controlar a exibição do modal

    // Tipos e raças para os dropdowns
    const tipos = ref([
      { name: 'Cachorro' },
      { name: 'Gato' },
      { name: 'Pássaro' },
      { name: 'Outro' }
    ]);
    const racas = ref([
      { name: 'Labrador' },
      { name: 'Poodle' },
      { name: 'Siamese' },
      { name: 'Vira-lata' }
    ]);

    // Variáveis ref para armazenar os valores selecionados
    const selectedTipo = ref(null);
    const selectedRaca = ref(null);

    const checkAuthStatus = () => {
      const token = localStorage.getItem('token');
      isLoggedIn.value = !!token;
    };

    const handleLogin = () => {
      checkAuthStatus();
      router.push('/'); // Redirecione para a página inicial após o login
    };

    const openModal = () => {
      showModal.value = true;
    };

    const openFileSelector = () => {
      const fileInput = document.getElementById('file');
      fileInput.click();
    };

    onMounted(() => {
      checkAuthStatus();
    });

    return {
      isLoggedIn,
      handleLogin,
      showModal,
      openModal,
      openFileSelector,
      tipos,
      racas,
      selectedTipo,
      selectedRaca
    };
  }
}
</script>


<style>

.logo {
  width: 3rem;
}
.notLogged {
  display: flex;
  margin: auto;
  gap: 1rem;
}

.containerItens {
  background: white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  width: 100vw;
  height: 4rem;
  display: flex;
  justify-content: space-around;
  /* padding: 1rem; */
  margin: 0;
}

.containerPages {
  display: flex;
  width: fit-content;
  gap: 1rem;
}

.containerProfile {
  display: flex;
  width: fit-content;
  gap: 1rem;
}

.findPetBnt {
  height: 2.5rem;
  background: linear-gradient(90deg, #ff934b, #f27322, #d94509);
  border: none;
  border-radius: 1rem;
  font-family: 'Roboto Flex', sans-serif;
  font-weight: bolder;
  margin: auto;
}

.p-button-label {
  font-weight: bolder;
}

a {
  text-decoration: none;
  color: #696969;
  font-size: 20px;
  font-weight: 600;
  margin: auto;
}

/******  MODAL STYLES ******/

.pata_cad{
  width: 30px;
}

.div-text-pata-cad{
  display: block;
}

.div-infos{
  display: flex;
  align-items: center;
}

.text-image-pata-cad{
  display: flex;
  flex-direction: column;
  padding-left: 0.5rem;
}

.h3_cad_pet{
  color: #646464;
  font-size: 24px;
  font-weight: 700;
}

.cadastro-pet{
  font-size: 12px;
  color: #646464;
  font-weight: 400;
  margin-top: -0.6em;
}

.inputfile {
  display: none;
}

.image-animals {
  width: 100px;
  height: 100px;
  background-image: url('../assets/icons/image-camera.png');
  background-size: 30%;
  background-repeat: no-repeat;
  background-position: center;
  border-radius: 50%;
  border: 2px solid #ccc;
  cursor: pointer;
}

.image-animals:hover {
  border-color: #FF5C00;
}

.images-pets{
  display: flex;
  padding: 0.5em;
}

.form-cad-pet{
  justify-content: center;
  display: contents;
}

.input-cad-pet {
  display: flex;
  flex-direction: column;
  color: gray;
  width: 11em;
  margin-right: 20px;
  padding-top: 0.5rem;
}

.input-cad-pet-local {
  display: flex;
  flex-direction: column;
  color: gray;
   width: 23.2rem;
  margin-right: 20px;
  padding-top: 0.5rem;
}

.input-cad-pet-name {
  display: flex;
  flex-direction: column;
  color: gray;
  width: 23.2rem;
  margin-right: 20px;
  padding-top: 0.5rem;
}

.tipo-raca {
  display: flex;
  margin-right: 20px;
}

.form-div{
  padding: 0 0 1em 2em;
}

.form-div-2{
  padding-top: 1em;
}

.button-save:hover{
  color: #FF5C00;
}

.button-cancel:hover{
  color: #FF5C00;
}


</style>
