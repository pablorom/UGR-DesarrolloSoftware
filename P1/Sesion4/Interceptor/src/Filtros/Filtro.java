package Filtros;

import controlVelocidad.EstadoMotor;

/**
 *
 * @author pablorobles
 */

public interface Filtro {
    public int ejecutar(int revoluciones, EstadoMotor estadoMotor);
}
