<?php

namespace App\Domain\SuperAdmin\Service;

use App\Domain\SuperAdmin\Data\SuperAdminData;
use App\Domain\SuperAdmin\Repository\SuperAdminRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class SuperAdminCreator {
    /**
     * @var SuperAdminRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param SuperAdminRepository $repository The repository
     */
    public function __construct(SuperAdminRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Crea una nueva SuperAdmin.
     *
     * @param SuperAdminData $SuperAdmin The SuperAdmin data
     *
     * @throws InvalidArgumentException
     *
     * @return int The new SuperAdmin ID
     */
    public function crearSuperAdmin(SuperAdminData $SuperAdmin): int {
        // Validation
        if (empty($SuperAdmin->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($SuperAdmin->usuarioID)) {
            throw new InvalidArgumentException('ID usuario');
        }

        // Insert SuperAdmin
        return $this->repository->insertSuperAdmin($SuperAdmin);
    }
}

?>