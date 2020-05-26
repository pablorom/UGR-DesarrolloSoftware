package controlVelocidad.Filtros;

import controlVelocidad.EstadoMotor;

/**
 *
 * @author pablorobles
 */
public class FiltroCalcularRPM implements Filtro {
    
    protected final int MAX_RPM = 5000;
     
    @Override
    public int ejecutar(int revoluciones, EstadoMotor estadoMotor) {
        
        if (estadoMotor == EstadoMotor.ACELERANDO)
            return Math.min(MAX_RPM, revoluciones + 100); // Evitar RPM > MAX_RPM
        
        if (estadoMotor == EstadoMotor.FRENANDO)
            return Math.max(0, revoluciones - 150); // Evitar RPM < 0

        return revoluciones;    // En otro caso, no hacer nada
    }
}
