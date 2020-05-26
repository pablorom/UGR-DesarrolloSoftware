<?php

namespace App\Action;

use App\Domain\Valorable\Data\ValorableData;
use App\Domain\Valorable\Service\ValorableGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ValorableGetAction {
    /**
     * Servicio
     *
     * @var ValorableGetter servicio para consultar Valorables
     */
    private $ValorableGetter;

    /**
     * El constructor
     *
     * @param ValorableGetter $ValorableGetter
     */
    public function __construct(ValorableGetter $ValorableGetter) {
        $this->ValorableGetter = $ValorableGetter;
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

        if (isset($params['valorableID'])) {
            $Valorable = new ValorableData();
            $Valorable->entidadID = $params['entidadID'];
            $Valorable->ID = $params['valorableID'];
            
            $resultado = $this->ValorableGetter->getValorable($Valorable);
        }
        else if (isset($params['entidadID']) ) {
            $Valorable = new ValorableData();
            $Valorable->entidadID = $params['entidadID'];
            $resultado = $this->ValorableGetter->getValorables($Valorable);
        }
        
        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode($resultado, JSON_UNESCAPED_UNICODE));

        return $response->withHeader('Content-Type', 'application/json');
    }
}