<!-- Login.vue -->

<template>
    <div class="screenCad">
      <section class="mainLogin">
        <div class="textEncontrePet">
            <div class="image">
                <img class="logologin" src="../assets/images/logoLogin.svg" alt="" />
            </div>
            <div class="textImage">
                <h3 class="h3_encontrePet">Encontre seu pet</h3>
                <h4 class="h4_cadPet">Cadastre-se agora</h4>
            </div>
        </div>
        <form action="" class="form-cad">
            <div class="inputLogin">
                <label for="name">Nome</label>
                <InputText id="name" v-model="name" aria-describedby="username-help" />
              </div>
              <div class="inputLogin">
                <label for="username">Email</label>
                <InputText id="email" v-model="email" aria-describedby="username-help" />
              </div>
              <div class="inputLogin">
                  <label for="username">Senha</label>
                  <InputText id="senha" v-model="senha" aria-describedby="username-help" />
              </div>
              <div class="inputLogin">
                  <label for="username">Confirmar senha</label>
                  <InputText id="confirmarSenha" v-model="confirmarSenha" aria-describedby="username-help" />
              </div>
              <div class="textosCad">
                <label class="conta">Já tem conta? <a class="a-entre" href="/login">Entre!</a></label>
              </div>
        </form>
      </section>
    </div>
  </template>
  
  <script>

  </script>


  <style>
  .mainLogin {
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


  .h4_cadPet{
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
    width: 20rem;
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
  
  .screenCad {
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
    color: gray;
    font-size: 14px;
    font-weight: 400;
  }

  .a-entre{
    font-size: 14px;
    font-weight: 400;
    color: #FF5C00;
    text-decoration: underline
  }
  
  .cadastrese {
    color: gray;
  }
  
  .textosCad {
    display: flex;
    padding-top: 0.5rem;
  }

  .form-cad{
    padding: 2.5rem;
  }
  </style>
  