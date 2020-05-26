<?php

namespace App\Action;

use App\Domain\Entidad\Data\EntidadData;
use App\Domain\Entidad\Service\EntidadModifier;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EntidadModifyAction {
    /**
     * Servicio
     *
     * @var EntidadModifier servicio para consultar Entidads
     */
    private $EntidadModifier;

    /**
     * El constructor
     *
     * @param EntidadModifier $EntidadModifier
     */
    public function __construct(EntidadModifier $EntidadModifier) {
        $this->EntidadModifier = $EntidadModifier;
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
        $Entidad = new EntidadData();
        $Entidad->id = $data['id'];
        $Entidad->titulo = $data['titulo'];
        $Entidad->imagen = $data['imagen'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->EntidadModifier->modificarEntidad($Entidad);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}