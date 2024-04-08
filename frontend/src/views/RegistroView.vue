<template>
    <div class="screenLogin">
      <section class="mainLogin">
            <div class="imgfundo">
                <img class="cachorros" src="../assets/images/fundocachorros.svg" alt="" />
            </div>

            <div class="main-card-rgst">
                <div class="header-card-rgst">

                <img class="logologin" src="../assets/images/logoLogin.svg" alt="" />
                        <div class="textos-rgst">
                            <RouterLink to="/" class="textoEntrar">Encontre seu pet!</RouterLink>
                            <p class="cadastretxt">Cadastre-se agora</p>
                        </div>
                </div>

                <div class="inputLogin">
                <label for="username">Nome</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>
                <div class="inputLogin">
                <label for="username">Email</label>
                <InputText id="email" aria-describedby="username-help" />
                </div>
                <div class="inputLogin">
                <label for="username">Senha</label>
                <Password class="password" id="password" :feedback="false" />
                </div>
                <div class="inputLogin">
                <label for="username">Repetir a Senha</label>
                <Password class="password" id="password" :feedback="false" />
                </div>



                <div class="footer-card-rgst">
                    <p class="conta">Ja tem uma conta? Entre!</p>
                    <Button  class="rgstBtn" label=""></Button>
                </div>
               

            </div>
      </section>
    </div>
  </template>
  




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
    font-size: 15px;
    margin: 0;
  }
  
  .inputLogin {
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
    margin: auto;
    width: 9rem;
    background-image: url('../assets/images/seta.svg');
    background-size: cover;
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
    padding-left: 2rem;
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


  .footer-card-rgst{
    display: flex;
    padding-top: 1rem;
    padding-left: 2rem;
    justify-content: end;
  }

  .conta{
    color:#646464;
  }


  </style>
  