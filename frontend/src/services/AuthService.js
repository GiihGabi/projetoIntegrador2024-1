// AuthService.js

var URL = "http://localhost:8000/api/auth"

export default {
    async login(email, password) {
        try {
            const response = await fetch(URL + "/login", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, password })
            });
            if (!response.ok) {
                throw new Error('Login failed');
            }

            const data = await response.json();
            const token = data.authorisation.token;

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
    },

    async logout() {
        try {
            // const token = localStorage.getItem('token');
            // const response = await fetch(URL + "/logout", {
            //     method: 'POST',
            //     headers: {
            //         'Authorization': `Bearer ${token}`
            //     }
            // });

            // if (!response.ok) {
            //     throw new Error('Logout failed');
            // }

            // Remova o token do armazenamento local
            localStorage.removeItem('token');

            return true;
        } catch (error) {
            console.error('Error logging out:', error);
            return false;
        }
    }
};
