import endpoints from "../endpoints.js";
import axios from "axios";

const WarehouseRequests = {
    details: function (callback = null) {
        axios
            .get(endpoints.warehouse.details(), {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.status === 200 && typeof callback === 'function') {
                    callback(response.data);
                }
            })
            .catch(error => {
                console.error(error.response.data);
            });
    },
}

export default WarehouseRequests;
