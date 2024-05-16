
<template>
    <div style="display: flex; margin-top: 2rem; justify-content: left; padding-top: 2rem; margin-left: 2rem;">
        <div>
        <img src="../assets/icons/icon-produto.svg" style="margin-top: 1rem;justify-content: left;" />
        </div>
        <div style="padding-left: 0.40rem; margin-top: 1.0rem;">
            <h2 style="text-align: center; margin-left: 0.40rem; ">Produtos</h2> 
        </div>
    </div>
    <div class="card flex flex-wrap justify-content-center gap-3" style="margin-top: 0.60rem;">
        <IconField iconPosition="left" style="margin-left: 2rem;">
            
        <InputText v-model="value1" placeholder="Buscar em PetShops">
            <InputIcon class="pi pi-search"/>
        </InputText>
            
        </IconField>

    </div>
    <div class="card" style="background-color: #FFD554;">
        <Carousel
          :value="products"
          :numVisible="3"
          :numScroll="3"
          :responsiveOptions="responsiveOptions"
        >
          <template #item="slotProps">
            <div class="border-1 surface-border border-round m-2 p-3">
              <div class="mb-3">
                <div class="relative mx-auto">
                    <p class="carousel__text">{{ slotProps.data.text }}</p>

                  <img
                    :src="slotProps.data.image"
                    :alt="slotProps.data.alt"
                    class="carousel__images"
                  />
                </div>
              </div>

            </div>
        
          </template>
        </Carousel>
      </div>



</template>
<script setup>
import { ref } from 'vue'

const products = ref([
  {
    text: 'Acessórios para gatos',
    image:
    "../src/assets/icons/acessorios.svg",
    alt: 'background-image',
    

  },
  {
    image:
      '',
   // alt: 'background-image'
  },
  {
    image:
      '',
    //alt: 'background-image'
  },
  {
    image:
      '',
    //alt: 'background-image'
  }
])
</script>
<style>
#bloco-info {
  padding: 20px 10px 0;
}
.cards-geral {
  background-color: white;
  margin-bottom: 15px;
}
.carousel__text{
    justify-content: left;
    color: #CB754A;
    
}

.lost-text {
  color: black;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 700;
  font-size: 20px;
}

/* .p-carousel-next {
  position: absolute !important;
  left: 20em !important;
  top: 20em !important;
}
.p-carousel-prev {
  position: absolute !important;
  top: 20em !important;
  left: 1em !important;
  z-index: 999 !important;
} */
.p-carousel .p-carousel-indicators .p-carousel-indicator button {
  width: 10px;
  height: 10px;
}
.p-carousel .p-carousel-indicators .p-carousel-indicator.p-highlight button {
  background-color: #ff5c00;
  
}

.p-carousel-indicators {
  display: flex !important;
  justify-content: center !important;
  width: 29% !important;
  padding: 0 !important;
  position: absolute !important;
  top: 20em;
  left: 8em;
}

.talk {
  color: #696969;
  display: flex;
  align-items: center;
  padding: 0px 10px 22px;
}

.strong-nome {
  color: #696969;
  font-weight: 700;
  margin-left: 6px;
  font-size: 12px;
}

.info-baixo {
  margin: 10px 0px;
}

.bloco-topo {
  display: flex;
  flex-direction: column;
}

.info-CardAnimais {
  display: flex;
  align-items: center;
}

.status {
  width: 100%;
  text-align: end;
  color: #696969;
  font-weight: 600;
}





/*.p-inputtext {
  /* padding: 0.5rem 0; 
  width: 284px;
  /* font-size: 20px; */
  /* font-weight: bold; */

#icone-lupaDog {
  margin: 0 0 0 10px;
}

.icone-lupaDog {
  width: 20px;
  height: 20px;
}

.carousel {
  position: relative;
  height: 400px;
  width: 360px;
  margin: 0 auto;
  margin-bottom: 5rem;
}
.carousel__images {
  width: 100px;
  height: 100px;
  object-fit: cover;
  margin-left: 5rem;
  
}
.carousel__track-container {
  height: 100%;
  width: 100%;
  position: relative;
  overflow: hidden;
}
.carousel__track {
  display: flex;
  transition: transform 0.5s ease-in-out;
  padding: 0;
  margin: 0;
  position: relative;
  height: 100%;
}
.carousel__slide {
  position: absolute;
  top: 0;
  bottom: 0;
  width: 100%;
}
.carousel__button {
  position: absolute;
  top: 50%;
  z-index: 999;
  transform: translateY(-50%);
  border: 0;
  background-color: transparent;
  cursor: pointer;
  transition: all 0.2s ease-in;
}

.carousel__button--left {
  left: 10px;
  transform: translateY(-50%) rotate(180deg);
}
.carousel__button--right {
  right: 10px;
}
.carousel__button img {
  width: 35px;
}
.carousel__nav {
  display: flex;
  justify-content: center;
  padding: 20px 0;
  position: absolute;
  top: 23em;
  left: 11em;
  gap: 1rem;
}
.carousel__indicator {
  border: 0;
  border-radius: 50%;
  width: 15px;
  height: 15px;
  background-color: rgba(0, 0, 0, 0.6);
  cursor: pointer;
}

.carousel__indicator.current-slide {
  background: #ff5c00;
}
.is-hidden {
  display: none;
}
.relative.mx-auto{
    display: flex;
}
</style>
