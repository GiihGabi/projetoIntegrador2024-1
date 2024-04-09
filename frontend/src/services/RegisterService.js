// AuthService.js

var URL = "http://localhost:8000"

export default {
    async registerUser(
        username,
        email,
        password,
        zip_code,
        user_level,
        document,
        profile_image,
    ) {
        console.log(email, password)
        try {
            const response = await fetch(URL + "/api/register", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username,
                    email,
                    password,
                    zip_code,
                    user_level,
                    document,
                    profile_image,
                })
            });
            if (!response.ok) {
                throw new Error('register failed');
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
