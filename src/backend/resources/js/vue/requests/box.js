import endpoints from "../endpoints.js";
import axios from "axios";

const BoxRequests = {
    list: function (callback) {
        axios
            .get(endpoints.box.list(), {
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
    update: function (id, callback = null) {
        axios
            .post(endpoints.box.update(id), {

            }, {
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
    updateMultiple: function (ids, roomId, callback = null) {
        axios
            .post(endpoints.box.updateMultiple(), {
                ids: ids,
                room_id: roomId
            }, {
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
    create: function (callback = null) {
        axios
            .post(endpoints.box.create(), {

            }, {
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
    createMultiple: function (data, callback = null) {
        axios
            .post(endpoints.box.createMultiple(), data, {
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
    }
}

export default BoxRequests;
