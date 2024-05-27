import axios from 'axios';

const API_URL = 'http://localhost:8000/api';

const AnimalService = {
  async createAnimal(animalData,image) {
    try {
      const formData = new FormData();
      formData.append('animal_name', animalData.animal_name);
      formData.append('gender', animalData.gender);
      formData.append('description', animalData.description || '');
      formData.append('size', animalData.size);
      formData.append('situation', animalData.situation);
      formData.append('species_id', animalData.species_id);
      
      // Adicionar as imagens ao FormData
      image.forEach((image, index) => {
        formData.append(`images[${index}]`, image);
      });

      const token = localStorage.getItem('token');
      // Use o Axios para fazer a solicitação POST com FormData
      const response = await axios.post(`${API_URL}/animals`, formData, {
        headers: {
          'Authorization': `Bearer ${token}`,
          'Content-Type': 'multipart/form-data',
        },
      });

      if (!response.data) {
        throw new Error('Erro ao criar o animal.');
      }

      // Retorna os dados da resposta
      return response.data;
    } catch (error) {
      console.error('Erro ao criar o animal:', error);
      throw error;
    }
  },
};

export default AnimalService;
