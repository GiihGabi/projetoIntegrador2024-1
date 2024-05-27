<template>

  <CardPerfil v-if="userData == 'C'" />
  <GridPerfil v-if="userData == 'C'" />

  <CardPerfilPetShop v-if="userData =='P'"/>
</template>


<script>
import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import UserService from "@/services/UserService";
import AuthService from "@/services/AuthService"; // Certifique-se de importar AuthService

export default {
  setup() {
    const router = useRouter();
    const userId = localStorage.getItem('userId'); // Obtém o ID do usuário do armazenamento local

    // Variáveis reativas para armazenar os dados do usuário
    const userData = ref();

    // Função para buscar os dados do usuário por ID
    const getUserData = async () => {
      try {
        const user = await UserService.getUserById(userId);
        userData.value = user.user_level;
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    };

    // Detecta quando o usuário faz logout e redireciona para a rota "/"
    watch(AuthService.isLoggedIn, (loggedIn) => {
      if (!loggedIn) {
        router.push("/");
      }
    });

    // Chamada inicial para buscar os dados do usuário ao montar o componente
    onMounted(() => {
      getUserData();
      console.log("Entrou");
    });

    return {
      userData,
    };
  }
};
</script>