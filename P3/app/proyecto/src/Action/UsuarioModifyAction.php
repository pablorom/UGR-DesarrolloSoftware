<?php

namespace App\Action;

use App\Domain\Usuario\Data\UsuarioData;
use App\Domain\Usuario\Service\UsuarioModifier;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UsuarioModifyAction {
    /**
     * Servicio
     *
     * @var UsuarioModifier servicio para consultar usuarios
     */
    private $usuarioModifier;

    /**
     * El constructor
     *
     * @param UsuarioModifier $usuarioModifier
     */
    public function __construct(UsuarioModifier $usuarioModifier) {
        $this->usuarioModifier = $usuarioModifier;
    }

    /**
     * Método invocado en la creación
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        // Obtener parámetros de la ruta
        $data = (array)$request->getParsedBody();

        // Mapping
        $usuario = new UsuarioData();
        $usuario->nombre = $data['nombre'];
        $usuario->contraseña = $data['contraseña'];
        $usuario->email = $data['correo'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->usuarioModifier->modificarUsuario($usuario);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}