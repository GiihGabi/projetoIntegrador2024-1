<template>
    <section id="feedAnimais">
        <div id="main-feedAnimais">
            <FiltrosAnimais />
            <CardsAnimais />
            <CardPerfilPetShop />
        </div>
    </section>
  </template>
  
<style>
#feedAnimais{
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
    /* height: 80%; */
}
</style>