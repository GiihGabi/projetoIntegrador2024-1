<template>
  <div class="center">
    <section>

      <div v-if="!editando" class="ajustar">
        <div class="espacamento" style="line-height: 2.0;">
          <h2><strong></strong> {{ usuario.nome }}</h2>
          <h3 class="m-0 " style="margin-bottom: 10px;"><strong>Informações:</strong></h3>
          <p class="m-0" style="margin-bottom: 10px;"><strong>Telefone:</strong> {{ usuario.telefone }}</p>
          <p class="m-0" style="margin-bottom: 10px;"><strong>Email:</strong> {{ usuario.email }}</p>
          <p class="m-0" style="margin-bottom: 10px;"><strong>Cidade:</strong> {{ usuario.cidade }}</p>
          <p class="m-0" style="margin-bottom: 10px;"><strong>Endereço:</strong> {{ usuario.endereco }}</p>
          <p class="m-0" style="margin-bottom: 10px;"><strong>CEP:</strong> {{ usuario.cep }}</p>
        </div>
        <div style="margin-top: 2cm; margin-left: 6cm;">
          <div class="image">
            <div style="margin-top: 2rem; margin-left: 1.70rem; ">
              <label for="fileInput" class = "file-uplod">
              <img src="../assets/icons/camera.svg" class="cam-icon">
              </label>
              <input type="file" id="fileInput" style="display: none;" @change="handleImageUpload">
            </div>
          </div>
          <div>
          <div class="image-2">
            <div style="margin-top: 2rem; margin-left: 1.70rem; ">
              <label for="fileInput" class = "file-uplod">
              <img src="../assets/icons/camera.svg" class="cam-icon-2">
              </label>
              <input type="file" id="fileInput" style="display: none;" @change="handleImageUpload">
            </div>
          </div>
        </div>
        </div>

        <div class="posicao">
          <div class="animal-info" style="line-height: 2.0;">
            <h2 class="right-align">Seus Animais:</h2>
            <div v-for="(animal, index) in usuario.animais" :key="index">
              <p class="horizontal"><strong>Nome:</strong> {{ animal.nome }}</p>
              <p class="horizontal"><strong>Espécie:</strong> {{ animal.especie }}</p>
              <p class="horizontal"><strong>Situação:</strong> {{ animal.situacao }}</p>
            </div>
          </div>
        </div>
      </div>
      <div v-else>
        <div class="ajustar">
          <form @submit.prevent="salvarEdicao">
            <label for="telefone" class="bord">Telefone:</label><br />
            <input type="tel" id="telefone" v-model="usuarioEditado.telefone" class="bord" /><br />
            <label for="email" class="bord">Email:</label><br />
            <input type="email" id="email" v-model="usuarioEditado.email" class="bord" /><br />
            <label for="cidade" class="bord">Cidade:</label><br />
            <textarea id="cidade" v-model="usuarioEditado.cidade" class="bord"></textarea><br /><br />
            <label for="endereco" class="bord">Endereço:</label><br />
            <textarea id="endereco" v-model="usuarioEditado.endereco" class="bord"></textarea><br />
            <label for="cep" class="bord">CEP:</label><br />
            <input type="cep" id="cep" v-model="usuarioEditado.cep" class="bord" /><br /><br />
          </form>

          <form @submit.prevent="salvarEdicaoAnimais">
            <h2>Seus Animais:</h2>
            <div v-for="(animal, index) in usuarioEditado.animais" :key="index">
              <label for="nomeAnimal" class="bord">Nome:</label><br />
              <input type="text" id="nomeAnimal" v-model="usuarioEditado.animais[index].nome" class="bord" /><br />
              <label for="especieAnimal" class="bord">Espécie:</label><br />
              <input type="text" id="especieAnimal" v-model="usuarioEditado.animais[index].especie"
                class="bord" /><br />
              <label for="situacaoAnimal" class="bord">Situação:</label><br />
              <input type="text" id="situacaoAnimal" v-model="usuarioEditado.animais[index].situacao"
                class="bord" /><br />
            </div>

          </form>
        </div>
      </div>
      <div>
        <div class="center-button">
          <div class="flex justify-center">
            <div v-if="!editando" class="edit">
              <label for="editarInformacoes" style="font-size: 20px;">Editar Informações</label>
              <Button class="pencil" @click="toggleEdicao" label="" style="margin-left: 10px;"><img
                  src="../assets/icons/pencil.svg" class="icon-pencil"></Button>
            </div>

            <div v-if="editando" class="center-button">
              <div class="flex justify-center mt-1">
                <div class="flex gap-3">
                  <Button label="Cancelar" severity="secondary" outlined class="w-full" @click="cancelarEdicao"
                    style=" background: linear-gradient(90deg, #FF934B, #F27322, #D94509); background-clip: text; -webkit-text-fill-color: transparent; border-color: white;" />
                  <Button type="submit" label="Salvar" @click="salvarEdicao" style=" background: linear-gradient(90deg, #FF934B, #F27322, #D94509);
                  background-clip: text;
                  -webkit-text-fill-color: transparent; border-color: white;" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const usuario = ref({
  nome: 'Fulano da Silva Pereira',
  telefone: '(14) 9999-9999',
  email: 'fulano@example.com',
  cidade: 'Marilia-SP',
  endereco: 'RUA PADRE ROMA',
  cep: '17-524-360',
  animais: [
    { nome: 'Winter', especie: 'Cachorro', situacao: 'Perdido' },
    { nome: 'Berlin', especie: 'Gato', situacao: 'Encontrado' }
  ]
})

const usuarioEditado = ref({
  telefone: usuario.value.telefone,
  email: usuario.value.email,
  cidade: usuario.value.cidade,
  endereco: usuario.value.endereco,
  cep: usuario.value.cep,
  animais: JSON.parse(JSON.stringify(usuario.value.animais)) // Deep clone dos animais
})

const editando = ref(false)

function toggleEdicao() {
  editando.value = !editando.value
}

function cancelarEdicao() {
  editando.value = false
  // Reseta os dados editados para os valores originais
  usuarioEditado.value.telefone = usuario.value.telefone
  usuarioEditado.value.email = usuario.value.email
  usuarioEditado.value.cidade = usuario.value.cidade
  usuarioEditado.value.endereco = usuario.value.endereco
  usuarioEditado.value.cep = usuario.value.cep
  usuarioEditado.value.animais = JSON.parse(JSON.stringify(usuario.value.animais)) // Deep clone dos animais
}

function salvarEdicao() {
  usuario.value.telefone = usuarioEditado.value.telefone
  usuario.value.email = usuarioEditado.value.email
  usuario.value.cidade = usuarioEditado.value.cidade
  usuario.value.endereco = usuarioEditado.value.endereco
  usuario.value.cep = usuarioEditado.value.cep
  usuario.value.animais = JSON.parse(JSON.stringify(usuarioEditado.value.animais)) // Deep clone dos animais
  editando.value = false
}
</script>

<style scoped>
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 90vh;
}

.ajustar {
  display: flex;
  justify-content: space-around;
}


section {
  background-color: white;
  border: 1px solid white;
  border-radius: 3rem;
  margin: 0 auto;
  padding: 40px;
  width: 75rem;
  height: 40rem;
  overflow: hidden;
}


.image {
  margin-right: 4%;
  display: flexbox;
  border: 1px solid black;
  width: 100px;
  height: 100px;

}


.image-2 {
  margin-top: 3rem;
  border: 1px solid black;
  width: 100px;
  height: 100px;

}
.horizontal {
  margin-bottom: 20px;
  font-size: 15px;
}

.posicao {
  display: flex;
  justify-content: space-between;

}

.center-button {
  display: flex;
  justify-content: center;
 
}

h2 {
  background: linear-gradient(90deg, #FF934B, #F27322, #D94509);
  background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 30px;
  font-weight: bolder;
}

.pencil {
  background: linear-gradient(90deg, #FF934B, #F27322, #D94509);
  border: none;
  border-radius: 0.7rem;
  font-family: 'Roboto Flex', sans-serif;
  font-weight: bolder;
  width: 2.3rem;
  display: flex;
  justify-content: center;
}

.icon-pencil {
  margin: auto;
}

.edit {
  margin-bottom: 10px;
  display: flex;
  background: linear-gradient(90deg, #FF934B, #F27322, #D94509);
  background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-top: 10rem;

}
.file-upload {
    cursor: pointer;
  }
@media screen and (max-width: 768px) {}
</style>
