<?php

namespace App\Domain\Valoracion\Service;

use App\Domain\Valoracion\Data\ValoracionData;
use App\Domain\Valoracion\Repository\ValoracionRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class ValoracionGetter {
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
     * Consultar información de la Valoracion.
     *
     * @param ValoracionData $Valoracion The Valoracion data
     *
     * @throws InvalidArgumentException
     *
     * @return array Los datos de Valoracion
     */
    public function getValoracion(ValoracionData $Valoracion): array {
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
        return $this->repository->selectValoracion($Valoracion);
    }

    /**
     * Undocumented function
     *
     * @param ValoracionData $Valoracion
     * @return array
     */
    public function getValoraciones(ValoracionData $Valoracion): array {
        // Validation
        if (empty($Valoracion->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($Valoracion->valorableID)) {
            throw new InvalidArgumentException('ID valorable');
        }

        // Obtener datos de Valoracion
        return $this->repository->selectValoraciones($Valoracion);
    }
}

?>