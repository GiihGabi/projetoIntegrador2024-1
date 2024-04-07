<template>
  <div class="center">
    <section>
      
      <div v-if="!editando" class="ajustar">
        <div class="espacamento" style="line-height: 2.0;">
          <h2><strong></strong> {{ usuario.nome }}</h2>
          <h3 class="gap-"><strong>Informações:</strong></h3>
          <p class="m-0"><strong>Telefone:</strong> {{ usuario.telefone }}</p>
          <p class="m-0"><strong>Email:</strong> {{ usuario.email }}</p>
          <p class="m-0"><strong>Cidade:</strong> {{ usuario.cidade }}</p>
          <p class="m-0"><strong>Endereço:</strong> {{ usuario.endereco }}</p>
          <p class="m-0"><strong>CEP:</strong> {{ usuario.cep }}</p>
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
            <label for="telefone">Telefone:</label><br />
            <input type="tel" id="telefone" v-model="usuarioEditado.telefone" /><br />
            <label for="email">Email:</label><br />
            <input type="email" id="email" v-model="usuarioEditado.email" /><br />
            <label for="cidade">Cidade:</label><br />
            <textarea id="cidade" v-model="usuarioEditado.cidade"></textarea><br /><br />
            <label for="endereco">Endereço:</label><br />
            <textarea id="endereco" v-model="usuarioEditado.endereco"></textarea><br />
            <label for="cep">CEP:</label><br />
            <input type="cep" id="cep" v-model="usuarioEditado.cep" /><br /><br />
          </form>

          <form @submit.prevent="salvarEdicao">
            <h2>Seus Animais:</h2>
            <div v-for="(animal, index) in usuarioEditado.animais" :key="index">
              <label for="nomeAnimal">Nome:</label><br />
              <input
                type="text"
                id="nomeAnimal"
                v-model="usuarioEditado.animais[index].nome"
              /><br />
              <label for="especieAnimal">Espécie:</label><br />
              <input
                type="text"
                id="especieAnimal"
                v-model="usuarioEditado.animais[index].especie"
              /><br />
              <label for="situacaoAnimal">Situação:</label><br />
              <input
                type="text"
                id="situacaoAnimal"
                v-model="usuarioEditado.animais[index].situacao"
              /><br />
            </div>

           
          </form>
        </div>
      </div>
      <div>
        <div class="center-button">
          <div class="flex justify-center">
            <div v-if="!editando">
              <Button label="Editar Dados" class="alterar" @click="editarDados" />
            </div>
            <div v-if="editando" class="center-button">
              <div class="flex justify-center mt-1">
                <div class="flex gap-3">
                  <Button
                    label="Cancelar"
                    severity="secondary"
                    outlined
                    class="w-full"
                    @click="cancelarEdicao"
                  />
                  <Button type="submit" label="Salvar" class="alterar" @click="editarDados" />
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

function editarDados() {
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
  justify-content:space-around;
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

.horizontal {
  font-size: 15px;
}
.posicao {
  display: flex;
  justify-content: space-between; 
  
}

.center-button {
  display: flex;
  justify-content: center;
  margin-top: 3rem; 
}
h2{
    background: linear-gradient(90deg, #FF934B,#F27322, #D94509);
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 30px;
    font-weight: bolder;
}

.alterar{
    background: linear-gradient(90deg, #FF934B,#F27322, #D94509);
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 20px;
    font-weight: bolder;
    border-color: #D94509;
}

@media screen and (max-width: 768px) {
     }

</style>
