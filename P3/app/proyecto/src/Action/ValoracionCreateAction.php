<?php

namespace App\Action;

use App\Domain\Valoracion\Data\ValoracionData;
use App\Domain\Valoracion\Service\ValoracionCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ValoracionCreateAction {
    private $ValoracionCreator;

    public function __construct(ValoracionCreator $ValoracionCreator) {
        $this->ValoracionCreator = $ValoracionCreator;
    }

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

        // Invocar a la capa de lógica Domain con los datos de entrada, y obtener el resultado
        $resultado = (bool) $this->ValoracionCreator->crearValoracion($valoracion);
        ($resultado) ? $status = 200 : $status = 409;

        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}

?>