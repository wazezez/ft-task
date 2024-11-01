<script>
import BoxTransferForm from "./Forms/BoxTransferForm.vue";

export default {
    name: "Modal",
    props: ['title'],
    components: {BoxTransferForm}
}
</script>

<template>
    <div class="modal">
        <div class="modal__inner">
            <div class="modal__title">{{title}}</div>
            <div class="modal__content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
