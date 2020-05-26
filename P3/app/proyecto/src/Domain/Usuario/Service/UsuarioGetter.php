<?php

namespace App\Domain\Usuario\Service;

use App\Domain\Usuario\Data\UsuarioData;
use App\Domain\Usuario\Repository\UsuarioRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class UsuarioGetter {
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
     * Consultar información de usuario.
     *
     * @param UsuarioData $usuario The usuario data
     *
     * @throws InvalidArgumentException
     *
     * @return array Los datos de usuario
     */
    public function getUsuario(UsuarioData $usuario): array {
        // Validation
        if (empty($usuario->nombre)) {
            throw new InvalidArgumentException('Username required');
        }

        // Obtener datos de usuario
        return $this->repository->selectUsuario($usuario);
    }
}

?>