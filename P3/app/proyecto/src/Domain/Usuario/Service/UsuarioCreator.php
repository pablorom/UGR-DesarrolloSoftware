<?php

namespace App\Domain\Usuario\Service;

use App\Domain\Usuario\Data\UsuarioData;
use App\Domain\Usuario\Repository\UsuarioRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class UsuarioCreator {
    /**
     * @var UsuarioRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param UsuarioRepository $repository The repository
     */
    public function __construct(UsuarioRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Create a new usuario.
     *
     * @param UsuarioData $usuario The usuario data
     *
     * @throws InvalidArgumentException
     *
     * @return int The new usuario ID
     */
    public function crearUsuario(UsuarioData $usuario): int {
        // Validation
        if (empty($usuario->nombre)) {
            throw new InvalidArgumentException('Username required');
        }

        // Insert usuario
        return $this->repository->insertUsuario($usuario);
    }
}

?>