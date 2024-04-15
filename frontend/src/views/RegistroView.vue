<template>
    <div class="screenLogin">
      <section class="mainLogin" v-if="registerStage">
            <div class="imgfundo">
                <img class="cachorros" src="../assets/images/fundocachorros.svg" alt="" />
            </div>

            <div class="main-card-rgst" >
                <div class="header-card-rgst">

                <img class="logologin" src="../assets/images/logoLogin.svg" alt="" />
                        <div class="textos-rgst">
                            <RouterLink to="/" class="textoEntrar">Encontre seu pet!</RouterLink>
                            <p class="cadastretxt">Cadastre-se agora</p>
                        </div>
                </div>

                <div class="inputRegst">
                <label for="username">Nome</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>
                <div class="inputRegst">
                <label for="username">Email</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>
                <div class="inputRegst">
                <label for="username">Senha</label>
                <Password class="password" id="password" :feedback="false" />
                </div>
                <div class="inputRegst">
                <label for="username">Repetir a Senha</label>
                <Password class="password" id="password" :feedback="false" />
                </div>



                <div class="footer-card-rgst">
                    <label class="conta">Ja tem uma conta? <RouterLink to="/login" class="link-login">Entre!</RouterLink></label>
                    <Button @click="registerStage = false" class="rgstBtn" label=""></Button>
                </div>
               

            </div>
      </section>
      <section class="mainLogin" style="height: fit-content;" v-if="!registerStage">
        
        <div class="main-card-rgst" >
          <div class="teste">

            <div class="form">
              <div class="header-card-rgst">
                
                <img class="logologin" src="../assets/icons/pin.svg" style="width: 1.5rem;" alt="" />
                <div class="textos-rgst">
                  <RouterLink to="/" class="textoEntrar">Informe sua localização:</RouterLink>
                </div>
              </div>

                <div class="inputRegst">
                  <label for="username">Estado</label>
                  <InputText id="estado" aria-describedby="username-help" />
                </div>
                <div class="inputRegst">
                  <label for="username">Cidade</label>
                  <InputText id="cidade" aria-describedby="username-help" />
                </div>
                <div class="inputRegst">
                  <label for="username">Cep</label>
                  <InputText id="cep" aria-describedby="username-help" />
                </div>
                <div class="inputRegst">
                  <label for="username">Rua</label>
                  <InputText id="rua" aria-describedby="username-help" />
                </div>
              </div>
              
            <div class="divider"></div>

            <div class="formAnimals">
              <div class="header-card-rgst">
                
                <img class="logologin" src="../assets/icons/paw.svg" alt="" />
                <div class="textos-rgst">
                  <RouterLink to="/" class="textoEntrar">Tem um animal perdido?</RouterLink>
                </div>
              </div>

                <div class="inputRegst">
                  <label for="username">Insira imagens do seu animalzinho:</label>
                  
                  <div class="images">
                    <div class="image"></div>
                    <div class="image"></div>
                    <div class="image"></div>

                  </div>
                </div>
                <div class="inputRegst">
                  <label for="username">Nome do Animalzinho:</label>
                  <InputText id="cidade" aria-describedby="username-help" />
                </div>
                <div class="inputRegstDropDowns">
                  <div style="width: 10rem">
                    <label for="username">Tipo:</label>
                    <InputText style="width: 100%" id="cep" aria-describedby="username-help" />
                  </div>
                  <div style="width: 16rem">
                      
                      <label for="username">Raça</label>
                        
                        <InputText style="width: 17rem" id="cep" aria-describedby="username-help" />
                        
                  </div>
                </div>
                <div class="inputRegst">
                  <label for="username">Ultimo Local visto</label>
                  <div style="width: 100%;gap: 1rem;display: flex;">
                    
                    <InputText style="width: 100%;" id="rua" aria-describedby="username-help" />
                    <Button @click="registerStage = false" class="mapBtn" label=""></Button>

                  </div>
                </div>
              </div>
          </div>
            
            <div class="imgfundo">
                </div>
                <div class="footer-card-rgst" style="margin: 0;display: flex;justify-content: end;padding: 1rem 0;width: 100%;">
                  <RouterLink to="/" style="margin:0" >       <Button class="rgstBtn" label=""></Button></RouterLink>
                </div>
               

            </div>
      </section>
    </div>
  </template>
  
<script>
  import { ref } from 'vue';
  import { RouterLink } from 'vue-router';

  export default {
    setup(){

      const registerStage = ref(true)

      return{
        registerStage,
        RouterLink
      }
    }
  }

</script>



  <style>
 .inputRegstDropDowns {
    padding-left: 2rem;
    display: flex;
    color: gray;
    gap: 1rem;
    width: 100%;
  }
  .images{
    width: 100%;
    height: 5rem;
    display: flex;
    gap: 1rem;
    .image{
      border: 1px solid #a5a5a5;
      background-color: #f8f8f8;
      border-radius: 1rem;
      width: 5rem;
      height: 100%

    }
  }
  .teste{
    display: flex;
    margin-top:2rem;
    gap:2rem
  }
  .form{
    display: flex;
    flex-direction: column;
  }
  .formAnimals{ 
     display: flex;
    flex-direction: column;
    width: 30rem;
  }
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
  .divider{
    height: 20rem;
    border: 1px solid #d0d0d0;
    width: 1px;
    margin: auto;
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
    font-weight: bolder;
    font-size: 20px;
    margin: 0;
  }
  
  .inputRegst {
    padding-left: 2rem;
    display: flex;
    flex-direction: column;
    color: gray;
  }
  .p-password-input{
      width: 100%;
  }
  
  .rgstBtn {
    height: 2.5rem;
    background: linear-gradient(90deg, #ff934b, #f27322, #d94509);
    border: none;
    border-radius: 1rem;
    font-family: 'Roboto Flex', sans-serif;
    font-weight: bolder;
    width: fit-content;
    background-image: url('../assets/images/seta.svg');
    background-size: cover;
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
  
  }
  .mapBtn {
    height: 2.5rem;
    background: linear-gradient(90deg, #ff934b, #f27322, #d94509);
    border: none;
    border-radius: 1rem;
    font-family: 'Roboto Flex', sans-serif;
    font-weight: bolder;
    width: fit-content;
    background-image: url('../assets/images/mapa.svg');
    background-size: cover;
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
  
  }
  
  .screenLogin {
    padding-top: 6rem;
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
    /* margin-top: 1rem; */
    display: flex;
    /* height: fit-content; */
    align-items: center;
    gap: 1rem;
    padding-top:1.0rem;
    padding-bottom: 1rem;
  }


  .cadastretxt{
    color: #646464;
    font-size: 14px;
  }


  .textos-rgst{
    line-height: 1rem;
  }


  .footer-card-rgst{
    display: flex;
   margin: 1rem 3rem;
   gap: 4rem;
    justify-content: space-between

  }

  .conta{
    color:#646464;
  }

  .link-login {
  font-size: 15px;
  text-decoration: underline;
  color: #FF5C00;
}

  </style>
  