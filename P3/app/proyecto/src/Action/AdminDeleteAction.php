<?php

namespace App\Action;

use App\Domain\Admin\Data\AdminData;
use App\Domain\Admin\Service\AdminDeleter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AdminDeleteAction {
    /**
     * Servicio
     *
     * @var AdminDeleter servicio para eliminar Admins
     */
    private $AdminDeleter;

    /**
     * El constructor
     *
     * @param AdminDeleter $AdminDeleter
     */
    public function __construct(AdminDeleter $AdminDeleter) {
        $this->AdminDeleter = $AdminDeleter;
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
        $Admin = new AdminData();
        $Admin->entidadID = $data['entidadID'];
        $Admin->usuarioID = $data['usuarioID'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->AdminDeleter->eliminarAdmin($Admin);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}