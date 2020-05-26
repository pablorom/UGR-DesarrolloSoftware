<?php

namespace App\Action;

use App\Domain\Usuario\Data\UsuarioData;
use App\Domain\Usuario\Service\UsuarioGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UsuarioGetAction {
    /**
     * Servicio
     *
     * @var UsuarioGetter servicio para consultar usuarios
     */
    private $usuarioGetter;

    /**
     * El constructor
     *
     * @param UsuarioGetter $usuarioGetter
     */
    public function __construct(UsuarioGetter $usuarioGetter) {
        $this->usuarioGetter = $usuarioGetter;
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
        $params = \Slim\Routing\RouteContext::fromRequest($request)->getRoute()->getArguments();

        $usuario = new UsuarioData();
        $usuario->nombre = $params['id'];
        
        $resultado = $this->usuarioGetter->getUsuario($usuario);
        
        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode($resultado, JSON_UNESCAPED_UNICODE));

        return $response->withHeader('Content-Type', 'application/json');
    }
}