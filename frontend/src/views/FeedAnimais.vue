<template>
    <section id="feedAnimais">
        <div>
            <h1 class="h1-feedAnimais">Pets perdidos e  encontrados</h1>
            <h2 class="sub-titulo-feedAnimais">Perto de: Rua de exemplo n°000</h2>
        </div>
        <!-- IMPORTANDO COMPONENTES  -->
        <div id="main-feedAnimais">
            <FiltrosAnimais />
            <CardsAnimais />
        </div>
    </section>
  </template>
  
<style>
#feedAnimais{
    width: 70vw;
    margin: auto;
    padding-top: 1rem;
    /* height: 600px; */
}
.h1-feedAnimais {
    background: linear-gradient(90deg, #FF934B,#F27322, #D94509);
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 30px;
    font-weight: bolder;
}
.sub-titulo-feedAnimais{
    font-size: 16px;
    font-weight: 700;
    font-size: 20px;
    color: #696969;
}
#main-feedAnimais{
    display: flex;
    justify-content: space-between;
    gap:2rem;
    margin-top: 2rem;
    /* height: 80%; */
}
</style>