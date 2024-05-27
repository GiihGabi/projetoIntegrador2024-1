<template>
  <div class="chat">
    <div class="input-search-chat">
      <InputGroup>
        <div class="input-container">
          <InputText placeholder="" class="input-chat" />
          <div class="lupa-chat">
            <img class="" src="../assets/icons/lupa.svg" alt="" srcset="" />
          </div>
        </div>
      </InputGroup>
    </div>
    <TabView class="tabview-chat">
      <TabPanel header="Recebidas" class="tab-header-chat">
        <div class="container-chats">
          <div class="image-profile">
            <img class="animalImage" src="../assets/images/cao1.png" alt="" srcset="" />
          </div>
          <div>
            <p class="p-chat"><strong style="font-weight: bold;">Animal perdido</strong> - Julio Figueira</p>
            <p class="m-0 p-chat">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="card flex justify-content-center">
            <Button type="button" icon="pi pi-ellipsis-v" @click="toggle" aria-haspopup="true"
              aria-controls="overlay_menu" class="horizontal-ellipsis" />
            <Menu ref="menu" id="overlay_menu" :model="items" :popup="true" />
          </div>
        </div>
        <div class="container-chats">
          <div class="image-profile">
            <img class="animalImage" src="../assets/images/cao1.png" alt="" srcset="" />
          </div>
          <div>
            <p class="p-chat"><strong style="font-weight: bold;">Animal perdido</strong> - Julio Figueira</p>
            <p class="m-0 p-chat">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="card flex justify-content-center">
            <Button type="button" icon="pi pi-ellipsis-v" @click="toggle" aria-haspopup="true"
              aria-controls="overlay_menu" class="horizontal-ellipsis" />
            <Menu ref="menu" id="overlay_menu" :model="items" :popup="true" />
          </div>
        </div>
      </TabPanel>
      <TabPanel header="Enviadas" class="tab-header-chat">
        <div class="container-chats">
          <div class="image-profile">
            <img class="animalImage" src="../assets/images/cao1.png" alt="" srcset="" />
          </div>
          <div>
            <p class="p-chat"><strong style="font-weight: bold;">Animal perdido</strong> - Julio Figueira</p>
            <p class="m-0 p-chat">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="card flex justify-content-center">
            <Button type="button" icon="pi pi-ellipsis-v" @click="toggle" aria-haspopup="true"
              aria-controls="overlay_menu" class="horizontal-ellipsis" />
            <Menu ref="menu" id="overlay_menu" :model="items" :popup="true" />
          </div>
        </div>
      </TabPanel>
    </TabView>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const menu = ref()
const items = ref([
  {
    label: 'Resolvido',
    items: [
      {
        label: 'Excluir conversa'
      },
      {
        label: 'Denunciar'
      }
    ]
  }
])

const toggle = (event) => {
  menu.value.toggle(event)
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');

.chat {
  font-family: "Roboto Flex", sans-serif !important;
}

.tab-header-chat {
  display: block;
}

.input-search-chat {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 12px;
}

.p-inputtext:enabled:focus {
  outline: 1px solid #f2722286;
}

.input-container {
  position: relative;
}

.input-chat {
  padding-right: 40px;
  background: #f2f2f2;
  border: none;
}

.p-tabview-title {
  font-weight: bold;
}

.lupa-chat {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  display: flex;
}


.animalImage {
  width: 3rem;
  height: auto;
  display: block;
  border-radius: 50%;
}

.tabview-chat {
  background-color: transparent;
}

.tabview-chat .p-tabview-nav {
  background-color: transparent;
  display: flex;
  justify-content: center;
  /* Para centralizar os cabeçalhos das abas */
}

.tabview-chat .p-tabview-panel,
a,
.p-tabview-panels,
.horizontal-ellipsis {
  background-color: transparent;
}

.tabview-chat .p-tabview .p-tabview-nav .p-tabview-selected .p-tablink {
  color: orange !important;
}

.container-chats {
  display: flex;
  width: 100%;
  height: 5rem;
  gap: 1rem;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.horizontal-ellipsis .pi {
  transform: rotate(-90deg);
  color: #696969;
}

.horizontal-ellipsis {
  border: none
}

#overlay_menu .p-menuitem-text,
#overlay_menu .p-submenu-header {
  font-size: 14px;
  color: #696969;
}

#overlay_menu {
  border-radius: 15px;
}

.p-chat {
  color: #696969;
}
</style>