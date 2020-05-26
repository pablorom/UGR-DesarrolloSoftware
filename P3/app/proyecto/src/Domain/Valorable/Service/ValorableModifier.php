<?php

namespace App\Domain\Valorable\Service;

use App\Domain\Valorable\Data\ValorableData;
use App\Domain\Valorable\Repository\ValorableRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class ValorableModifier {
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
    * Modifica la Valorable
    *
    * @param ValorableData $Valorable
    * @return integer
    */
    public function modificarValorable(ValorableData $Valorable): int {
        // Validation
        if (empty($Valorable->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($Valorable->ID)){
            throw new InvalidArgumentException('ID valorable');
        }

        // Obtener datos de Valorable
        return $this->repository->updateValorable($Valorable);
    }
}

?>