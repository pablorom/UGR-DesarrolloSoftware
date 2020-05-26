<?php

namespace App\Action;

use App\Domain\Admin\Data\AdminData;
use App\Domain\Admin\Service\AdminGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AdminGetAction {
    /**
     * Servicio
     *
     * @var AdminGetter servicio para consultar Admines
     */
    private $AdminGetter;

    /**
     * El constructor
     *
     * @param AdminGetter $AdminGetter
     */
    public function __construct(AdminGetter $AdminGetter) {
        $this->AdminGetter = $AdminGetter;
    }

    /**
     * Método invocado en la creación
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        // Recolectar datos del request
        $data = (array)$request->getParsedBody();
        // Obtener parámetros de la ruta
        $params = \Slim\Routing\RouteContext::fromRequest($request)->getRoute()->getArguments();

        $Admin = new AdminData();
        $Admin->usuarioID = $params['id'];
        
        $resultado = $this->AdminGetter->getAdmin($Admin);
        
        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode($resultado, JSON_UNESCAPED_UNICODE));

        return $response->withHeader('Content-Type', 'application/json');
    }
}