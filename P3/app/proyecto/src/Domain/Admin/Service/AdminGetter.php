<?php

namespace App\Domain\Admin\Service;

use App\Domain\Admin\Data\AdminData;
use App\Domain\Admin\Repository\AdminRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class AdminGetter {
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
     * Consultar información de la Admin.
     *
     * @param AdminData $Admin The Admin data
     *
     * @throws InvalidArgumentException
     *
     * @return array Los datos de Admin
     */
    public function getAdmin(AdminData $Admin): array {
        // Validation
        if (empty($Admin->entidadID) && empty($Admin->usuarioID)) {
            throw new InvalidArgumentException('Es necesario un ID (entidad o usuario)');
        }

        // Obtener datos de Admin
        return $this->repository->selectAdmin($Admin);
    }
}

?>