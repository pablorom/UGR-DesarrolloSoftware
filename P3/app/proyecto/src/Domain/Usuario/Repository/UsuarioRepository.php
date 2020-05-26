<?php

namespace App\Domain\Usuario\Repository;

use App\Domain\Usuario\Data\UsuarioData;
use PDO;

/**
 * Repository.
 */
class UsuarioRepository {
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
     * Consulta la información de usuario
     *
     * @param UsuarioData $usuario
     * @return array datos del usuario
     */
    public function selectUsuario(UsuarioData $usuario) : array {
        $sql = "SELECT * FROM Usuarios WHERE nombre=:nombre";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":nombre", $usuario->nombre);
        $stmt->execute();
        $datos = $stmt->fetchAll();

        return $datos;
    }

    /**
     * Inserta usuario.
     *
     * @param UsuarioCreateData $usuario The usuario
     *
     * @return int The new ID
     */
    public function insertUsuario(UsuarioData $usuario): int {
        $contraseña = (string) password_hash($usuario->contraseña, PASSWORD_DEFAULT);
        
        $fila = [
            'nombre' => $usuario->nombre,
            'pass' => $contraseña,
            'correo' => $usuario->email,
        ];

        $sql = "INSERT IGNORE INTO Usuarios (nombre, correo, contraseña) VALUES (:nombre, :correo, :pass)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Elimina el usuario
     *
     * @param UsuarioData $usuario
     * @return int datos del usuario
     */
    public function deleteUsuario(UsuarioData $usuario) : int {
        $sql = "DELETE FROM Usuarios WHERE nombre=:nombre";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(":nombre", $usuario->nombre);
        $stmt->execute();
        $estado = $stmt->rowCount();

        return $estado;
    }

    /**
     * Modifica el usuario
     *
     * @param UsuarioData $usuario
     * @return int datos del usuario
     */
    public function updateUsuario(UsuarioData $usuario) : int {
        $contraseña = password_hash($usuario->contraseña, PASSWORD_DEFAULT);
        
        $fila = [
            'nombre' => $usuario->nombre,
            'pass' => $contraseña,
            'correo' => $usuario->email,
        ];

        $sql = "UPDATE Usuarios SET correo=:correo, contraseña=:pass WHERE nombre=:nombre";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($fila);
        $estado = $stmt->rowCount();

        return $estado;
    }
}

?>