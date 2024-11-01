const API_PATH = '/api';

const endpoints = {
    box : {
        create: () => `${API_PATH}/boxes/create`,
        createMultiple: () => `${API_PATH}/boxes/create-multiple`,
        update: (id) => `${API_PATH}/boxes/${id}/update`,
        updateMultiple: () => `${API_PATH}/boxes/update-multiple`,
        list: () => `${API_PATH}/boxes/list`,
    },
    warehouse: {
        details: () => `${API_PATH}/warehouse/details`,
    }

}

export default endpoints;
