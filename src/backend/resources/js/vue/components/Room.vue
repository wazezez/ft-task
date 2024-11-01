<script>
import Box from "./Box.vue";
import BoxTransferForm from "./Forms/BoxTransferForm.vue";
import Modal from "./Modal.vue";

export default {
    name: "Room",
    components: {Modal, BoxTransferForm, Box},
    props: ['room'],
    data() {
      return {
          isShowModal: false,
      }
    },
    methods: {
        showModal() {
            this.isShowModal = true;
        },
        hideModal() {
            this.isShowModal = false;
        },
        handleBoxesTransferred() {
            this.$emit('boxes-transferred');
            this.hideModal();
        }
    }
}
</script>

<template>
    <div class="room-details">
        <div class="room-details__header">
            <div class="room-details__title">Номер комнаты: {{room.id}}</div>
            <div class="room-details__actions" v-if="room.boxes.length > 0">
                <button class="button" @click.prevent="showModal">Перенести ящики</button>
            </div>
        </div>
        <div class="room-details__content">
            <div class="boxes-list" v-if="room.boxes.length > 0">
                <div class="boxes-list__item" v-for="box in room.boxes">
                    <Box :content-type="box.content_type" :id="box.id"/>
                </div>
            </div>
            <div class="notice-message" v-else>Комната пуста</div>
        </div>

        <Modal title="Перенести ящики в комнату"  v-if="isShowModal">
            <BoxTransferForm :box-ids="room.boxes.map((box) => box.id)" @boxesTransferred="handleBoxesTransferred"/>
        </Modal>
    </div>
</template>

<style scoped>

</style>
