<template>
  <section class="cardsAnimais">
    <div class="card-feedAnimais">
      <div>
        <img
          class="img-animal-feedAnimais"
          src="../assets/images/cao1.png"
          width="350"
          height="350"
          alt=""
          srcset=""
        />
      </div>
      <div class="secao-procurar-animais">
        <div class="titulo-cardsAnimais">
          <img
            class="icon"
            src="../assets/icons/question.png"
            width="30"
            height="30"
            alt=""
            srcset=""
          />
          <h1 class="h1-cardsAnimais">Procurando <br />tutor</h1>
        </div>
        <div>
          <div class="paragrafos-cardsAnimais">
            <p>Nome:</p>
            <p class="sub-paragrafos-cardsAnimais-nome">Desconhecido</p>
          </div>
          <div class="paragrafos-cardsAnimais">
            <p>Encontrado próximo à:</p>
            <p class="sub-paragrafos-cardsAnimais-endereco">Rua Padre roma,205 - Marília - SP</p>
          </div>
          <div class="paragrafos-cardsAnimais">
            <p>Observações:</p>
            <Textarea v-model="value" variant="filled" rows="4" cols="25" disabled autoResize />
          </div>
        </div>
      </div>
    </div>
    <div class="card-feedAnimais">
      <div>
        <img
          class="img-animal-feedAnimais"
          src="../assets/images/cao1.png"
          width="350"
          height="350"
          alt=""
          srcset=""
        />
      </div>
      <div class="secao-procurar-animais">
        <div class="titulo-cardsAnimais">
          <img
            class="icon"
            src="../assets/icons/question.png"
            width="30"
            height="30"
            alt=""
            srcset=""
          />
          <h1 class="h1-cardsAnimais">Procurando <br />tutor</h1>
        </div>
        <div>
          <div class="paragrafos-cardsAnimais">
            <p>Nome:</p>
            <p class="sub-paragrafos-cardsAnimais-nome">Desconhecido</p>
          </div>
          <div class="paragrafos-cardsAnimais">
            <p>Encontrado próximo à:</p>
            <p class="sub-paragrafos-cardsAnimais-endereco">Rua Padre roma,205 - Marília - SP</p>
          </div>
          <div class="paragrafos-cardsAnimais">
            <p>Observações:</p>
            <Textarea v-model="value" variant="filled" rows="3" cols="25" disabled autoResize />
          </div>
        </div>
      </div>
    </div>
    
  </section>
</template>

<script>
    var value = 0
</script>

<style>
.cardsAnimais {
  background-color: #fafafa;
  width: 100%;
  border-radius: 25px;
  padding: 15px;
  overflow-y: auto;
  max-height: 600px;
}

/* Estilos da barra de rolagem */
.cardsAnimais::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}

.cardsAnimais::-webkit-scrollbar-thumb {
  background: linear-gradient(30deg, #ff934b, #f27322, #d94509);
  border-radius: 4px;
}

.cardsAnimais::-webkit-scrollbar-thumb:hover {
  background-color: #ff8800;
}

.card-feedAnimais {
  display: flex;
  justify-content: space-between;
  background: white;
  border-radius: 16px;
  height: 20rem;
  margin-bottom: 35px;
}
.icon {
  width: 2.5rem;
  height: 2.5rem;
}
.h1-cardsAnimais {
  font-weight: 700;
  font-size: 40px;
  color: #373737;
  line-height: 40px; /* Altere este valor para ajustar a altura da linha */
  margin-left: 8.5px;
}
.sub-paragrafos-cardsAnimais-nome {
  font-size: 30px;
  font-weight: 800;
  line-height: 20px;
}
.sub-paragrafos-cardsAnimais-endereco {
  font-size: 20px;
  font-weight: 800;
  line-height: 20px;
}
.titulo-cardsAnimais {
  display: flex;
  align-items: center;
}
.paragrafos-cardsAnimais {
  padding: 5px 0;
}

.img-animal-feedAnimais {
  width: 100%;
  height: 100%;
  border-radius: 16px 0 0 16px;
}
.secao-procurar-animais {
  display: flex;
  flex-direction: column;
  padding: 20px 2rem 0;
  width: 22rem;
}
</style>
