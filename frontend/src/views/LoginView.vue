<!-- Login.vue -->

<template>     
    <div class="screenLogin">
        <section class="mainLogin">
                            <img class="logologin" src="../assets/images/logoLogin.svg" alt="">
                            <RouterLink to="/" class="textoEntrar">Entrar</RouterLink>
                            <div class="inputLogin">
                                <label for="username">Email</label>
                                <InputText id="username" v-model="value" aria-describedby="username-help" />                        
                            </div>
                            <div class="inputLogin">
                                <label for="username">Senha</label>
                                <Password id="username" v-model="value" :feedback="false" />                        
                            </div>
                            <div>
                            <label class="esqueceu">Esqueceu sua senha?</label>
                            </div>
                            <Button href="/" class="loginBtn" label="Entrar"></Button>  
                            <div class="textoslogin">
                            <label class="conta">Ainda não tem uma conta?</label> 
                            <label class="cadastrese">Cadastre-se e encontre seu pet</label> 
                            </div>                       
        </section>
    </div>
</template>

<script>
import AuthService from '@/services/AuthService';

export default {
    data() {
        return {
            username: '',
            password: ''
        };
    },
    methods: {
        async submitForm() {
            const loggedIn = await AuthService.login(this.username, this.password);
            if (loggedIn) {
                // Login bem-sucedido, redirecione o usuário para outra página ou tome outra ação apropriada
                this.$router.push('/');
            } else {
                // Login falhou, exiba uma mensagem de erro ou tome outra ação apropriada
                console.error('Login failed');
            }
        }
    }
};
</script>


<style>

.mainLogin{
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

.logologin{
    width: 2rem;
    height: 2rem;
}

.textoEntrar{
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

.loginBtn{
    height: 2.5rem;
    background: linear-gradient(90deg, #FF934B,#F27322, #D94509);
    border: none;
    border-radius: 1rem;
    font-family: "Roboto Flex", sans-serif;
    font-weight: bolder;
    margin: auto;
    width: 9rem;
}

.screenLogin{
    padding-top: 10rem;
    margin: auto;
    width: 100vw;
    height: 90vh;
}

.esqueceu{
    padding-top: 0.5rem;
    color: gray;
    float: right;
    padding-bottom: 1rem;
}


.conta{
    padding-top: 0.5rem;
    color: gray;
}

.cadastrese{
    color: gray;
}



.textoslogin{
    color: gray;
    display: flex;
    flex-direction: column;
    margin:auto;
    text-align: center;
}

</style>