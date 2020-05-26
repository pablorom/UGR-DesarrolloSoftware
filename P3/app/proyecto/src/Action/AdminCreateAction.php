<?php

namespace App\Action;

use App\Domain\Admin\Data\AdminData;
use App\Domain\Admin\Service\AdminCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AdminCreateAction {
    private $AdminCreator;

    public function __construct(AdminCreator $AdminCreator) {
        $this->AdminCreator = $AdminCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $Admin = new AdminData();
        $Admin->entidadID = $data['entidadID'];
        $Admin->usuarioID = $data['usuarioID'];

        // Invocar a la capa de lógica Domain con los datos de entrada, y obtener el resultado
        $resultado = (bool) $this->AdminCreator->crearAdmin($Admin);
        ($resultado) ? $status = 201 : $status = 409;

        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}

?>