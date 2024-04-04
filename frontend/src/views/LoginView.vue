<!-- Login.vue -->

<template>
    <div>
        <h2>Login</h2>
        <form @submit.prevent="submitForm">
            <input type="text" v-model="username" placeholder="Username" required>
            <input type="password" v-model="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
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
