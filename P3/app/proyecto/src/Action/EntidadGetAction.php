<?php

namespace App\Action;

use App\Domain\Entidad\Data\EntidadData;
use App\Domain\Entidad\Service\EntidadGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EntidadGetAction {
    /**
     * Servicio
     *
     * @var EntidadGetter servicio para consultar Entidades
     */
    private $EntidadGetter;

    /**
     * El constructor
     *
     * @param EntidadGetter $EntidadGetter
     */
    public function __construct(EntidadGetter $EntidadGetter) {
        $this->EntidadGetter = $EntidadGetter;
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

        if (isset($params['id'])) {
            $Entidad = new EntidadData();
            $Entidad->id = $params['id'];
            $resultado = $this->EntidadGetter->getEntidad($Entidad);
        }
        else {
            $resultado = $this->EntidadGetter->getEntidades();
        }
        
        
        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode($resultado, JSON_UNESCAPED_UNICODE));

        return $response->withHeader('Content-Type', 'application/json');
    }
}