<?php

namespace App\Domain\SuperAdmin\Service;

use App\Domain\SuperAdmin\Data\SuperAdminData;
use App\Domain\SuperAdmin\Repository\SuperAdminRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class SuperAdminDeleter {
    /**
     * @var SuperAdminRepository
     */
    private $repository;

    /**
     * El constructor.
     *
     * @param SuperAdminRepository $repository El repositorio
     */
    public function __construct(SuperAdminRepository $repository) {
        $this->repository = $repository;
    }

   /**
    * Elimina el SuperAdmin
    *
    * @param SuperAdminData $SuperAdmin
    * @return integer
    */
    public function eliminarSuperAdmin(SuperAdminData $SuperAdmin): int {
        // Validation
        if (empty($SuperAdmin->entidadID)) {
            throw new InvalidArgumentException('Es necesario un ID de entidad');
        }
        if (empty($SuperAdmin->usuarioID)) {
            throw new InvalidArgumentException('Es necesario un nombre de usuario');
        }
        // Obtener datos de SuperAdmin
        return $this->repository->deleteSuperAdmin($SuperAdmin);
    }
}

?>