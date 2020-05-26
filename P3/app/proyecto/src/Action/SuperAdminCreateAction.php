<?php

namespace App\Action;

use App\Domain\SuperAdmin\Data\SuperAdminData;
use App\Domain\SuperAdmin\Service\SuperAdminCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SuperAdminCreateAction {
    private $SuperAdminCreator;

    public function __construct(SuperAdminCreator $SuperAdminCreator) {
        $this->SuperAdminCreator = $SuperAdminCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $SuperAdmin = new SuperAdminData();
        $SuperAdmin->entidadID = $data['entidadID'];
        $SuperAdmin->usuarioID = $data['usuarioID'];

        // Invocar a la capa de lógica Domain con los datos de entrada, y obtener el resultado
        $resultado = (bool) $this->SuperAdminCreator->crearSuperAdmin($SuperAdmin);
        ($resultado) ? $status = 201 : $status = 409;

        // Construir la respuesta HTTP
        $response->getBody()->write((string)json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}

?>