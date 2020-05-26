// RepositoryFactory.js

import UserRepository from './UsuariosRepository';
import EntidadesRepository from './EntidadesRepository';

const repositories = {
    usuarios: UserRepository,
    entidades: EntidadesRepository
};

export const RepositoryFactory = {
    get: name => repositories[name]
}