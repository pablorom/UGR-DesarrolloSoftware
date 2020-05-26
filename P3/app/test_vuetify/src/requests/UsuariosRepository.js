// usersRepository.js

import Repository from "./Repository";

const resource = '/usuarios';
export default {
    get(userID) {
        return Repository.get(`${resource}/${userID}`);
    },

    // User debe ser un objeto json
    createUser(user) {
        return Repository.post(`${resource}`, user);
    }
}