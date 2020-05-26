<?php

namespace App\Domain\SuperAdmin\Repository;

use App\Domain\SuperAdmin\Data\SuperAdminData;
use PDO;

/**
 * Repository.
 */
class SuperAdminRepository {
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    /**
     * Consulta la información de SuperAdmin
     *
     * @param SuperAdminData $SuperAdmin
     * @return array datos de la SuperAdmin
     */
    public function selectSuperAdmin(SuperAdminData $SuperAdmin) : array {

        $fila = [
            'entidadID' => $SuperAdmin->usuarioID,
            'usuarioID' => $SuperAdmin->usuarioID,
        ];

        $sql = "SELECT * FROM Superadmins WHERE entidadID=:entidadID OR usuarioID=:usuarioID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $datos = $stmt->fetchAll();

        return $datos;
    }

    /**
     * Inserta SuperAdmin.
     *
     * @param SuperAdminCreateData $SuperAdmin la SuperAdmin
     *
     * @return int The new ID
     */
    public function insertSuperAdmin(SuperAdminData $SuperAdmin): int {

        $fila = [
            'entidadID' => $SuperAdmin->entidadID,
            'usuarioID' => $SuperAdmin->usuarioID,
        ];

        $sql = "INSERT IGNORE INTO Superadmins (entidadID, usuarioID) VALUES (:entidadID, :usuarioID)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Elimina el SuperAdmin
     *
     * @param SuperAdminData $SuperAdmin
     * @return int datos de la SuperAdmin
     */
    public function deleteSuperAdmin(SuperAdminData $SuperAdmin) : int {
        $fila = [
            'entidadID' => $SuperAdmin->entidadID,
            'usuarioID' => $SuperAdmin->usuarioID,
        ];
        $sql = "DELETE FROM Superadmins WHERE entidadID=:entidadID AND usuarioID=:usuarioID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Modifica el SuperAdmin
     *
     * @param SuperAdminData $SuperAdmin
     * @return int estado de la actualizacion
     */
    public function updateSuperAdmin(SuperAdminData $SuperAdmin) : int {
        $fila = [
            'entidadID' => $SuperAdmin->entidadID,
            'usuarioID' => $SuperAdmin->usuarioID,
        ];

        $sql = "UPDATE Superadmins SET usuarioID=:usuarioID WHERE entidadID=:entidadID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }
}

?>