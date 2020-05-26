<?php

namespace App\Domain\Valorable\Service;

use App\Domain\Valorable\Data\ValorableData;
use App\Domain\Valorable\Repository\ValorableRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class ValorableCreator {
    /**
     * @var ValorableRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param ValorableRepository $repository The repository
     */
    public function __construct(ValorableRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Crea una nueva Valorable.
     *
     * @param ValorableData $Valorable The Valorable data
     *
     * @throws InvalidArgumentException
     *
     * @return int The new Valorable ID
     */
    public function crearValorable(ValorableData $Valorable): int {
        // Validation
        if (empty($Valorable->entidadID)) {
            throw new InvalidArgumentException('Hace falta un id de la entidad');
        }
        if (empty($Valorable->titulo)) {
            throw new InvalidArgumentException('Hace falta un titulo');
        }

        // Insert Valorable
        return $this->repository->insertValorable($Valorable);
    }
}

?>