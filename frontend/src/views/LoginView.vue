<!-- Login.vue -->
<template>
  <div class="screenLogin">
    <section class="mainLogin">
          <div class="imgfundo">
              <img class="cachorros" src="../assets/images/fundocachorros.svg" alt="" />
          </div>

          

          <div class="main-card-rgst">
               <div class="header-card-rgst">
                        <div class="content-header-login">
                          <img class="logologin" src="../assets/images/logoLogin.svg" alt="" />
                            <h2 class="entrarLogin">Entrar</h2>
                        </div>
                </div>
            
              <div class="inputLogin">
              <label for="username">Email</label>
              <InputText id="email" aria-describedby="username-help" />
              </div>
              <div class="inputLogin">
              <label for="username">Senha</label>
              <Password class="password" id="password" :feedback="false" />
              </div>
            
              <div class="texto-esqueceu-login">
                <label class="esqueceu">Esqueceu sua senha?</label>
              </div>

              <div class="footer-btn-login">
                 <Button  class="loginBtn" label="">Entrar</Button>

              </div>
             
              <div class="footer-texts-login">       
                 <label>Ainda não tem conta?</label>
                 <label><RouterLink to="/singUp" class="link-registro">Cadastre-se</RouterLink> e encontre seu pet!</label>
              </div>

          </div>
    </section>
  </div>
</template>






<script>
import { ref } from 'vue';
import { RouterLink, useRouter } from 'vue-router'; // Importe o useRouter corretamente
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
  margin: auto;
  border: 8px red;
  background-color: white;
  width: fit-content;
  height: 27rem;
  display: flex;
  justify-content: center;
  border-radius: 1.5rem;
}

.link-registro { font-size: 15px; text-decoration: underline; color: #FF5C00; }


.logologin {
  width: 2rem;
  height: 2rem;
}

.texto-esqueceu-login{}

.esqueceu {
  padding-top: 0.5rem;
    color: gray;
    float: right;
    padding-bottom: 1rem;
  }

.textoEntrar {
  font-weight: bolder;
  font-size: 15px;
  margin: 0;
}

.inputLogin {
  padding-left: 0;
  display: flex;
  flex-direction: column;
  color: gray;
}
.p-password-input{
    width: 100%;
}

.loginBtn {
  display: flex;
  justify-content: center;
  height: 2.5rem;
  background: linear-gradient(90deg, #ff934b, #f27322, #d94509);
  border: none;
  border-radius: 1rem;
  font-family: 'Roboto Flex', sans-serif;
  font-weight: bolder;
  width: 9rem;
  margin: auto;
  
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



.main-card-rgst{
  display: flex;
  flex-direction: column;
  padding-inline: 3rem;
}

.cachorros{
  height: 100%;
  width: 100%;
}


.header-card-rgst{
  display: flex;
  height: fit-content;
  gap: 1rem;
  padding-top:1.0rem;
}


.cadastretxt{
  color: #646464;
  font-size: 10px;
}


.textos-rgst{
  line-height: 0.7rem;
}


.footer-btn-login{
  height:fit-content;
  display: flex;
  justify-content: center;
  padding-top:1.5rem;
}

.conta{
  color:#646464;
}

.footer-texts-login{
  padding: 2rem 0;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.content-header-login{
  display: flex;
  flex-direction: column;
}

.entrarLogin{
  color:#646464;
  font-size: 30px;
  font-weight: bolder;
}


.link-registro {
  font-size: 15px;
  text-decoration: underline;
  color: #FF5C00;
}
</style>
