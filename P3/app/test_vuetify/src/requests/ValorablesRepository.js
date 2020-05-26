// EntidadesRepository.js

import Repository from "./Repository";

const resource = '/entidades';
const subresource = `${resource}/valorables`
export default {
    get() {
        return Repository.get(`${resource}`);
    },

    getEntidad(ID) {
        return Repository.get(`${resource}/${ID}`);
    },

    getValorables() {
        return Respository.get(`${subresource}`)
    }
}