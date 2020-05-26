<?php

namespace App\Action;

use App\Domain\Valorable\Data\ValorableData;
use App\Domain\Valorable\Service\ValorableDeleter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ValorableDeleteAction {
    /**
     * Servicio
     *
     * @var ValorableDeleter servicio para eliminar Valorables
     */
    private $ValorableDeleter;

    /**
     * El constructor
     *
     * @param ValorableDeleter $ValorableDeleter
     */
    public function __construct(ValorableDeleter $ValorableDeleter) {
        $this->ValorableDeleter = $ValorableDeleter;
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
        $Valorable = new ValorableData();
        $Valorable->entidadID = $data['entidadID'];
        $Valorable->ID = $data['id'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->ValorableDeleter->eliminarValorable($Valorable);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}