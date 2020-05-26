// EntidadesRepository.js

import Repository from "./Repository";

const resource = '/entidades';
const subresource = `valorables`
export default {
    get() {
        return Repository.get(`${resource}`);
    },

    getEntidad(ID) {
        return Repository.get(`${resource}/${ID}`);
    },

    getValorables(ID) {
        return Repository.get(`${resource}/${ID}/${subresource}`);
    },

    getValorable(entidadID, ID) {
        return Repository.get(`${resource}/${entidadID}/${subresource}/${ID}`);
    },

    getComentarios(entidadID, ID) {
        return Repository.get(`${resource}/${entidadID}/${subresource}/${ID}/valoraciones`);
    },

    enviarComentario(entidadID, ID, datos) {
        return Repository.post(`${resource}/${entidadID}/${subresource}/${ID}/valoraciones`, datos);
    }
}