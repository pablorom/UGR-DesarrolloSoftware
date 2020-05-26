<?php

namespace App\Domain\Valoracion\Service;

use App\Domain\Valoracion\Data\ValoracionData;
use App\Domain\Valoracion\Repository\ValoracionRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class ValoracionCreator {
    /**
     * @var ValoracionRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param ValoracionRepository $repository The repository
     */
    public function __construct(ValoracionRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Crea una nueva valoracion.
     *
     * @param ValoracionData $valoracion The valoracion data
     *
     * @throws InvalidArgumentException
     *
     * @return int The new valoracion ID
     */
    public function crearValoracion(ValoracionData $valoracion): int {
        // Validation
        if (empty($valoracion->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($valoracion->valorableID)) {
            throw new InvalidArgumentException('ID valorable');
        }
        if (empty($valoracion->usuarioID)) {
            throw new InvalidArgumentException('ID usuario');
        }
        if (empty($valoracion->puntuacion)) {
            throw new InvalidArgumentException('Valoración numérica');
        }

        // Insert valoracion
        return $this->repository->insertValoracion($valoracion);
    }
}

?>