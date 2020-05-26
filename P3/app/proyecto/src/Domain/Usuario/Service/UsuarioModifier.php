<?php

namespace App\Domain\Usuario\Service;

use App\Domain\Usuario\Data\UsuarioData;
use App\Domain\Usuario\Repository\UsuarioRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class UsuarioModifier {
    /**
     * @var UsuarioRepository
     */
    private $repository;

    /**
     * El constructor.
     *
     * @param UsuarioRepository $repository El repositorio
     */
    public function __construct(UsuarioRepository $repository) {
        $this->repository = $repository;
    }

   /**
    * Elimina el usuario
    *
    * @param UsuarioData $usuario
    * @return integer
    */
    public function modificarUsuario(UsuarioData $usuario): int {
        // Validation
        if (empty($usuario->nombre))
            throw new InvalidArgumentException('Username required');
        if (empty($usuario->email))
            throw new InvalidArgumentException('Email required');
        if (empty($usuario->contraseña))
            throw new InvalidArgumentException('Password required');

        // Obtener datos de usuario
        return $this->repository->updateUsuario($usuario);
    }
}

?>