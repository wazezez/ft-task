<script>
import WarehouseRequests from "../requests/warehouse.js";
import Box from "./Box.vue";
import Room from "./Room.vue";
import BoxTransferForm from "./Forms/BoxTransferForm.vue";
import Modal from "./Modal.vue";
import AddNewPackagesForm from "./Forms/AddNewPackagesForm.vue";

export default {
    name: "WarehouseDetails",
    components: {AddNewPackagesForm, Modal, BoxTransferForm, Room, Box},
    data() {
        return {
            isLoading: false,
            isShowAddNewPackagesForm: false,
        }
    },
    computed: {
        warehouse() {
            return this.$store.state.warehouse
        },
    },
    mounted() {
        this.fetchWarehouseDetails();
    },
    methods: {
        showAddNewPackagesForm() {
            this.isShowAddNewPackagesForm = true;
        },
        hideAddNewPackagesForm() {
            this.isShowAddNewPackagesForm = false;
        },
        handlePackageAdded() {
            this.hideAddNewPackagesForm();
            this.fetchWarehouseDetails();
        },
        fetchWarehouseDetails() {
            this.isLoading = true;

            WarehouseRequests.details((details) => {
                this.$store.commit('updateWarehouse', details.list);
                this.isLoading = false;
            });
        }
    }
}
</script>

<template>
    <div class="tab">
        <div class="tab__header">
            <div class="tab__title">Детализация склада</div>

            <div class="tab__actions">
                <button class="button" @click.prevent="showAddNewPackagesForm" v-if="warehouse">Добавить новую партию</button>
            </div>
        </div>
        <div class="tab__content">
            <div class="warehouses">
                <div class="warehouses__loading" v-if="isLoading">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle fill="#003DFF" stroke="#003DFF" stroke-width="15" r="15" cx="40" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.4"></animate></circle><circle fill="#003DFF" stroke="#003DFF" stroke-width="15" r="15" cx="100" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="-.2"></animate></circle><circle fill="#003DFF" stroke="#003DFF" stroke-width="15" r="15" cx="160" cy="65"><animate attributeName="cy" calcMode="spline" dur="2" values="65;135;65;" keySplines=".5 0 .5 1;.5 0 .5 1" repeatCount="indefinite" begin="0"></animate></circle></svg>
                </div>
                <div class="warehouse-details" v-if="warehouse">
                    <div class="warehouse-details__header">
                        <div class="warehouse-details__title">{{warehouse.name}}</div>
                    </div>
                    <div class="warehouse-details__content">
                        <div class="warehouse-details__item" v-for="room in warehouse.rooms">
                            <Room :room="room" @boxesTransferred="fetchWarehouseDetails"/>
                        </div>
                    </div>
                </div>
                <div class="notice-message"  v-if="!isLoading && !warehouse">
                    Склад не добавлен
                </div>
                <Modal title="Добавить новую партию"  v-if="isShowAddNewPackagesForm">
                    <AddNewPackagesForm @packageAdded="handlePackageAdded"/>
                </Modal>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
