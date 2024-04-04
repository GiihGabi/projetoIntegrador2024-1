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
            const token = data.token; // Supondo que o token seja retornado como parte da resposta

            // Armazene o token JWT no armazenamento local
            localStorage.setItem('token', token);
            console.log(data)


            return true;
        } catch (error) {
            console.error('Error logging in:', error);

            return false;
        }
    }
};
