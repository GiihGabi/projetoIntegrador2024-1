<!-- Login.vue -->

<template>
  <div class="screenCad">
    <section class="cadpetCard">
      <div class="textEncontrePet">
        <div class="image">
          <img class="logoCad" src="../assets/images/logoLogin.svg" alt="" />
        </div>
        <div class="textImage">
          <h3 class="h3_encontrePet">Encontre seu pet</h3>
          <h4 class="h4_cadPet">Cadastre-se agora</h4>
        </div>
      </div>
      <form action="" class="form-cad">
        <div class="inputCad">
          <label for="name">Nome</label>
          <InputText id="name" v-model="name" aria-describedby="username-help" />
        </div>
        <div class="inputCad">
          <label for="username">Email</label>
          <InputText id="email" v-model="email" aria-describedby="username-help" />
        </div>
        <div class="inputCad">
          <label for="username">Senha</label>
          <InputText id="senha" v-model="senha" aria-describedby="username-help" />
        </div>
        <div class="inputCad">
          <label for="username">Confirmar senha</label>
          <InputText id="confirmarSenha" v-model="confirmarSenha" aria-describedby="username-help" />
        </div>
        <div class="textosCad">
          <label class="contaCad">Já tem conta? <a class="a-entre" href="/login">Entre!</a></label>
        </div>
      </form>
    </section>
  </div>
</template>
  
<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router'; // Importe o useRouter corretamente
import RegisterService from '@/services/RegisterService'

export default {
  setup() {
    const router = useRouter();
    const email = ref('');
    const password = ref('');
    const username = ref('');
    const zip_code = ref('');
    const user_level = ref('Client');
    const document = ref('');
    const profile_image = ref('');

    const submitForm = async () => {
      const result = await RegisterService.registerUser(email.value, password.value, username.value, zip_code.value, user_level.value, document.value, profile_image.value);
      if (result) {
        // registro bem-sucedido, redirecione o usuário para outra página
        router.push('/');
      } else {
        // Login falhou, exiba uma mensagem de erro
        alert('Erro ao criar usuario,verifique os dados');
      }
    }

    return {
      email,
      password,
      username,
      zip_code,
      user_level,
      document,
      profile_image,
      submitForm
    };
  }
}
</script>


<style>
.mainCad {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 2rem;
  margin: auto;
  border: 8px red;
  background-color: white;
  width: 30rem;
  height: 27rem;
  display: flex;
  justify-content: start;
  flex-direction: column;
  border-radius: 1rem;
}


.h4_cadPet {
  color: #646464;
  font-size: 14px;
  margin-top: -1em;
}

.textImage {
  display: flex;
  flex-direction: column;
  margin-left: -1em;
}

.h3_encontrePet {
  margin-bottom: 5px;
  color: #646464;
  font-size: 24px;
  font-weight: 700;
  margin-top: -0.4em;
}

.textEncontrePet {
  display: flex;
  align-items: center;
}

.image {
  margin-right: 20px;
}

.screenCad {
  width: 100%;
  height: 100%;
}

.logoCad {
  width: 2rem;
  height: 2rem;
}

.textoEntrar {
  padding: 1rem 0;
  font-weight: bolder;
  font-size: 25px;
  margin: 0;
}

.inputCad {
  display: flex;
  flex-direction: column;
  color: gray;
  width: 20rem;
}

.screenCad {
  padding-top: 8rem;
  margin: auto;
  width: 100vw;
  height: 10%;
}

.contaCad {
  color: gray;
  font-size: 14px;
  font-weight: 400;
}

.a-entre {
  font-size: 14px;
  font-weight: 400;
  color: #FF5C00;
  text-decoration: underline
}

.textosCad {
  display: flex;
  padding-top: 0.5rem;
}

.form-cad {
  padding: 2.5rem;
}
</style>
  