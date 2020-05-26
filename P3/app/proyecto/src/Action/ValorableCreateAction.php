<?php

namespace App\Action;

use App\Domain\Valorable\Data\ValorableData;
use App\Domain\Valorable\Service\ValorableCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ValorableCreateAction {
    private $ValorableCreator;

    public function __construct(ValorableCreator $ValorableCreator) {
        $this->ValorableCreator = $ValorableCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $Valorable = new ValorableData();
        $Valorable->entidadID = $data['entidadID'];
        $Valorable->titulo = $data['titulo'];
        $Valorable->descripcion = $data['descripcion'];
        $Valorable->imagen = $data['imagen'];

        // Invocar a la capa de lógica Domain con los datos de entrada, y obtener el resultado
        $resultado = (bool) $this->ValorableCreator->crearValorable($Valorable);
        ($resultado) ? $status = 201 : $status = 409;

        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}

?>