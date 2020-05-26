<?php

namespace App\Domain\Admin\Repository;

use App\Domain\Admin\Data\AdminData;
use PDO;

/**
 * Repository.
 */
class AdminRepository {
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
     * Consulta la información de Admin
     *
     * @param AdminData $Admin
     * @return array datos de la Admin
     */
    public function selectAdmin(AdminData $Admin) : array {

        $fila = [
            'entidadID' => $Admin->usuarioID,
            'id' => $Admin->usuarioID,
        ];

        $sql = "SELECT * FROM Admins WHERE entidadID=:entidadID OR usuarioID=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $datos = $stmt->fetchAll();

        return $datos;
    }

    /**
     * Inserta Admin.
     *
     * @param AdminCreateData $Admin la Admin
     *
     * @return int The new ID
     */
    public function insertAdmin(AdminData $Admin): int {

        $fila = [
            'entidadID' => $Admin->entidadID,
            'usuarioID' => $Admin->usuarioID,
        ];

        $sql = "INSERT IGNORE INTO Admins (entidadID, usuarioID) VALUES (:entidadID, :usuarioID)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Elimina el Admin
     *
     * @param AdminData $Admin
     * @return int datos de la Admin
     */
    public function deleteAdmin(AdminData $Admin) : int {
        $fila = [
            'entidadID' => $Admin->entidadID,
            'usuarioID' => $Admin->usuarioID,
        ];
        $sql = "DELETE FROM Admins WHERE entidadID=:entidadID AND usuarioID=:usuarioID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Modifica el Admin
     *
     * @param AdminData $Admin
     * @return int estado de la actualizacion
     */
    public function updateAdmin(AdminData $Admin) : int {
        $fila = [
            'entidadID' => $Admin->entidadID,
            'usuarioID' => $Admin->usuarioID,
        ];

        $sql = "UPDATE Admins SET usuarioID=:usuarioID WHERE entidadID=:entidadID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }
}

?>