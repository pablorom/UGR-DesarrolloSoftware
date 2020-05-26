<?php

namespace App\Action;

use App\Domain\Valoracion\Data\ValoracionData;
use App\Domain\Valoracion\Service\ValoracionModifier;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ValoracionModifyAction {
    /**
     * Servicio
     *
     * @var ValoracionModifier servicio para consultar Valoracions
     */
    private $ValoracionModifier;

    /**
     * El constructor
     *
     * @param ValoracionModifier $ValoracionModifier
     */
    public function __construct(ValoracionModifier $ValoracionModifier) {
        $this->ValoracionModifier = $ValoracionModifier;
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
        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $valoracion = new ValoracionData();
        $valoracion->entidadID = $params['entidadID'];
        $valoracion->valorableID = $params['valorableID'];
        $valoracion->usuarioID = $data['usuarioID'];
        $valoracion->puntuacion = $data['puntuacion'];
        $valoracion->comentario = $data['comentario'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->ValoracionModifier->modificarValoracion($valoracion);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}