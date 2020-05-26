<?php

namespace App\Action;

use App\Domain\Entidad\Data\EntidadData;
use App\Domain\Entidad\Service\EntidadDeleter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EntidadDeleteAction {
    /**
     * Servicio
     *
     * @var EntidadDeleter servicio para eliminar Entidads
     */
    private $EntidadDeleter;

    /**
     * El constructor
     *
     * @param EntidadDeleter $EntidadDeleter
     */
    public function __construct(EntidadDeleter $EntidadDeleter) {
        $this->EntidadDeleter = $EntidadDeleter;
    }

    /**
     * Método invocado en la creación
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {

        // Recolectar datos de entrada desde la petición HTTP
        $data = (array)$request->getParsedBody();

        // Mapping
        $Entidad = new EntidadData();
        $Entidad->id = $data['id'];
        $Entidad->titulo = $data['titulo'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->EntidadDeleter->eliminarEntidad($Entidad);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}