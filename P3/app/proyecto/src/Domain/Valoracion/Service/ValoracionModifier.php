<?php

namespace App\Domain\Valoracion\Service;

use App\Domain\Valoracion\Data\ValoracionData;
use App\Domain\Valoracion\Repository\ValoracionRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class ValoracionModifier {
    /**
     * @var ValoracionRepository
     */
    private $repository;

    /**
     * El constructor.
     *
     * @param ValoracionRepository $repository El repositorio
     */
    public function __construct(ValoracionRepository $repository) {
        $this->repository = $repository;
    }

   /**
    * Modifica la Valoracion
    *
    * @param ValoracionData $Valoracion
    * @return integer
    */
    public function modificarValoracion(ValoracionData $Valoracion): int {
        // Validation
        if (empty($Valoracion->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($Valoracion->valorableID)) {
            throw new InvalidArgumentException('ID valorable');
        }
        if (empty($Valoracion->usuarioID)) {
            throw new InvalidArgumentException('ID usuario');
        }

        // Obtener datos de Valoracion
        return $this->repository->updateValoracion($Valoracion);
    }
}

?>