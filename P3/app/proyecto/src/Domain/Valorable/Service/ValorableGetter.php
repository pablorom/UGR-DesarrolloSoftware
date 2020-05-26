<?php

namespace App\Domain\Valorable\Service;

use App\Domain\Valorable\Data\ValorableData;
use App\Domain\Valorable\Repository\ValorableRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class ValorableGetter {
    /**
     * @var ValorableRepository
     */
    private $repository;

    /**
     * El constructor.
     *
     * @param ValorableRepository $repository El repositorio
     */
    public function __construct(ValorableRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Consultar información de la Valorable.
     *
     * @param ValorableData $Valorable The Valorable data
     *
     * @throws InvalidArgumentException
     *
     * @return array Los datos de Valorable
     */
    public function getValorable(ValorableData $Valorable): array {
        // Validation
        if (empty($Valorable->entidadID)) {
            throw new InvalidArgumentException('Es necesario un Id de la entidad');
        }
        if (empty($Valorable->ID)) {
            throw new InvalidArgumentException('Es necesario un id de valorable');
        }

        // Obtener datos de Valorable
        return $this->repository->selectValorable($Valorable);
    }

    /**
     * Undocumented function
     *
     * @param ValorableData $Valorable
     * @return array
     */
    public function getValorables(ValorableData $Valorable): array {
        // Validation
        if (empty($Valorable->entidadID)) {
            throw new InvalidArgumentException('ID de entidad');
        }

        // Obtener datos de Valorable
        return $this->repository->selectValorables($Valorable);
    }
}

?>