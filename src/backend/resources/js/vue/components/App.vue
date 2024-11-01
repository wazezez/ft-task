<script>
import WarehouseDetails from "./WarehouseDetails.vue";
export default {
    name: "App",
    components: {
        WarehouseDetails
    }
}
</script>

<template>
    <main class="dashboard">
        <aside class="dashboard__sidebar">
            <div class="dashboard__logo"></div>
            <ul class="dashboard__menu">
                <li><a href="" class="active">Детализация склада</a></li>
                <li><a href="">Новый приход товара</a></li>
                <li><a href="">Новая отправка товара</a></li>
            </ul>
        </aside>
        <section class="dashboard__container">
            <div class="tabs">
                <WarehouseDetails />
            </div>
        </section>
    </main>
</template>

<style scoped>

</style>
