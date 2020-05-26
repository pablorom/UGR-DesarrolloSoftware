<?php

namespace App\Action;

use App\Domain\Usuario\Data\UsuarioData;
use App\Domain\Usuario\Service\UsuarioDeleter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UsuarioDeleteAction {
    /**
     * Servicio
     *
     * @var UsuarioDeleter servicio para eliminar usuarios
     */
    private $usuarioDeleter;

    /**
     * El constructor
     *
     * @param UsuarioDeleter $usuarioDeleter
     */
    public function __construct(UsuarioDeleter $usuarioDeleter) {
        $this->usuarioDeleter = $usuarioDeleter;
    }

    /**
     * Método invocado en la creación
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        /**
         * NOTA: el usuario que se elimina es el que tiene la sesión actual, pero como aún
         * no se ha implementado un mecanismo de sesión, el id del usuario (nombre) se pasa
         * en el cuerpo de la petición HTTP. A modo de verificación, se pide al usuario
         * todos sus datos (nombre, contraseña y email) en un formulario.
         * 
         * Tenemos que pensar si lo dejamos como un formulario o hacemos lo de las sesiones.
         * Como vamos cortos de tiempo, apuesto por el formulario.
         */
        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $usuario = new UsuarioData();
        $usuario->nombre = $data['nombre'];
        $usuario->contraseña = $data['contraseña'];
        $usuario->email = $data['correo'];
        
        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->usuarioDeleter->eliminarUsuario($usuario);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}