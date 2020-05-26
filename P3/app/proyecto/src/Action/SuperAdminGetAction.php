<?php

namespace App\Action;

use App\Domain\SuperAdmin\Data\SuperAdminData;
use App\Domain\SuperAdmin\Service\SuperAdminGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SuperAdminGetAction {
    /**
     * Servicio
     *
     * @var SuperAdminGetter servicio para consultar SuperAdmines
     */
    private $SuperAdminGetter;

    /**
     * El constructor
     *
     * @param SuperAdminGetter $SuperAdminGetter
     */
    public function __construct(SuperAdminGetter $SuperAdminGetter) {
        $this->SuperAdminGetter = $SuperAdminGetter;
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

        $SuperAdmin = new SuperAdminData();
        $SuperAdmin->usuarioID = $params['id'];
        
        $resultado = $this->SuperAdminGetter->getSuperAdmin($SuperAdmin);
        
        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode($resultado, JSON_UNESCAPED_UNICODE));

        return $response->withHeader('Content-Type', 'application/json');
    }
}