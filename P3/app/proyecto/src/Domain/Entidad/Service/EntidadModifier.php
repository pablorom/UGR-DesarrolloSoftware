<?php

namespace App\Domain\Entidad\Service;

use App\Domain\Entidad\Data\EntidadData;
use App\Domain\Entidad\Repository\EntidadRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class EntidadModifier {
    /**
     * @var EntidadRepository
     */
    private $repository;

    /**
     * El constructor.
     *
     * @param EntidadRepository $repository El repositorio
     */
    public function __construct(EntidadRepository $repository) {
        $this->repository = $repository;
    }

   /**
    * Modifica la Entidad
    *
    * @param EntidadData $Entidad
    * @return integer
    */
    public function modificarEntidad(EntidadData $Entidad): int {
        // Validation
        if (empty($Entidad->id))
            throw new InvalidArgumentException('Es necesario un Id');
        if (empty($Entidad->titulo))
            throw new InvalidArgumentException('Es necesario un titulo');
        if (empty($Entidad->imagen))
            throw new InvalidArgumentException('Es necesario una imagen');

        // Obtener datos de Entidad
        return $this->repository->updateEntidad($Entidad);
    }
}

?>