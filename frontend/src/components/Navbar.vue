<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <section class="body">
    <RouterLink to="/" @click="visibleMenu = false">
      <img class="logo" src="./../assets/images/Logo.svg" style="margin-top: 0.1rem" />
    </RouterLink>
    <div style="display: flex">
      <div class="notLogged">
        <RouterLink to="/chat" @click="visibleMenu = false"
          ><i v-badge class="pi pi-comments" style="font-size: 1rem" />
        </RouterLink>

        <RouterLink to="/cart" @click="visibleMenu = false"
          ><img src="../assets/icons/cartIcon.svg" alt=""
        /></RouterLink>
      </div>

      <Button class="menuButton" @click="visibleMenu = !visibleMenu">
        <img src="../assets/icons/menuIcon.svg" />
      </Button>
    </div>
  </section>
  <Sidebar v-model:visible="visibleMenu" position="right">
    <div class="menuItens">
      <RouterLink to="/" @click="visibleMenu = false">Encontre seu pet!</RouterLink>
      <RouterLink to="/products" v-if="!isLoggedIn" @click="visibleMenu = false"
        >Produtos</RouterLink
      >
      <RouterLink to="/adoption" v-if="!isLoggedIn" @click="visibleMenu = false">Adoção</RouterLink>
      <RouterLink to="/about">Sobre nós</RouterLink>
    </div>
    <div class="logoutButton">
      <div style="float: inline-end"><a href="">Sair</a></div>
    </div>
  </Sidebar>
</template>

<script>
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

export default {
  components: {},
  setup() {
    const isLoggedIn = ref(false)
    const router = useRouter()
    const visibleMenu = ref(false)

    const checkAuthStatus = () => {
      const token = localStorage.getItem('token')
      isLoggedIn.value = !!token
    }

    const handleLogin = () => {
      checkAuthStatus()
      router.push('/')
    }

    onMounted(() => {
      checkAuthStatus()
    })

    return {
      visibleMenu,
      isLoggedIn,
      handleLogin
    }
  }
}
</script>

<style>
.logo {
  padding: 0.5rem;
  width: 3rem;
}

.body {
  display: flex;
  justify-content: space-between;
  padding-inline: 1rem;
  width: 100%;
  height: 3rem;
  background-color: white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  position: fixed;
  z-index: 10000;
  overflow: hidden;

}
.menuButton {
  background: none;
  border: none;
}
.menuItens {
  display: flex;
  text-align: end;
  flex-direction: column;
  padding-top: 2rem;
}

.p-badge {
  background: #f27322;
  font-weight: 700;
  min-width: 0.5rem;
  height: 0.5rem;
  line-height: 32rem !important;
  /* position: absolute; */
  /* margin-right: 30px; */
}

.p-sidebar-close {
  display: none;
}
.p-sidebar-mask {
  z-index: 1 !important;
}
.p-sidebar {
  top: 3rem;
  width: 15rem !important;
}
.p-sidebar-header {
  display: none;
}
.p-sidebar-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.logoutButton {
  padding-bottom: 3rem;
}

.notLogged {
  display: flex;
  margin: auto;
  gap: 1rem;
}

.containerItens {
  background: white;
  width: 100vw;
  height: 4rem;
  display: flex;
  justify-content: space-around;
  /* padding: 1rem; */
  margin: 0;
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
  height: 2.5rem;
  background: linear-gradient(90deg, #ff934b, #f27322, #d94509);
  border: none;
  border-radius: 1rem;
  font-family: 'Roboto Flex', sans-serif;
  font-weight: bolder;
  margin: auto;
}

.p-button-label {
  font-weight: bolder;
}

a {
  text-decoration: none;
  color: #696969;
  font-size: 1.2rem;
  font-weight: 600;
  line-height: 2rem;
}


</style>
