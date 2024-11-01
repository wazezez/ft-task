<script>
import boxContentTypes from "../../content-types.js";
import BoxRequests from "../../requests/box.js";

export default {
    name: "AddNewPackagesForm",
    data() {
        return {
            quantity: 0,
            boxContentType: null,
            roomId: null,
        }
    },
    computed: {
        getAvailableBoxContentTypes() {
            return boxContentTypes;
        },
        getAvailableRoomsToTransfer() {
            return this.$store.state.warehouse.rooms.map((room) => room.id);
        }
    },
    methods: {
        handleSubmit() {
            BoxRequests.createMultiple({
                quantity: this.quantity,
                content_type: this.boxContentType,
                room_id: this.roomId
            }, () => {
                this.$emit('package-added');
            });
        }
    }
}
</script>

<template>
    <form @submit.prevent="handleSubmit">
        <div class="form__fields">
            <div class="input-field">
                <label for="">Количество ящиков</label>
                <input type="number" v-model="quantity" placeholder="Количество ящиков">
            </div>
            <div class="input-field">
                <label for="">Указать содержимое</label>
                <select name="" id="" v-model="boxContentType">
                    <option value="null" v-if="boxContentType === null">Выберите содержимое</option>
                    <template v-for="(value, key) in getAvailableBoxContentTypes">
                        <option :value="key">{{value}}</option>
                    </template>
                </select>
            </div>
            <div class="input-field">
                <label for="">Укажите помещение</label>
                <select name="" id="" v-model="roomId">
                    <option value="null" v-if="roomId === null">Выберите номер комнаты</option>
                    <template v-for="roomId in getAvailableRoomsToTransfer">
                        <option :value="roomId">{{roomId}}</option>
                    </template>
                </select>
            </div>
        </div>

        <button type="submit" class="button">Добавить</button>
    </form>
</template>

<style scoped>

</style>
