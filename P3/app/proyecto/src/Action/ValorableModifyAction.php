<?php

namespace App\Action;

use App\Domain\Valorable\Data\ValorableData;
use App\Domain\Valorable\Service\ValorableModifier;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ValorableModifyAction {
    /**
     * Servicio
     *
     * @var ValorableModifier servicio para consultar Valorables
     */
    private $ValorableModifier;

    /**
     * El constructor
     *
     * @param ValorableModifier $ValorableModifier
     */
    public function __construct(ValorableModifier $ValorableModifier) {
        $this->ValorableModifier = $ValorableModifier;
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
        $Valorable->titulo = $data['titulo'];
        $Valorable->descripcion = $data['descripcion'];
        $Valorable->imagen = $data['imagen'];

        // Obtener el resultado de la operación y generar código de respuesta
        $resultado = (bool) $this->ValorableModifier->modificarValorable($Valorable);
        ($resultado) ? $status = 200 : $status = 409;
        
        // Construir la respuesta HTTP
        $response->getBody()->write(json_encode(['success' => $resultado]));

        return $response->withHeader('Content-Type', 'application/json')->withStatus($status);
    }
}