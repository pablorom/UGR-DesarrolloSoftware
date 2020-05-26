<?php

namespace App\Domain\Admin\Service;

use App\Domain\Admin\Data\AdminData;
use App\Domain\Admin\Repository\AdminRepository;
use InvalidArgumentException;

/**
 * Servicio.
 */
final class AdminCreator {
    /**
     * @var AdminRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param AdminRepository $repository The repository
     */
    public function __construct(AdminRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Crea una nueva Admin.
     *
     * @param AdminData $Admin The Admin data
     *
     * @throws InvalidArgumentException
     *
     * @return int The new Admin ID
     */
    public function crearAdmin(AdminData $Admin): int {
        // Validation
        if (empty($Admin->entidadID)) {
            throw new InvalidArgumentException('ID entidad');
        }
        if (empty($Admin->usuarioID)) {
            throw new InvalidArgumentException('ID usuario');
        }

        // Insert Admin
        return $this->repository->insertAdmin($Admin);
    }
}

?>