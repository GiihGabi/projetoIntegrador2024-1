
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
    <div class="card">
        <Carousel :value="products" :numVisible="3" :numScroll="3" :responsiveOptions="responsiveOptions">
            <template #item="slotProps">
                <div class="border-1 surface-border border-round m-2  p-3">
                    <div class="mb-3">
                        <div class="relative mx-auto">
                            <img :src="'https://primefaces.org/cdn/primevue/images/product/' + slotProps.data.image" :alt="slotProps.data.name" class="w-full border-round" />
                            <Tag :value="slotProps.data.inventoryStatus" :severity="getSeverity(slotProps.data.inventoryStatus)" class="absolute" style="left:5px; top: 5px"/>
                        </div>
                    </div>
                    <div class="mb-3 font-medium">{{ slotProps.data.name }}</div>
                    <div class="flex justify-content-between align-items-center">
                        <div class="mt-0 font-semibold text-xl">${{ slotProps.data.price }}</div>
                        <span>
                            <Button icon="pi pi-heart" severity="secondary" outlined />
                            <Button icon="pi pi-shopping-cart" class="ml-2"/>
                        </span>
                    </div>
                </div>
            </template>
        </Carousel>
    </div>




</template>

<script setup>
import { ref, onMounted } from "vue";


onMounted(() => {
    ProductService.getProductsSmall().then((data) => (products.value = data.slice(0, 9)));
})

const products = ref();
const responsiveOptions = ref([
    {
        breakpoint: '1400px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '1199px',
        numVisible: 3,
        numScroll: 1
    },
    {
        breakpoint: '767px',
        numVisible: 2,
        numScroll: 1
    },
    {
        breakpoint: '575px',
        numVisible: 1,
        numScroll: 1
    }
]);

const getSeverity = (status) => {
    switch (status) {
        case 'INSTOCK':
            return 'success';

        case 'LOWSTOCK':
            return 'warning';

        case 'OUTOFSTOCK':
            return 'danger';

        default:
            return null;
    }
};

</script>
