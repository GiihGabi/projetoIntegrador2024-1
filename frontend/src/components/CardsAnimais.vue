<template>

    <section class="cardsAnimais">
        <div class="card-feedAnimais">
            <div>
                <img class="img-animal-feedAnimais" src="../assets/images/cao1.png" width="350" height="350" alt="" srcset="">
            </div>
            <div class="secao-procurar-animais">
                <div class="titulo-cardsAnimais">
                    <img src="../assets/icons/question.png" width="30" height="30" alt="" srcset="">
                    <h1 class="h1-cardsAnimais">Procurando um tutor</h1>
                </div>
                <div>
                    <div class="paragrafos-cardsAnimais">
                        <p>Nome:</p>
                        <p class="sub-paragrafos-cardsAnimais">Desconhecido</p>
                    </div>
                    <div class="paragrafos-cardsAnimais">
                        <p>encontrado próximo à:</p>
                        <p class="sub-paragrafos-cardsAnimais">Rua Padre roma,205 - Marília - SP</p>
                    </div>
                    <div class="paragrafos-cardsAnimais">
                        <p>Observações:</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-feedAnimais">
            <div>
                <img class="img-animal-feedAnimais" src="../assets/images/cao1.png" width="350" height="350" alt="" srcset="">
            </div>
            <div class="secao-procurar-animais">
                <div class="titulo-cardsAnimais">
                    <img src="../assets/icons/question.png" width="30" height="30" alt="" srcset="">
                    <h1 class="h1-cardsAnimais">Procurando um tutor</h1>
                </div>
                <div>
                    <div class="paragrafos-cardsAnimais">
                        <p>Nome:</p>
                        <p class="sub-paragrafos-cardsAnimais">Desconhecido</p>
                    </div>
                    <div class="paragrafos-cardsAnimais">
                        <p>encontrado próximo à:</p>
                        <p class="sub-paragrafos-cardsAnimais">Rua Padre roma,205 - Marília - SP</p>
                    </div>
                    <div class="paragrafos-cardsAnimais">
                        <p>Observações:</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

</template>

<style>
.cardsAnimais {
    background-color: #F4F4F4;
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
    background-color: orange; 
    border-radius: 4px; 
}

.cardsAnimais::-webkit-scrollbar-thumb:hover {
    background-color: #ff8800; 
}

.card-feedAnimais{
    display: flex;
    justify-content: space-between;
    background: white;
    border-radius: 16px;
    height: 350px;
    margin-bottom: 35px;
}
.h1-cardsAnimais{
    font-weight: 700;
    font-size: 24px;
    color: #373737;
    line-height: 23px;
    margin-left: 8.5px;
}
.titulo-cardsAnimais{
    display: flex;
    align-items: center;
}
.paragrafos-cardsAnimais{
    padding: 5px 0 ;
}
.sub-paragrafos-cardsAnimais{
}
.img-animal-feedAnimais{
    border-radius: 16px 0 0 16px;
}
.secao-procurar-animais{
    display: flex;
    flex-direction: column;
    padding: 20px 2em 0;
}
</style>

