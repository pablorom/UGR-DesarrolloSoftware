<?php

namespace App\Action;

use App\Domain\Entidad\Data\EntidadData;
use App\Domain\Entidad\Service\EntidadCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EntidadCreateAction {
    private $EntidadCreator;

    public function __construct(EntidadCreator $EntidadCreator) {
        $this->EntidadCreator = $EntidadCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $Entidad = new EntidadData();
        $Entidad->titulo = $data['titulo'];
        $Entidad->imagen = $data['imagen'];

        // Invocar a la capa de lógica Domain con los datos de entrada, y obtener el resultado
        $resultado = (bool) $this->EntidadCreator->crearEntidad($Entidad);
        ($resultado) ? $status = 201 : $status = 409;

        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}

?>