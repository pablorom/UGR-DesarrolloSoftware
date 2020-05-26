<?php

namespace App\Domain\Valoracion\Service;

use App\Domain\Valoracion\Data\ValoracionData;
use App\Domain\Valoracion\Repository\ValoracionRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class ValoracionDeleter {
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
    * Elimina la Valoracion
    *
    * @param ValoracionData $Valoracion
    * @return integer
    */
    public function eliminarValoracion(ValoracionData $Valoracion): int {
        // Validation
        if (empty($Valoracion->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($Valoracion->valorableID)) {
            throw new InvalidArgumentException('ID valoración');
        }
        if (empty($Valoracion->usuarioID)) {
            throw new InvalidArgumentException('Id usuario');
        }
        // Obtener datos de Valoracion
        $resultado = $this->repository->deleteValoracion($Valoracion);

        return $resultado;
    }
}

?>