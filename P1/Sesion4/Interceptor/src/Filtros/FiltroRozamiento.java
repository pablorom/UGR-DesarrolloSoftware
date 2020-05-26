package Filtros;

import controlVelocidad.EstadoMotor;

/**
 *
 * @author alex
 */

public class FiltroRozamiento implements Filtro {

    @Override
    public int ejecutar(int revoluciones, EstadoMotor estadoMotor) {
        return Math.max(0, revoluciones - 10);
    }
    
}
