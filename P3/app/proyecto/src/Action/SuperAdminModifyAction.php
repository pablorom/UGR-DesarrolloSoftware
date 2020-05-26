<?php

namespace App\Action;

use App\Domain\SuperAdmin\Data\SuperAdminData;
use App\Domain\SuperAdmin\Service\SuperAdminModifier;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SuperAdminModifyAction {
    /**
     * Servicio
     *
     * @var SuperAdminModifier servicio para consultar SuperAdmins
     */
    private $SuperAdminModifier;

    /**
     * El constructor
     *
     * @param SuperAdminModifier $SuperAdminModifier
     */
    public function __construct(SuperAdminModifier $SuperAdminModifier) {
        $this->SuperAdminModifier = $SuperAdminModifier;
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
        $data = (array)$request->getParsedBody();

        // Mapping
        $SuperAdmin = new SuperAdminData();
        $SuperAdmin->entidadID = $data['entidadID'];
        $SuperAdmin->usuarioID = $data['usuarioID'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->SuperAdminModifier->modificarSuperAdmin($SuperAdmin);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}