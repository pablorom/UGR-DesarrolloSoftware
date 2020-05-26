<?php

namespace App\Domain\Entidad\Repository;

use App\Domain\Entidad\Data\EntidadData;
use PDO;

/**
 * Repository.
 */
class EntidadRepository {
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
     * Consulta la información de Entidad
     *
     * @param EntidadData $Entidad
     * @return array datos de la Entidad
     */
    public function selectEntidad(EntidadData $Entidad) : array {
        $sql = "SELECT * FROM Entidades WHERE ID=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":id", $Entidad->id);
        $stmt->execute();
        $datos = $stmt->fetchAll();

        return $datos;
    }

    /**
     * Undocumented function
     *
     * @param EntidadData $Entidad
     * @return array
     */
    public function selectEntidades() : array {
        $sql = "SELECT * FROM Entidades";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $datos = $stmt->fetchAll();

        return $datos;
    }

    /**
     * Inserta Entidad.
     *
     * @param EntidadCreateData $Entidad la Entidad
     *
     * @return int The new ID
     */
    public function insertEntidad(EntidadData $Entidad): int {

        $fila = [
            'titulo' => $Entidad->titulo,
            'imagen' => $Entidad->imagen,
        ];

        $sql = "INSERT IGNORE INTO Entidades (titulo, imagen) VALUES (:titulo, :imagen)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Elimina el Entidad
     *
     * @param EntidadData $Entidad
     * @return int datos de la Entidad
     */
    public function deleteEntidad(EntidadData $Entidad) : int {
        $sql = "DELETE FROM Entidades WHERE ID=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":id", $Entidad->id);
        $stmt->execute();
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Modifica el Entidad
     *
     * @param EntidadData $Entidad
     * @return int estado de la actualizacion
     */
    public function updateEntidad(EntidadData $Entidad) : int {
        $fila = [
            'id' => $Entidad->id,
            'titulo' => $Entidad->titulo,
            'imagen' => $Entidad->imagen,
        ];

        $sql = "UPDATE Entidades SET titulo=:titulo, imagen=:imagen WHERE ID=:id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }
}

?>