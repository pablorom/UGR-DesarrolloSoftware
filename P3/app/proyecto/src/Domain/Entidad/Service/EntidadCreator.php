<?php

namespace App\Domain\Entidad\Service;

use App\Domain\Entidad\Data\EntidadData;
use App\Domain\Entidad\Repository\EntidadRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class EntidadCreator {
    /**
     * @var EntidadRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param EntidadRepository $repository The repository
     */
    public function __construct(EntidadRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Crea una nueva Entidad.
     *
     * @param EntidadData $Entidad The Entidad data
     *
     * @throws InvalidArgumentException
     *
     * @return int The new Entidad ID
     */
    public function crearEntidad(EntidadData $Entidad): int {
        // Validation
        if (empty($Entidad->titulo)) {
            throw new InvalidArgumentException('Hace falta un titulo');
        }

        // Insert Entidad
        return $this->repository->insertEntidad($Entidad);
    }
}

?>