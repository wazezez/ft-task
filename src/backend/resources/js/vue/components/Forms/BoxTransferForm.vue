<script>
import BoxRequests from "../../requests/box.js";

export default {
    name: "BoxTransferForm",
    props: ['boxIds'],
    data() {
        return {
            newRoomId: null,
        }
    },
    computed: {
        getAvailableRoomsToTransfer() {
            return this.$store.state.warehouse.rooms.map((room) => room.id);
        }
    },
    methods: {
        transferBoxes() {
            BoxRequests.updateMultiple(this.boxIds, this.newRoomId, () => {
                this.$emit('boxes-transferred');
            });
        },
    }
}
</script>

<template>
    <form @submit.prevent="transferBoxes">
        <select name="" id="" v-model="newRoomId">
            <option value="null" v-if="newRoomId === null">Выберите номер комнаты</option>
            <template v-for="roomId in getAvailableRoomsToTransfer">
                <option :value="roomId">{{roomId}}</option>
            </template>
        </select>

        <button type="submit" class="button">Перенести</button>
    </form>
</template>

<style scoped>

</style>
