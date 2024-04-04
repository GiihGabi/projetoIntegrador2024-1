// AuthService.js

var URL = "http://localhost:8000"

export default {
    async login(username, password) {
        try {
            const response = await fetch(URL + "/api/login", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ username, password })
            });
            if (!response.ok) {
                throw new Error('Login failed');
            }

            const data = await response.json();
            const token = data.token;

            // Verifique se o token foi retornado
            if (!token) {
                throw new Error('Token not found');
            }

            // Armazene o token JWT no armazenamento local
            localStorage.setItem('token', token);

            return true;
        } catch (error) {
            console.error('Error logging in:', error);
            return false;
        }
    }
};
