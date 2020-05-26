<?php

namespace App\Domain\Admin\Service;

use App\Domain\Admin\Data\AdminData;
use App\Domain\Admin\Repository\AdminRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class AdminDeleter {
    /**
     * @var AdminRepository
     */
    private $repository;

    /**
     * El constructor.
     *
     * @param AdminRepository $repository El repositorio
     */
    public function __construct(AdminRepository $repository) {
        $this->repository = $repository;
    }

   /**
    * Elimina el Admin
    *
    * @param AdminData $Admin
    * @return integer
    */
    public function eliminarAdmin(AdminData $Admin): int {
        // Validation
        if (empty($Admin->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($Admin->usuarioID)) {
            throw new InvalidArgumentException('ID usuario');
        }
        // Obtener datos de Admin
        return $this->repository->deleteAdmin($Admin);
    }
}

?>