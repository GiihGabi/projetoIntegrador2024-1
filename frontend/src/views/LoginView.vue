<!-- Login.vue -->

<template>
  <div class="screenLogin">
    <section class="mainLogin">
      <img class="logologin" src="../assets/images/logoLogin.svg" alt="" />
      <RouterLink to="/" class="textoEntrar">Entrar</RouterLink>
      <div class="inputLogin">
        <label for="username">Email</label>
        <InputText id="email" v-model="email" aria-describedby="username-help" />
      </div>
      <div class="inputLogin">
        <label for="username">Senha</label>
        <Password class="password" id="password" v-model="password" :feedback="false" />
      </div>
      <div>
        <label class="esqueceu">Esqueceu sua senha?</label>
      </div>
      <Button @click="submitForm" class="loginBtn" label="Entrar"></Button>
      <div class="textoslogin">
        <label class="conta">Ainda não tem uma conta?</label>
        <label class="cadastrese">Cadastre-se e encontre seu pet</label>
      </div>
    </section>
  </div>
</template>

<script>
import { ref } from 'vue';
import { useRouter } from 'vue-router'; // Importe o useRouter corretamente
import AuthService from '@/services/AuthService'

export default {
  setup() {
    const router = useRouter(); 
    const email = ref('');
    const password = ref('');

    const submitForm = async () => {
      const loggedIn = await AuthService.login(email.value, password.value);
      if (loggedIn) {
        // Login bem-sucedido, redirecione o usuário para outra página
        router.push('/');
      } else {
        // Login falhou, exiba uma mensagem de erro
        alert('Usuário ou senha incorretos');
      }
    }

    return {
      email,
      password,
      submitForm
    };
  }
}
</script>
<style>
.mainLogin {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 2rem;
  margin: auto;
  border: 8px red;
  background-color: white;
  width: 20rem;
  height: 27rem;
  display: flex;
  justify-content: start;
  flex-direction: column;
  border-radius: 1rem;
}

.screenlogin {
  width: 100%;
  height: 100%;
}

.logologin {
  width: 2rem;
  height: 2rem;
}

.textoEntrar {
  padding: 1rem 0;
  font-weight: bolder;
  font-size: 25px;
  margin: 0;
}

.inputLogin {
  display: flex;
  flex-direction: column;
  color: gray;
}
.p-password-input{
    width: 100%;
}

.loginBtn {
  height: 2.5rem;
  background: linear-gradient(90deg, #ff934b, #f27322, #d94509);
  border: none;
  border-radius: 1rem;
  font-family: 'Roboto Flex', sans-serif;
  font-weight: bolder;
  margin: auto;
  width: 9rem;
}

.screenLogin {
  padding-top: 8rem;
  margin: auto;
  width: 100vw;
  height: 10%;
}

.esqueceu {
  padding-top: 0.5rem;
  color: gray;
  float: right;
  padding-bottom: 1rem;
}

.conta {
  padding-top: 0.5rem;
  color: gray;
}

.cadastrese {
  color: gray;
}

.textoslogin {
  color: gray;
  display: flex;
  flex-direction: column;
  margin: auto;
  text-align: center;
}
</style>
