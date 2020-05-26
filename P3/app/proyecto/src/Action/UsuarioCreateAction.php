<?php

namespace App\Action;

use App\Domain\Usuario\Data\UsuarioData;
use App\Domain\Usuario\Service\UsuarioCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UsuarioCreateAction {
    private $usuarioCreator;

    public function __construct(UsuarioCreator $usuarioCreator) {
        $this->usuarioCreator = $usuarioCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $usuario = new UsuarioData();
        $usuario->nombre = $data['nombre'];
        $usuario->contraseña = $data['contraseña'];
        $usuario->email = $data['correo'];

        // Invocar a la capa de lógica Domain con los datos de entrada, y obtener el resultado
        $resultado = (bool) $this->usuarioCreator->crearUsuario($usuario);
        ($resultado) ? $status = 201 : $status = 409;

        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}

?>