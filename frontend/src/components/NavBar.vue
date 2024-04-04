<template>

    <section class="containerItens">

        <div class="containerPages">
            <img class="logo" src="./../assets/images/Logo.svg" alt="">
            <RouterLink to="/">Encontre seu pet!</RouterLink>
            <RouterLink to="/products">Produtos</RouterLink>
            <RouterLink to="/adoption">Adoção</RouterLink>
            <RouterLink to="/about">Sobre nós</RouterLink>
        </div>
        <div class="containerProfile">
                <Button href="/" class="findPetBnt" label="Procurar meu Pet">
         
            </Button>
            <RouterLink to="/login">Entrar</RouterLink>
            <RouterLink to="/singUp">Cadastre-se</RouterLink>
        </div>

    </section>

</template>

<script>
import { RouterLink } from 'vue-router'


</script>

<style>
.logo {
    width: 3rem;
}

.containerItens {
    width: 100vw;
    height: 5rem;
    display: flex;
    justify-content: space-around;
    padding: 1rem;
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
    height: 3rem;
    background-color: #FF5C00;
    border: none;
    border-radius: 1rem;
    font-family: "Roboto Flex", sans-serif;
    font-weight: bolder;

}

.p-button-label {
    font-weight: bolder
}

a {
    text-decoration: none;
    color: #696969;
    font-weight: 600;
    margin: auto;
}
</style>